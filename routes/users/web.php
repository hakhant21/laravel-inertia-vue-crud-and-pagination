<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\IndexController;


Route::middleware('auth')->group(function(){
    Route::get('/', IndexController::class)->name('users.index');
    Route::get('/create', [IndexController::class, 'create'])->name('users.create');
    Route::post('/store', [IndexController::class, 'store'])->name('users.store');
    Route::get('/edit/{user}', [IndexController::class, 'edit'])->name('users.edit');
    Route::put('/update/{user}',[IndexController::class, 'update'] )->name('users.update');
});
