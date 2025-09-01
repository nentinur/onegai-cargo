<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TrackingController;

Route::get('/', function () {
  return view('home');
});

Route::get('/order', function () {
  return view('form');
});
Route::post('/order', [OrderController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/tracking/', [TrackingController::class, 'index']);
// Route::get('/tracking/{search}', function ($search) {
//   // dd($search);
//   return view('tracking', ['tracking' => \App\Models\Customer::where('kode_resi', $search)->first()]);
// });

Route::middleware('auth')->group(
  function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/user', [AdminController::class, 'user'])->name('list-user');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  }
);
