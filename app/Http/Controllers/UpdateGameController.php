<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class UpdateGameController extends Controller
{
    public function index($id)
    {
        if(auth()->user()->role_id != 1)
        {
            return redirect('/');
        }

        $genres = Genre::all();
        $gameSelected = Game::find($id);
        $title = 'Update Game';
        return view('update_game', compact('title', 'genres', 'gameSelected'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::find($id);

        $request->validate([
            'genre_id' => 'required',
            'name' => 'required|min:5',
            'price' => 'required|integer|min:1',
            'description' => 'required|min:20',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);

        if($request->genre_id == $game->genre_id && $request->name == $game->name && $request->price == $game->price && $request->description == $game->description && $request->image == null) {
            return back()->withErrors('Nothing was changed.');
        }

        $game->genre_id = $request->genre_id;
        $game->name = $request->name;
        $game->price = $request->price;
        $game->description = $request->description;
        if($request->image != null)
        {
            $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/images'), $newImageName);
            $game->image = $newImageName;
        }
        
        $game->save();

        $request->session()->flash('success', 'Game updated successfully.');
        return redirect('/view_game/' . $request->genre_id);
    }
}
