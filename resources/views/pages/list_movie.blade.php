@extends('layout.main')
@section('title', 'List Movie')
@section('navMovie', 'active')
@section('container')

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-success"><i class="bi bi-film"></i> List of Movies</h2>
            {{-- <a href="{{ route('movie.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Add Movie
            </a> --}}
        </div>

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light text-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> Title</th>
                                <th scope="col"> Category</th>
                                <th scope="col"> Year</th>
                                <th scope="col" class="text-center"> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($movies as $index => $movie)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $movie->title }}</td>
                                    <td>{{ $movie->category->category_name }}</td>
                                    <td>{{ $movie->year }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('movie.detail', ['id' => $movie->id, 'slug' => $movie->slug]) }}"
                                            class="btn btn-outline-primary btn-sm me-1">
                                            <i class="bi bi-eye">Detail</i>
                                        </a>

                                        @if (auth()->user()->role !== 'user')
                                            <a href="{{ route('movie.edit', $movie->id) }}"
                                                class="btn btn-outline-warning btn-sm me-1">
                                                <i class="bi bi-pencil-square">Edit</i>
                                            </a>
                                        @endif

                                        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus movie ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash3">Hapus</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No movies available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
