<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/producto', [PostController::class, 'store'])->name('producto.store');
Route::delete('/producto/{producto}', [PostController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos/{id}/dashboard', [PostController::class, 'edit'])->name('productos.edit');
Route::patch('/productos/{id}', [PostController::class, 'update'])->name('productos.update');
Route::get('/producto', [PostController::class, 'ventas'])->name('productos.ventas');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
