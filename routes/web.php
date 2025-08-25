<?php

use App\Models\Tracking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrackingController;

Route::get('/', function () {
  return view('home');
});

Route::get('/order', function () {
  return view('form');
});

Route::get('/tracking', [TrackingController::class, 'index']);
Route::get('/tracking/{search}', function ($search) {
  // dd($search);
  return view('tracking', ['tracking' => \App\Models\Tracking::where('kode_pesanan', $search)->first()]);
});

Route::get('/login', [LoginController::class, 'index']);
