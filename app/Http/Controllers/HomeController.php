<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $title = 'Home';
        return view('home', compact('title', 'genres'));
    }
}
