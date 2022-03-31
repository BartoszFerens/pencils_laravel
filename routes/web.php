<?php
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->names('admin.users');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->names('admin.products');
    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class)->names('admin.brands');
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->names('admin.orders');
    Route::resource('invoices', \App\Http\Controllers\Admin\InvoiceController::class)->names('admin.invoices');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('my-account', [\App\Http\Controllers\MyAccountController::class, 'show'])->name('my-account.show');
    Route::get('orders', [App\Http\Controllers\MyOrderController::class, 'index'])->name('orders.index');
});

//CRUD
Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

//Cart
Route::get('/', [CartController::class, 'index']);  
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
