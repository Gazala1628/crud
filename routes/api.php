<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employee;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//view
Route::get('/users', [employee::class, 'listUsers'])->name('api.users');
//edit and update
Route::get('/users/edit/{id}', [employee::class, 'editUser'])->name('users.edit');
Route::post('/users/update/{id}', [employee::class, 'updateUser'])->name('users.update');
//delete
Route::delete('/users/delete/{id}', [employee::class, 'deleteUser'])->name('users.delete');
//login
Route::get('/login', [employee::class, 'showLoginForm'])->name('login');
Route::post('/login', [employee::class, 'login']);
Route::post('/logout', [employee::class, 'logout'])->name('logout');
Route::get('/profile/{id}', [employee::class, 'profile'])->name('profile');