<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\NikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RykCartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('/login/login');
});


//.........................frontend...............----------------------
Route::get('frontend/front/{product}',[FrontController::class,'index'])->name('frontend.front');
Route::get('frontend/about',[FrontController::class,'create'])->name('frontend.about');
Route::get('/nike/front', [nikeController::class, 'indexm'])->name('nike.front');
Route::get('/nike/load-more', [nikeController::class, 'loadMore'])->name('nike.loadMore');
Route::get('/contact', function () { return view('contact');});


//---------------------Middleware---------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('nike/adminpannel',[FrontController::class,'index'])->name('nike.adminpannel');
    Route::get('/nike', [NikeController::class, 'index'])->name('nike.indexn');
Route::get('/nike/createn',[NikeController::class,'create'])->name('nike.createn');
Route::post('/nike',[NikeController::class,'store'])->name('nike.store');
Route::get('/nike/{product}/editn',[NikeController::class,'edit'])->name('nike.editn');
Route::put('/nike/{product}',[NikeController::class,'update'])->name('nike.update');
Route::delete('/nike/{product}',[NikeController::class,'destroy'])->name('nike.destroy');

// Show all orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
// Delete order
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
// Update status (Admin side)
Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});


//------------------------------CART SECTION--------------------------
Route::get('/cart', [RykCartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [RykCartController::class, 'store'])->name('cart.store');
Route::post('/cart/update/{id}', [RykCartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [RykCartController::class, 'destroy'])->name('cart.remove');
 

//..................................login form....................
Route::get('/register', [RegisterController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [RegisterController::class, 'showLoginForm']);
Route::post('/login', [RegisterController::class, 'login']);
Route::post('/logout', [RegisterController::class, 'logout']);


//----------------------Order section-----------------------------
// Order form (create)
Route::get('/orders/form', [OrderController::class, 'create'])->name('order.create');
// Place order
Route::post('/orders/place', [OrderController::class, 'placeOrder'])->name('order.place');
// Track order (Customer side)
Route::get('/orders/track', [OrderController::class, 'track'])->name('orders.track');
Route::match(['get', 'post'], '/orders/track/result', [OrderController::class, 'trackResult'])->name('orders.track.result');
// Show single order (Admin side)
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show');