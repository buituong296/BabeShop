<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\User\CartController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Sử dụng namespace đầy đủ cho các controller
    Route::resource('categories', CategoryController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('products', ProductController::class);
    Route::resource('variants', VariantController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('product');

Route::get('/product-detail/{id}', [App\Http\Controllers\User\ProductDetailController::class, 'productdetail'])->name('productdetail');
Route::get('/get-variant-quantity', [App\Http\Controllers\User\ProductDetailController::class, 'getVariantQuantity']);
Route::post('/addtocart', [App\Http\Controllers\User\ProductDetailController::class, 'addToCart'])->name('productdetailcart');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//
Route::get('/cart', [App\Http\Controllers\User\CartController::class, 'index'])->name('cart');


Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// Route cập nhật số lượng sản phẩm trong gi�� hàng
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// Route xóa sản phẩm khỏi giỏ hàng
Route::delete('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/checkout', [App\Http\Controllers\User\CheckOutController::class, 'checkout'])->name('checkout');
Route::get('/checkout_payment', [App\Http\Controllers\User\CheckOutController::class, 'checkout_payment'])->name('checkout_payment');
Route::get('/checkout_done', [App\Http\Controllers\User\CheckOutController::class, 'checkout_done'])->name('checkout_done');
// routes/web.php
Route::post('/checkout', [App\Http\Controllers\User\CheckOutController::class, 'processCheckout'])->name('checkout.process');
// routes/web.php
Route::get('/checkout/customer-info', [App\Http\Controllers\User\CheckOutController::class, 'showCustomerInfoForm'])->name('checkout.customer-info');
Route::post('/checkout/customer-info', [App\Http\Controllers\User\CheckOutController::class, 'storeCustomerInfo'])->name('checkout.customer-info.store');
// routes/web.php
Route::get('/checkout/payment-method', [App\Http\Controllers\User\CheckOutController::class, 'showPaymentMethodForm'])->name('checkout.payment-method');
Route::post('/checkout/payment-method', [App\Http\Controllers\User\CheckOutController::class, 'storePaymentMethod'])->name('checkout.payment-method.store');
// routes/web.php
Route::get('/checkout/bill-summary', [App\Http\Controllers\User\CheckOutController::class, 'showBillSummary'])->name('checkout.bill-summary');
// routes/web.php
Route::post('/checkout/save', [App\Http\Controllers\User\CheckOutController::class, 'storeBill'])->name('checkout.save');





