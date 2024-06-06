<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employee;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [employee::class, 'listUsers'])->name('api.users');
Route::delete('/users/delete/{id}', [employee::class, 'deleteUser'])->name('users.delete');