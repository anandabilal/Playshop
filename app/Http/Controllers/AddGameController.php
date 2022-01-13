<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class AddGameController extends Controller
{
    public function index()
    {
        if(auth()->user()->role_id != 1)
        {
            return redirect('/');
        }
        
        $genres = Genre::all();
        $title = 'Add Game';
        return view('add_game', compact('title', 'genres'));
    }

    public function store(Request $request)
    {
        $game = $request->validate([
            'genre_id' => 'required',
            'name' => 'required|unique:games|min:5',
            'price' => 'required|integer|min:1',
            'description' => 'required|min:20',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
        ]);
        
        $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('/images'), $newImageName);
        $game['image'] = $newImageName;
        
        Game::create($game);

        $request->session()->flash('success', 'Game added successfully.');
        return back();
    }
}
