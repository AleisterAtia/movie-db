@extends('layouts/template')

@section('content')
    <h2 class="mb-4">Popular Movie</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($movies as $movie)
        <div class="col">
            <div class="card h-100">
                @if ($movie->cover_image)
                <img src="{{ $movie->cover_image }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="{{ $movie->title }}">

                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="card-text">{{ Str::limit($movie->synopsis, 150) }}</p>
                    <a href="#" class="btn btn-success">Lihat Selanjutnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- <div class="d-flex justify-content-center mt-4">
        {{ $movies->links() }}
    </div> --}}
@endsection
