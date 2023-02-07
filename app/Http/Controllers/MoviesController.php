<?php

namespace App\Http\Controllers;

use App\Models\movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies= movies::where('estado', 1)->get();
        return response()->json($movies, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'poster_path' => 'nullable|string',
            'overview' => 'nullable|string',
            'release_date' => 'nullable|string',
            'original_title' => 'nullable|string',
            'original_language' => 'nullable|string',
            'genre_ids'=>'nullable|string',
        ]);

        $movies= movies::create([
            'poster_path' => $validateData['poster_path'],
            'overview' => $validateData['overview'],
            'release_date' => $validateData['release_date'],
            'original_title' => $validateData['original_title'],
            'original_language' => $validateData['original_language'],
            'genre_ids'=>$validateData['genre_ids'],
            'estado' => 1
        ]);

        return response()->json(['message' => 'Peliculas registrada.'], 201);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(movies $movies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit(movies $movies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movies $movies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $movies=movies::find($id);
        if (is_null($movies)) {
            return response()->json(['message' => 'pelicula no encontrada'], 404);
        }
        $movies->estado=0;
        $movies->save();
        return response()->json(['message'=>'pelicula eliminada']);
    }
}
