<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class UpdateGenreController extends Controller
{
    public function index($id)
    {
        if(auth()->user()->role_id != 1)
        {
            return redirect('/');
        }

        $genres = Genre::all();
        $genreSelected = Genre::find($id);
        $title = 'Update Genre';
        return view('update_genre', compact('title', 'genres', 'genreSelected'));
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        
        if($request->name == $genre->name)
        {
            $request->validate([
                'name' => 'required|min:5',
                'image' => 'nullable|mimes:jpg,jpeg,png,svg',
            ]);
        } else {
            $request->validate([
                'name' => 'required|min:5|unique:genres',
                'image' => 'nullable|mimes:jpg,jpeg,png,svg',
            ]);
        }

        if($request->name == $genre->name && $request->image == null)
        {
            return back()->withErrors('Nothing was changed.');
        }

        $genre->name = $request->name;
        if($request->image != null)
        {
            $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/images'), $newImageName);
            $genre->image = $newImageName;
        }

        $genre->save();

        $request->session()->flash('success', 'Genre updated successfully.');
        return redirect('/manage_genre');
    }
}
