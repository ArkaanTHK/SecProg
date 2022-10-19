<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(([
            'name' => 'required|max:255',
            'username' => ['required', 'min:8', 'max:20', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:100',

        ]));
        // User::create([
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        // dd(User::create($validatedData));
        User::create($validatedData);
        Session::flash('success', 'Registration Success');
        return redirect('/login');
    }
}
