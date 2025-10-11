<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['role:admin,manager'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// authenticate just login user for create
Route::middleware('auth')->group(function(){

    //rosource use shortcut its create auto 7 route such that edit update index
    Route::resource('documents',DocumentsController::class);

    //publish or not
    // Route::post('documents/{documents}/publish',[DocumentsController::class, 'publish'])->name  ('documents.publish');
});


require __DIR__.'/auth.php';
