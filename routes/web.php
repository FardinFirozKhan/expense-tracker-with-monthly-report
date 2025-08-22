<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('expenses.index');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('expenses', ExpenseController::class)->only([
        'index', 'create', 'store'
    ]);
    Route::get('expenses/report', [ExpenseController::class, 'report'])->name('expenses.report');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
