@extends('layouts.main')

@section('container')
    <div class="homeContainer">
        <h1>Welcome to Playshop</h1>
        <p>A Video Game Store For All Gamers</p>
        <div class="homeHeader">
            <h2>Genres</h2>
            <div class="home">
                @foreach ($genres as $genre)
                    <div class="boxOuter">
                        <div class="boxInner">
                            <a href="/view_game/{{ $genre->genre_id }}">{{ $genre->name }}</a>
                            <img src="/images/{{ $genre->image }}" alt="{{ $genre->name }} image not found" width="350" height="350">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>      
    </div>
@endsection
