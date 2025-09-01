<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function user()
    {
        $users = collect([
            ['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '0811111111', 'role' => 'user'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '0811111111', 'role' => 'user'],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'phone' => '0811111111', 'role' => 'admin'],
            ['name' => 'Bob Brown', 'email' => 'bob@example.com', 'phone' => '0811111111', 'role' => 'user'],
        ])->map(function ($user) {
            return (object) $user;
        });
        return view('admin.user', ['users' => $users]);
    }
}
