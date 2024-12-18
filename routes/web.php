<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\TicketController;

Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

Route::get('/buses/{bus}', [BusController::class, 'show'])->name('buses.show');



Route::get('/festivals', [FestivalController::class, 'index'])->name('festivals.index');
Route::get('/festivals/{festival}', [FestivalController::class, 'show'])->name('festivals.show');


Route::get('/buses/{bus}', [BusController::class, 'show'])->name('buses.show');

Route::get('/', function () { //ik heb hier alle functies omdat er geen dashboard controller is
    $user = auth()->user();


    $points = $user->points;


    $target = 100;


    $progress = min(100, ($points / $target) * 100);

   // data naar dashboard
    return view('dashboard', [
        'points' => $points,
        'progress' => $progress,
        'target' => $target]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
