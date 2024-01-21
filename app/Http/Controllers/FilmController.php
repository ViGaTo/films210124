<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::orderBy('id', 'desc')->paginate(10);
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::select('id', 'nombre')->orderBy('nombre', 'desc')->get();
        return view('films.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:films,titulo'],
            'descripcion'=>['required', 'string', 'min:10'],
            'imagen'=>['nullable', 'image', 'max:2048']
        ]);
        $film = Film::create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=>($request->imagen) ? $request->imagen->store('films') : "default.png",
        ]);
        $film->tags()->attach($request->tags);
        return redirect()->route('films.index')->with('info', 'Película creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $tagsFilm = $film->devolverIdTagsFilms();
        $tags = Tag::select('id', 'nombre')->orderBy('nombre', 'desc')->get();
        return view('films.edit', compact('film', 'tags', 'tagsFilm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:films,titulo,'. $film->id],
            'descripcion'=>['required', 'string', 'min:10'],
            'imagen'=>['nullable', 'image', 'max:2048']
        ]);
        $ruta=$film->imagen;
        if($request->imagen){
            if(basename($film->imagen)!="default.png"){
                Storage::delete($film->imagen);
            }
            $ruta = $request->imagen->store('films');
        }
        $film->update([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=>$ruta
        ]);
        $film->tags()->sync($request->tags);
        return redirect()->route('films.index')->with('info', 'Película editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        if(basename($film->imagen)!="default.png"){
            Storage::delete($film->imagen);
        }

        $film->delete();
        return redirect()->route('films.index')->with('info', 'Película borrada exitosamente');
    }
}
