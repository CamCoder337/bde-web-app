<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return redirect(route('shop.index'));
// })->name('/');

Route::get('/', function () {
    return redirect(route('home.index'));
})->name('home.index');

//Idea Routes
Route::get('home', [HomeController::class, 'index'])->name('home.index');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');


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
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

//Idea Routes
Route::get('ideas', [IdeaController::class, 'index'])->name('ideas.index');
Route::get('add-idea', [IdeaController::class, 'ideaForm'])->name('ideas.add_idea');
Route::post('add-idea', [IdeaController::class, 'addIdea']);

//Event Routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');

//Download All images
Route::get('/download-images', 'App\Http\Controllers\ImageController@downloadImages')->name('download-images');

//Admin Routes - Events
Route::get('add-event', [AdminController::class, 'eventForm'])->name('admin.add_event');
Route::post('add-event', [AdminController::class, 'addEvent']);

//Admin Routes - Product
Route::get('/add-product', [AdminController::class, 'productForm'])->name('admin.add_product');
Route::post('/add-product', [AdminController::class, 'addProduct']);
// Route::middleware(['auth'])->group(function () {
//     Route::get('/add-product', [AdminController::class, 'productForm'])->name('admin.add_product');
//     Route::post('/add-product', [AdminController::class, 'addProduct']);
// });