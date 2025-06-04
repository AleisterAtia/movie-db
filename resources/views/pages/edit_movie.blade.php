@extends('layout.main')
@section('title', 'Form Movie')
@section('navInmov', 'active')
@section('container')

    <div class="container mt-5">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-success text-white rounded-top-4 d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Form Edit Movie</h4>
                <a href="{{ route('movie.list') }}" class="btn btn-light btn-sm text-success fw-bold">
                    <i class="bi bi-arrow-left-circle me-1"></i> Data Movie
                </a>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Movie Title"
                            value= '{{ old('title', $movies->title) }}' required>
                        <label for="title ">Title</label>
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Cover Image</label>
                        <input class="form-control" type="file" id="cover_image" name="cover_image"
                            value= '{{ old('title', $movies->cover_image) }}' required>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Write the synopsis here" id="synopsis" name="synopsis"
                            style="height: 120px" required>{{ old('synopsis', $movies->synopsis) }}</textarea>


                        <label for="synopsis">Synopsis</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="year" name="year" placeholder="Release Year"
                            value= '{{ old('title', $movies->year) }}' required>
                        <label for="year">Year</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="category" name="category_id" required>
                            <option selected disabled value="">Choose Category</option>
                            <option value="1" {{ $movies->category_id == 1 ? 'selected' : '' }}>Action</option>
                            <option value="2" {{ $movies->category_id == 2 ? 'selected' : '' }}>Comedy</option>
                            <option value="3" {{ $movies->category_id == 3 ? 'selected' : '' }}>Drama</option>
                            <option value="4" {{ $movies->category_id == 4 ? 'selected' : '' }}>Sci-Fi</option>
                            <option value="5" {{ $movies->category_id == 5 ? 'selected' : '' }}>Romance</option>
                        </select>
                        <label for="category">Category</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="actor" name="actor" placeholder="Main Actors"
                            value= '{{ old('title', $movies->actor) }}' required>
                        <label for="actor">Actors</label>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-2">
                        <i class="bi bi-upload me-1"></i> Edit Movie
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
