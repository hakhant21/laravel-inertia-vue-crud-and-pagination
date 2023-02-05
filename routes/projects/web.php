<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Projects\IndexController;

Route::prefix('projects')->middleware('auth')->group(function(){
    Route::get('/', IndexController::class)->name('projects.index');
    Route::get('/create', [IndexController::class, 'create'])->name('projects.create');
    Route::post('/store', [IndexController::class, 'store'])->name('projects.store');
    Route::get('/edit/{project}', [IndexController::class, 'edit'])->name('projects.edit');
    Route::put('/update/{project}',[IndexController::class, 'update'] )->name('projects.update');
    Route::delete('/delete/{project}', [IndexController::class, 'delete'])->name('projects.delete');
});
