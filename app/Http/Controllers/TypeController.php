<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        
        return view('admin.categories.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        //Validiamo la richiesta e otteniamo i dati validati
        $validatedData = $request->validated();
        
        //Creiamo un nuovo Progetto con i dati validati
        $newType = new Type();
        
        $newType->fill($validatedData);
        
        $newType->save();
        
        //Reindirizziamo alla pagina dei Progetti
        return redirect()->route('admin.types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.categories.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTypeRequest $request, Type $type)
    {
        $validatedData = $request->validated();

        $type->update($validatedData);
        
        return redirect()->route('admin.types.index', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');
    }
}
