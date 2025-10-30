<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TrackingController;

Route::get('/', function () {
  return view('home');
});

Route::post('/order', [OrderController::class, 'store']);
Route::get('/order/getAddress/{country}', [OrderController::class, 'getAddress']);
Route::get('/order/getAddress/id/{provinceId}', [OrderController::class, 'getRegencies']);
Route::get('/order/getAddress/id/regency/{regencyId}', [OrderController::class, 'getDistricts']);
Route::get('/order/getAddress/id/district/{districtId}', [OrderController::class, 'getVillages']);
Route::get('/order/getAddress/jp/{prefectureId}', [OrderController::class, 'getCities']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/tracking', [TrackingController::class, 'index']);

Route::middleware('auth')->group(
  function () {
    Route::get('/order', function () {
      return view('form');
    });
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/user', [AdminController::class, 'user'])->name('list-user');
    Route::post('/user/delete', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/user/edit', [AdminController::class, 'editUser'])->name('editUser');
    Route::post('/user/addUser', [AdminController::class, 'addUser'])->name('addUser');
    Route::get('/list-order', [AdminController::class, 'list_order'])->name('list_order');
    Route::post('/list-order/delete', [OrderController::class, 'deleteOrder'])->name('deleteOrder');
    Route::post('/list-order/edit', [OrderController::class, 'editOrder'])->name('editOrder');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  }
);
