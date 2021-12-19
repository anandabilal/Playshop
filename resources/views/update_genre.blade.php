@extends('layouts.main')

@section('container')
    <div class="updateGenreContainer">
        <div class="updateGenreHeader">
            <p>Update Genre</p>
        </div>
        <div class="updateGenre">
            <div class="boxImage">
                <img src="/images/{{ $genreSelected->image }}" alt="{{ $genreSelected->name }} image not found" width="250" height="250">
            </div>
            {{-- enctype="multipart/form-data" is needed for file uploads --}}
            <form action="/update_genre/{{ $genreSelected->genre_id }}" method="post" enctype="multipart/form-data">
                @csrf
                <table>
                    {{-- Genre Name --}}
                    <tr>
                        <td align="right">Genre Name</td>
                        <td>
                            <input type="text" name="name" id="name" value="{{ $genreSelected->name }}">
                        </td>
                    </tr>
                    {{-- Genre Image --}}
                    <tr>
                        <td align="right">Genre Image</td>
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
                    {{-- Update Genre --}}
                    <tr>
                        <td></td>
                        <td align="left">
                            <button type="submit">Update Genre</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection