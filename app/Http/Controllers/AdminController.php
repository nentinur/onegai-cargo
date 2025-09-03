<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Dummy data statistik
        $stats = [
            'total_today' => 100,
            'sent' => 85,
            'pending' => 25,
            'delivered' => 56,
        ];

        // Dummy data chart pesanan 7 hari
        $weeklyChart = [
            'labels' => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            'data' => [20, 35, 40, 30, 50, 25, 60],
        ];

        return view('admin.index', compact('stats', 'weeklyChart'));
    }

    public function user()
    {
        $users = User::all();
        return view('admin.user', ['users' => $users]);
    }
}
