<?php

use App\Enums\MaritalStatusEnum;
use App\Http\Controllers\{ChurchController};
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/church', [ChurchController::class, 'index'])->name('churchs.index');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/', function () {
    return view('welcome');
});
