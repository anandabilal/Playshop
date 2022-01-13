@extends('layouts.main')

@section('container')
    <div class="updateGameContainer">
        <div class="updateGameHeader">
            <p>Update Game</p>
        </div>
        <div class="updateGame">
            <div class="boxImage">
                <img src="/images/{{ $gameSelected->image }}" alt="{{ $gameSelected->name }} image not found" width="250" height="250">
            </div>
            {{-- enctype="multipart/form-data" is needed for file uploads --}}
            <form action="/update_game/{{ $gameSelected->game_id }}" method="post" enctype="multipart/form-data">
                @csrf
                <table>
                    {{-- Genre --}}
                    <tr>
                        <td align="right">Genre</td>
                        <td>
                            <select name="genre_id" id="genre_id">
                                @foreach ($genres as $genre)
                                    @if ($genre->genre_id == $gameSelected->genre_id)
                                        <option value="{{ $genre->genre_id }}" selected>{{ $genre->name }}</option>
                                    @else
                                        <option value="{{ $genre->genre_id }}">{{ $genre->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    {{-- Game Name --}}
                    <tr>
                        <td align="right">Game Name</td>
                        <td>
                            <input type="text" name="name" id="name" value="{{ $gameSelected->name }}">
                        </td>
                    </tr>
                    {{-- Game Price --}}
                    <tr>
                        <td align="right">Game Price ($)</td>
                        <td>
                            <input type="number" name="price" id="price" value="{{ $gameSelected->price }}">
                        </td>
                    </tr>
                    {{-- Description --}}
                    <tr>
                        <td align="right">Description</td>
                        <td>
                            <textarea name="description" id="description">{{ $gameSelected->description }}</textarea>
                        </td>
                    </tr>
                    {{-- Game Image --}}
                    <tr>
                        <td align="right">Game Image</td>
                        <td align="left">
                            <input type="file" name="image" id="image" accept="image/*">
                        </td>
                    </tr>
                    {{-- Error --}}
                    @if ($errors->any())
                        <tr>
                            <td></td>
                            <td align="left">
                                <span class="error">{{ $errors->first() }}</span>
                            </td>
                        </tr>
                    @endif
                    {{-- Update Game --}}
                    <tr>
                        <td></td>
                        <td align="left">
                            <button type="submit">Update Game</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
