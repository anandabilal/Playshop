<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        if(auth()->user()->role_id != 2)
        {
            return redirect('/');
        }

        $transactions = Transaction::where('user_id', '=', auth()->user()->user_id)
        ->get();
        $genres = Genre::all();
        $title = 'Transaction History';
        return view('transaction_history', compact('title', 'genres', 'transactions'));
    }
}
