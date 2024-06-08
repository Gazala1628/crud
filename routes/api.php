<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//form visible
Route::get('/employees/student', function () {
    return view('student');
})->name('employees.student');
Route::post('/employees', [ApiController::class, 'store'])->name('employees.store');

 
   