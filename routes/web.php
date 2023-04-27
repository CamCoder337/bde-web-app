<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PaypalController;
use App\Http\Livewire\Shoppingcart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('shop.index'));
})->name('/');

// Route::get('/', function () {
//     return redirect(route('home.index'));
// })->name('home.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Shop Routes
Route::get('shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shoppingcart', Shoppingcart::class)->name('shoppingcart');
Route::get('payment-cancel',[PaypalController::class,'cancel'])->name('payment.cancel');
Route::get('payment-success',[PaypalController::class,'success'])->name('payment.success');

//Idea Routes
Route::get('ideas', [IdeaController::class, 'index'])->name('ideas.index');

//Event Routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');