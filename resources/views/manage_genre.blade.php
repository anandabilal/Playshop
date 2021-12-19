@extends('layouts.main')

@section('container')
    <div class="manageGenreContainer">
        <h1>Manage Genre</h1>
        <div class="manageGenreHeader">
            <div class="manageGenreMessage">
                {{-- Successful Update --}}
                @if (session()->has('success'))
                    <span class="success">{{ session('success') }}</span>
                @endif
            </div>
            <div class="manageGenre">
                @foreach ($genres as $genre)
                    <div class="boxOuter">
                        <div class="boxInner">
                            <img src="/images/{{ $genre->image }}" alt="{{ $genre->name }} image not found" width="350" height="350">
                            <p>{{ $genre->name }}</p>
                            <div class="boxButton">
                                {{-- Delete Genre --}}
                                <form action="/manage_genre/delete/{{ $genre->genre_id }}" method="post">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this genre?')">Delete Genre</button>
                                </form>
                                {{-- Update Genre --}}
                                <a class="updateButton" href="/update_genre/{{ $genre->genre_id }}">Update Genre</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
