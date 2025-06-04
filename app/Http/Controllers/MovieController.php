<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(6);
        return view('pages.home', compact('movies'));
    }

    public function detailMovie($id, $slug)
    {
        $movie = Movie::find($id);
        return view('pages.detail_movie', compact('movie'));
    }

    public function create()
    {
        $categories = categories::all();
        return view('pages.movie_form');
    }

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

    public function list()
    {
        $movies = Movie::with('category')->get();
        return view('pages.list_movie', compact('movies'));
    }


    public function edit($id)
    {
        $movies = Movie::findOrFail($id);
        $categories = Categories::all(); // agar bisa pilih ulang kategori saat edit
        return view('pages.edit_movie', compact('movies', 'categories'));
    }

    public function destroy($id)
    {

        if (Gate::allows('delete-movie')) {



            $movie = Movie::findOrFail($id);

            // Hapus file cover image jika ada
            if ($movie->cover_image && Storage::exists('public/' . $movie->cover_image)) {
                Storage::delete('public/' . $movie->cover_image);
            }

            // Hapus data movie
            $movie->delete();

            return redirect()->route('movie.list')->with('success', 'Movie berhasil dihapus.');
        }

        abort(403);

    }

}
