<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class ManageGenreController extends Controller
{
    public function index()
    {
        if(auth()->user()->role_id != 1)
        {
            return redirect('/');
        }
        
        $genres = Genre::all();
        $title = 'Manage Genre';
        return view('manage_genre', compact('title', 'genres'));
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return back();
    }
}
