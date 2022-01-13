<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameDetailController extends Controller
{
    public function index($id)
    {
        $gameSelected = Game::find($id);
        $genres = Genre::all();
        $title = 'Game Detail';
        return view('game_detail', compact('title', 'genres', 'gameSelected'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', '=', auth()->user()->user_id)
        ->where('game_id', '=', $id)
        ->first();
  
        if($cart == null)
        { 
            $cart = [
                'user_id' => auth()->user()->user_id,
                'game_id' => $id,
                'quantity' => $request->quantity,
            ];
            Cart::Create($cart);
            $request->session()->flash('success', 'Game successfully added to a new cart.');
        } else {
            $cart->quantity += $request->quantity;
            $cart->save();
            $request->session()->flash('success', 'Game successfully added to an existing cart.');
        }

        return back();
    }
}
