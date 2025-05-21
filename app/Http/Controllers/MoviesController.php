<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Categories;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movies::select('id', 'title', 'synopsis', 'cover_image', 'year', 'slug')->paginate(6);
        return view('homepage', compact('movies'));

    }

    public function detailMovie($id, $slug)
    {
        $movie = Movies::find($id);
        // dd($movie);
        return view('movie_detail', compact('movie'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('form_movie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'synopsis' => 'required|string',
            'year' => 'required|integer|min:1800|max:' . date('Y'),
            'category_id' => 'required|exists:categories,id',
            'actor' => 'required|string|max:255',
        ]);

        // Simpan file gambar
        $imagePath = $request->file('cover_image')->store('cover_images', 'public');

        // Simpan data ke database
        Movie::create([
            'title' => $validated['title'],
            'cover_image' => $imagePath,
            'slug' => Str::slug($validated['title']),
            'synopsis' => $validated['synopsis'],
            'year' => $validated['year'],
            'category_id' => $validated['category_id'],
            'actor' => $validated['actor'],
        ]);

        return redirect('/')->with('success', 'Movie has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movies $movies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movies $movies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movies $movies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movies $movies)
    {
        //
    }
}
