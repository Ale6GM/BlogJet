<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'blue' => 'Color Azul',
            'green' => 'Color Verde',
            'yellow' => 'Color Amarillo',
            'indigo' => 'Color Indigo',
            'purple' => 'Color Purpura',
            'pink' => 'Color Rosa'
        ];
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);
        Tag::create($request->all());

        return redirect()->route('admin.tags.index')->with('info', 'La Etiqueta Se ha Creado con Exito');
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Color rojo',
            'blue' => 'Color Azul',
            'green' => 'Color Verde',
            'yellow' => 'Color Amarillo',
            'indigo' => 'Color Indigo',
            'purple' => 'Color Purpura',
            'pink' => 'Color Rosa'
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=> 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.index')->with('info', 'La Etiqueta Se ha Actualizado con Exito');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
       $tag->delete();

       return redirect()->route('admin.tags.index')->with('info', 'La Etiqueta Se ha Eliminado con Exito');
    }
}
