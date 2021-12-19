<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'Register';
        return view('register', compact('title'));
    }
    
    public function store(Request $request)
    {
        $user = $request->validate([
            'username' => 'required|min:5',
            'email_address' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'address' => 'required|min:10',
            'gender' => 'required',
            'birth_date' => 'required',
        ]);

        $user['role_id'] = 2;
        $user['password'] = bcrypt($user['password']);

        User::create($user);

        $request->session()->flash('success', 'Registration successful.');
        return redirect('/login');
    }
}
