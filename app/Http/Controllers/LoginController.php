<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',

        ]);
    }

    public function signup()
    {
        return view('admin.signup');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);
        $data['created_at'] = now();
        $data['updated_at'] = now();
        // dd($data);
        User::create($data);
        return redirect('/admin')->with('success', 'Admin berhasil ditambahkan! Silakan login.');
    }
}
