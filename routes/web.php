<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\TicketController;


Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard') //als al ingelogd, ga naar dashboard, zo niet: login page
        : redirect()->route('login');
})->name('home');

// Dashboard route
Route::get('/dashboard', function () {
    $user = Auth::user();


    $ticketOrders = $user->ticketOrders()->with('bus')->get();


    $points = $user->points;
    $target = 100;
    $progress = min(100, ($points / $target) * 100);


    return view('dashboard', [
        'ticketOrders' => $ticketOrders,
        'points' => $points,
        'progress' => $progress,
        'target' => $target,
    ]);
})->middleware(['auth'])->name('dashboard');


Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

// Bus viewing route
Route::get('/buses/{bus}', [BusController::class, 'show'])->name('buses.show');

// Festival routes
Route::get('/festivals', [FestivalController::class, 'index'])->name('festivals.index');
Route::get('/festivals/{festival}', [FestivalController::class, 'show'])->name('festivals.show');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
