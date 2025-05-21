@extends('layouts.template')

@section('title', 'Detail Movie')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $movie->cover_image }}" class="card-img-top" style="height: 300px; object-fit: cover;"
                            alt="{{ $movie->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body d-flex flex-column justify-content-between h-100">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text"><strong>Sinopsis:</strong> {{ Str::limit($movie->synopsis, 150) }}</p>
                            <p class="card-text"><strong>Actor:</strong> {{ Str::limit($movie->actors, 150) }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $movie->category->category_name ?? '-' }}</p>
                            <a href="/" class="btn btn-success mt-3">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
