@extends('layouts.main')

@section('container')
    <div class="viewGameContainer">
        <h1>{{ $genreSelected->name }}</h1>
        <div class="viewGameHeader">
            <div class="viewGameBar">
                <div class="viewGameSearchBar">
                    <form action="/view_game/{{ $genreSelected->genre_id }}" method="get">
                        @csrf
                        <input type="search" placeholder="Search by name or price.." name="search" id="search" value="{{ request('search') }}">
                        <button type="submit">Search</button>
                        {{-- Successful Update Game --}}
                        @if (session()->has('success'))
                            <span class="success">{{ session('success') }}</span>
                        @endif
                    </form>
                </div>
                {{-- Pagination --}}
                @if ($games->hasPages())
                    <div class="viewGamePagination">
                        @if ($games->onFirstPage())
                            <p><< Prev</p>
                            <p>({{ $games->currentPage() }}/{{ $games->lastPage() }})</p>
                            <a href="{{ $games->nextPageUrl() }}">Next >></a>
                        @elseif ($games->currentPage() < $games->lastPage())
                            <a href="{{ $games->previousPageUrl() }}"><< Prev</a>
                            <p>({{ $games->currentPage() }}/{{ $games->lastPage() }})</p>
                            <a href="{{ $games->nextPageUrl() }}">Next >></a>
                        @else
                            <a href="{{ $games->previousPageUrl() }}"><< Prev</a>
                            <p>({{ $games->currentPage() }}/{{ $games->lastPage() }})</p>
                            <p>Next >></p>
                        @endif
                    </div>
                @endif
            </div>
            <div class="viewGame">
                @foreach ($games as $game)
                    <div class="boxOuter">
                        <div class="boxInner">
                            <img src="/images/{{ $game->image }}" alt="{{ $game->name }} image not found" width="350" height="350">
                            <a href="/game_detail/{{ $game->game_id }}">{{ $game->name }}</a>
                            <p>US$ {{ $game->price }}</p>
                            @auth
                                {{-- Admin --}}
                                @if (auth()->user()->role_id == 1)
                                    <div class="boxButton">
                                        {{-- Delete Game --}}
                                        <form action="/view_game/delete/{{ $game->game_id }}" method="post">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this game?')">Delete Game</button>
                                        </form>
                                        {{-- Update Game --}}
                                        <a class="updateButton" href="/update_game/{{ $game->game_id }}">Update Game</a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
