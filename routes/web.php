<?php

use App\Http\Controllers\{ChurchController};
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/churches', [ChurchController::class, 'index'])->name('churches.index');
Route::delete('/churches/{id}', [ChurchController::class, 'destroy'])->name('churches.destroy');
Route::put('churches/{id}', [ChurchController::class, 'update'])->name('churches.update');
Route::get('churches/{id}/edit', [ChurchController::class, 'edit'])->name('churches.edit');
Route::get('churches/create', [ChurchController::class, 'create'])->name('churches.create');
Route::post('/churches', [ChurchController::class, 'store'])->name('churches.store');
Route::get('/churches/{id}', [ChurchController::class, 'show'])->name('churches.show');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/', function () {
    return view('welcome');
});
