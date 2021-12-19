@extends('layouts.main')

@section('container')
    <div class="addGameContainer">
        <div class="addGameHeader">
            <p>Add Game</p>
        </div>
        <div class="addGame">
            {{-- enctype="multipart/form-data" is needed for file uploads --}}
            <form action="/add_game" method="post" enctype="multipart/form-data">
                @csrf
                <table>
                    {{-- Genre --}}
                    <tr>
                        <td align="right">Genre</td>
                        <td align="left">
                            <select name="genre_id" id="genre_id">
                                <option value="" selected disabled hidden>Choose a Genre</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->genre_id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    {{-- Game Name --}}
                    <tr>
                        <td align="right">Game Name</td>
                        <td>
                            <input type="text" name="name" id="name">
                        </td>
                    </tr>
                    {{-- Game Price --}}
                    <tr>
                        <td align="right">Game Price ($)</td>
                        <td>
                            <input type="number" name="price" id="price">
                        </td>
                    </tr>
                    {{-- Description --}}
                    <tr>
                        <td align="right">Description</td>
                        <td>
                            <textarea name="description" id="description"></textarea>
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
                    {{-- Successful Add Game --}}
                    @if (session()->has('success'))
                        <tr>
                            <td></td>
                            <td align="left">
                                <span class="success">{{ session('success') }}</span>
                            </td>
                        </tr>
                    @endif
                    {{-- Add Game --}}
                    <tr>
                        <td></td>
                        <td align="left">
                            <button type="submit">Add Game</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
