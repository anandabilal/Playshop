<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Genre;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MyCartController extends Controller
{
    public function index()
    {
        if(auth()->user()->role_id != 2)
        {
            return redirect('/');
        }

        $carts = DB::table('carts')
        ->leftJoin('users', 'carts.user_id', '=', 'users.user_id')
        ->leftJoin('games', 'carts.game_id', '=', 'games.game_id')
        ->where('carts.user_id', '=', auth()->user()->user_id)
        ->get([
            'carts.cart_id',
            'carts.user_id',
            'games.game_id',
            'games.name',
            'games.price',
            'carts.quantity',
            'games.image',
            DB::raw('games.price * carts.quantity as sub_total'),
        ]);

        $grandTotal = DB::table('carts')
        ->join('users', 'carts.user_id', '=', 'users.user_id')
        ->join('games', 'carts.game_id', '=', 'games.game_id')
        ->where('carts.user_id', '=', auth()->user()->user_id)
        ->get([
            DB::raw('SUM(games.price * carts.quantity) as grand_total'),
        ]);

        $genres = Genre::all();
        $title = 'My Cart';
        return view('my_cart', compact('title', 'genres', 'carts', 'grandTotal'));
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:0',
        ]);
        
        if($validator->fails())
        {
            $request->session()->flash('error' . $cart->cart_id, $validator->errors()->first());
            return back();
        }

        if($cart->quantity == $request->quantity)
        {
            $request->session()->flash('error' . $cart->cart_id, 'Nothing was changed.');
            return back();
        } else if($request->quantity == 0) {
            $this->remove($id);
            return back();
        } else {
            $cart->quantity = $request->quantity;
            $cart->save();
        }
    
        $request->session()->flash('success' . $cart->cart_id, 'Quantity updated successfully.');
        return back();
    }

    public function remove($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
    }

    public function destroy()
    {
        $carts = DB::table('carts')
        ->leftJoin('users', 'carts.user_id', '=', 'users.user_id')
        ->leftJoin('games', 'carts.game_id', '=', 'games.game_id')
        ->where('carts.user_id', '=', auth()->user()->user_id)
        ->get([
            'carts.cart_id',
            'carts.user_id',
            'games.game_id',
            'carts.quantity',
        ]);
        
        $this->store($carts);
        return back();
    }

    public function store($carts)
    {
        $newTransaction = [
            'user_id' => auth()->user()->user_id,
        ];
        $currentTransaction = Transaction::create($newTransaction);

        foreach($carts as $cart)
        {
            $transactionDetail = [
                'transaction_id' => $currentTransaction->transaction_id,
                'game_id' => $cart->game_id,
                'quantity' => $cart->quantity,
            ];
            TransactionDetail::create($transactionDetail);
            $this->remove($cart->cart_id);
        }
    }

}
