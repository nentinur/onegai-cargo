<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Data statistik
        $stats = [
            'total_today' => Customer::whereDate('created_at', now()->toDateString())->count(),
            // pending: pesanan yang dibuat kemarin (1 hari lalu)
            'pending' => Customer::whereDate('created_at', now()->subDay()->toDateString())->count(),
            // sent: pesanan yang dibuat lebih dari 3 hari lalu tapi tidak lebih dari 5 hari lalu (3-5 hari lalu)
            'sent' => Customer::whereDate('created_at', '<=', now()->subDays(3)->toDateString())
                ->whereDate('created_at', '>', now()->subDays(5)->toDateString())
                ->count(),
            // delivered: pesanan yang dibuat lebih dari 5 hari lalu
            'delivered' => Customer::whereDate('created_at', '<=', now()->subDays(5)->toDateString())->count(),
        ];

        // Data total pesanan 7 hari terakhir
        Carbon::setLocale('id');
        $weeklyChart = [
            'labels' => [
                now()->subDays(6)->translatedFormat('l'),
                now()->subDays(5)->translatedFormat('l'),
                now()->subDays(4)->translatedFormat('l'),
                now()->subDays(3)->translatedFormat('l'),
                now()->subDays(2)->translatedFormat('l'),
                now()->subDays(1)->translatedFormat('l'),
                now()->translatedFormat('l'),
            ],

            'data' => [
                Customer::whereDate('created_at', now()->subDays(6)->toDateString())->count(),
                Customer::whereDate('created_at', now()->subDays(5)->toDateString())->count(),
                Customer::whereDate('created_at', now()->subDays(4)->toDateString())->count(),
                Customer::whereDate('created_at', now()->subDays(3)->toDateString())->count(),
                Customer::whereDate('created_at', now()->subDays(2)->toDateString())->count(),
                Customer::whereDate('created_at', now()->subDays(1)->toDateString())->count(),
                Customer::whereDate('created_at', now()->toDateString())->count(),
            ],

        ];

        return view('admin.index', compact('stats', 'weeklyChart'));
    }

    public function user()
    {
        $users = User::all();
        return view('admin.user', ['users' => $users]);
    }

    public function list_order()
    {
        $orders = Customer::orderBy('created_at', 'desc')->get();
        return view('admin.order', ['orders' => $orders]);
    }
}
