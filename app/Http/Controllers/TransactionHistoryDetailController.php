<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionHistoryDetailController extends Controller
{
    public function index($id)
    {
        $transaction = Transaction::find($id);

        if(auth()->user()->role_id != 2 || auth()->user()->user_id != $transaction->user_id)
        {
            return redirect('/');
        }

        $transactionDetails = TransactionDetail::leftJoin('games', 'transaction_details.game_id', '=', 'games.game_id')
        ->where('transaction_details.transaction_id', '=', $id)
        ->get([
            'transaction_details.transaction_detail_id',
            'transaction_details.transaction_id',
            'transaction_details.game_id',
            'transaction_details.quantity',
            'games.name',
            'games.price',
            'games.image',
            DB::raw('games.price * transaction_details.quantity as sub_total'),
        ]);

        $grandTotal = TransactionDetail::join('games', 'transaction_details.game_id', '=', 'games.game_id')
        ->where('transaction_details.transaction_id', '=', $id)
        ->get([
            DB::raw('SUM(games.price * transaction_details.quantity) as grand_total'),
        ]);

        $genres = Genre::all();
        $title = 'Transaction History Detail';
        return view('transaction_history_detail', compact('title', 'genres', 'transactionDetails', 'transaction', 'grandTotal'));
    }
}
