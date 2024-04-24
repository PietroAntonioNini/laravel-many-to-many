@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Tutte le categorie</h1>

    <a href="{{ route('admin.types.create') }}" class="btn btn-outline-primary ms-4">Aggiungi Categoria</a>

    <table class="table mt-5 w-75">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Descrizione</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach($types as $type)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$type->title}}</td>
                <td>{{$type->description}}</td>
                <td class="d-flex justify-content-end">
                  <a href="{{route('admin.types.edit', $type->id)}}" class="btn btn-sm btn-outline-warning me-3">Modifica</a>


                  <!-- Modal button -->
                  <button type="button" class="btn btn-outline-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#delete-type-{{$type->id}}">
                    Elimina
                  </button>
                
                  <!-- Modal Body -->
                  <div class="modal fade" id="delete-type-{{$type->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="delete-type-{{$type->id}}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">

                              <div class="modal-header">
                                  <h5 class="modal-title" id="delete-type-{{$type->id}}">{{ __('Sei sicuro che vuoi eliminare questo Tipo?') }}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                  <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" class="p-6">
                                      @csrf
                                      @method('DELETE')

                                      <div class="input-group">
                                          <button type="submit" class="btn btn-danger">
                                              {{ __('Elimina') }}
                                          </button>
                                      </div>

                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection