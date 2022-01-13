<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $title = 'Change Password';
        return view('change_password', compact('title', 'genres'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'required|same:new_password',
        ]);

        User::find(auth()->user()->user_id)->update(['password' => bcrypt($request->new_password)]);

        $request->session()->flash('success', 'Password updated successfully.');
        return back();
    }
}
