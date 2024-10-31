<?php

use App\Http\Controllers\Admin\BillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\AdminStatisticsController;
use App\Http\Controllers\Admin\VoucherController;
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
    Route::get('/statistics', [AdminStatisticsController::class, 'index'])->name('admin.statistics');
    Route::resource('categories', CategoryController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('products', ProductController::class);
    Route::resource('variants', VariantController::class);
    Route::resource('bills', BillController::class);
    Route::resource('vouchers', VoucherController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('product');

Route::get('/product-detail/{id}', [App\Http\Controllers\User\ProductDetailController::class, 'productdetail'])->name('productdetail');
Route::get('/get-variant-quantity', [App\Http\Controllers\User\ProductDetailController::class, 'getVariantQuantity']);
Route::post('/addtocart', [App\Http\Controllers\User\ProductDetailController::class, 'addToCart'])->name('productdetailcart');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');


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

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\UserVoucherController;

Route::post('/checkout/payment', [PaymentController::class, 'createPayment'])->name('payment.create');
Route::get('/checkout/return', [PaymentController::class, 'paymentReturn'])->name('payment.return');
Route::get('/payment/vnpay', [PaymentController::class, 'showVNPayForm'])->name('payment.vnpay');




Route::middleware(['auth'])->namespace('User')->group(function () {

    Route::post('/cart/apply-voucher', [UserVoucherController::class, 'applyVoucher'])->name('vouchers.apply');
    Route::post('/cart/remove-voucher', [UserVoucherController::class, 'removeVoucher'])->name('vouchers.remove');

});


Route::get('/bill', [App\Http\Controllers\User\BillController::class, 'index'])->name('bill');
Route::get('/bill-detail/{id}', [App\Http\Controllers\User\BillController::class, 'details'])->name('bill-detail');
Route::get('/bill-cancel/{id}', [App\Http\Controllers\User\BillController::class, 'billCancel'])->name('bill-cancel');
Route::get('/bill-success/{id}', [App\Http\Controllers\User\BillController::class, 'billSuccess'])->name('bill-success');
Route::get('/bill-return/{id}', [App\Http\Controllers\User\BillController::class, 'billReturn'])->name('bill-return');


Route::get('/user-comment', [App\Http\Controllers\User\CommentController::class, 'index'])->name('comment');
Route::get('/user-comment/rating/{id}', [App\Http\Controllers\User\CommentController::class, 'addComment'])->name('comment.add');
Route::post('/user-comment/rating', [App\Http\Controllers\User\CommentController::class, 'addPostComment'])->name('comment.addPost');
Route::get('/user-comment/detail/{id}', [App\Http\Controllers\User\CommentController::class, 'detailComment'])->name('comment.detail');



Route::get('/user-info', [App\Http\Controllers\User\InfoController::class, 'index'])->name('user-info');

Route::post('/user-info/update', [App\Http\Controllers\User\InfoController::class, 'update'])->name('user-info.update');
Route::post('/user-info/updateContact', [App\Http\Controllers\User\InfoController::class, 'updateContact'])->name('user-info.updateContact');
Route::post('/user-info/updatePassword', [App\Http\Controllers\User\InfoController::class, 'updatePassword'])->name('user-info.updatePassword');
Route::post('/user-info/delete', [App\Http\Controllers\User\InfoController::class, 'delete'])->name('user-info.delete');

Route::get('/address', [App\Http\Controllers\User\AddressController::class, 'address'])->name('address');
Route::post('/address/add', [App\Http\Controllers\User\AddressController::class, 'add'])->name('address.add');
Route::post('/address/update/{id}', [App\Http\Controllers\User\AddressController::class, 'update'])->name('address.update');
Route::put('/address/{id}/set-primary', [App\Http\Controllers\User\AddressController::class, 'setPrimary'])->name('address.setPrimary');
