<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $username = $request->email;
        $password = $request->password;

        $query = User::where('email', $username)->first();

        if (!$query) {
            return back()->with('error', 'Kamu tidak memiliki akses!');
        }

        if ($query && password_verify($password, $query->password)) {
            Auth::loginUsingId($query->id);
            return redirect()->route('admin');
        }

        return back()->with(['error' => 'Username atau password salah!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
