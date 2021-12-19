<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewGameController extends Controller
{
    public function index($id)
    {
        $games = DB::table('games')
        ->where('genre_id', '=', $id)
        ->paginate(5);

        if($games->count() == 0 && $games->currentPage() != 1)
        {
            return redirect($games->previousPageUrl());
        }

        if(request('search'))
        {
            $games = DB::table('games')
            ->where('genre_id', '=', $id)
            ->where(function($query) {
                $query
                    ->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('price', '=', request('search'));
            })
            ->paginate(5);
        }

        $genres = Genre::all();
        $genreSelected = Genre::find($id);

        $title = 'View Game';
        return view('view_game', compact('title', 'genres', 'genreSelected', 'games'));
    }

    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();
        return back();
    }
}
