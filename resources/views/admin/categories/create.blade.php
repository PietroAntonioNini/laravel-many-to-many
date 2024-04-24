@extends('layouts.app')

@section('content')
<div class="container py-5">

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf

        <div class="form-group mb-5">
            <label for="title">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title" value="{{old('title')}}">
            @error('title') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group mb-5">
            <label for="description">Descrizione:</label>
            <textarea class="form-control @error('description') is-invalid  @enderror" id="description" name="description" rows="4">{{old('description')}}</textarea>
            @error('description') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary py-3 px-4 mt-3">Salva</button>
    </form>
</div>
@endsection