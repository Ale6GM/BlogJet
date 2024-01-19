<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id'); // este metodo pluck coge solo una columna de la tabla y como segundo parametro se le puede pasar una llave para luego pasarlo a laravel colective en el formato deseado.
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        

        //return Storage::put('public\posts', $request->file('file'));
        $post = Post::create($request->all()); // crea registro en la tabla post

        if($request->file('file')) {
            //$url = Storage::put('public\posts', $request->file('file'));
            $url = Storage::disk('public')->put('posts', $request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }
        
        /* Verifica si en el metodo requests se estan mandando info de las etiquetas, de ser asi se coge ese post se carga la relacion con la tabla tags cargada en el modelo post
        y haciendo uso del metodo attach se le pasa lo que viene de la vista asociado a la etiqueta, el id del post se coge de $post. esto es para una relacion 
        de muchos a muchos, como guardar en diferentes tablas a la vez */
 
         if($request->tags) { 
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return $post;
    }
}
