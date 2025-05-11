<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Main_page');
});

use App\Http\Controllers\CategoryController;

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');


Route::get('/cart', function () {
    return view('shop_cart');
});

Route::get('/login', function () {
    return view('login_reg');
});

use App\Models\Product;

Route::get('/admin', function () {
    $products = Product::all();
    return view('admin_main', compact('products'));
})->middleware(['auth'])->name('admin');


Route::get('/order-info', function () {
    return view('order_info');
});

Route::get('/order-confirmation', function () {
    return view('order_confirmation');
});

Route::get('/payment-credit', function () {
    return view('payment_credit');
});

Route::get('/single-item', function () {
    return view('singleitem');
});

use App\Http\Controllers\ProductController;

Route::get('/product/{id}', [ProductController::class, 'show']);

use App\Http\Controllers\OrderController;

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/order-info', function () {
    return view('order_info');
})->name('order.info');
Route::get('/order-info', [OrderController::class, 'orderInfo'])->name('order.info');

use App\Http\Controllers\CartController;

Route::post('/add-to-cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add.old');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/update/{id}/{action}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

use App\Http\Controllers\AuthController;

Route::get('/login_reg', function () {
    return view('login_reg');
})->name('login_reg');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');


use App\Http\Controllers\AdminProductController;

Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::post('/admin/products', [AdminProductController::class, 'store']);
Route::delete('/admin/products/{id}', [AdminProductController::class, 'destroy']);
Route::put('/admin/products/{id}', [AdminProductController::class, 'update']);

Route::delete('/admin/products/{id}/image', [AdminProductController::class, 'deleteImage']);

use App\Http\Controllers\WishlistController;

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{productId}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});
