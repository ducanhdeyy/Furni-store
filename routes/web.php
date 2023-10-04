<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\BlogController as ClientBlogController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckOutController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('register', [LoginController::class, 'create'])->name('register');
Route::post('login/mana', [LoginController::class, 'Login'])->name('checkLogin');
Route::post('register/store', [LoginController::class, 'register'])->name('register_store');
Route::get('logout',[LoginController::class,'logout'])->name('Logout');

Route::middleware('auth')->group(function () {
Route::middleware('decentralization')->group(function () {
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('user', UserController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('order', OrderController::class);
});
});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('shop',[ShopController::class,'shop'])->name('shop');
Route::get('about',[AboutController::class,'about'])->name('about');
Route::get('blogClient',[ClientBlogController::class,'index'])->name('blog');
Route::get('services',[ServiceController::class,'services'])->name('services');
Route::get('contact',[ContactController::class,'contact'])->name('contact');

Route::get('/product/detail/{id}',[ProductDetailController::class,'index'])->name('product_detail');

//Cart
Route::prefix('cart')->group(function () {
    Route::get('/',[CartController::class,'index'])->name('cart');
    Route::post('/cart-add',[CartController::class,'add'])->name('addCart');
    Route::post('/update', [CartController::class, 'update'])->name('product_cart_update');
    Route::get('/delete/{rowId}', [CartController::class, 'delete'])->name('deleteProduct');
    Route::get('/destroy', [CartController::class, 'destroy'])->name('deleteCart');
});

//Client
Route::prefix('client')->group(function () {
    Route::get('/signInCLient',[ClientController::class,'index'])->name('client_signIn');
    Route::get('/signUpClient',[ClientController::class,'create'])->name('client_signUp');
    Route::post('/signInClient/signIn',[ClientController::class,'signIn'])->name('signIn');
    Route::post('/signUpClient/signUp',[ClientController::class,'store'])->name('signUp');
    Route::get('/logOut',[ClientController::class,'logout'])->name('logOut');
});


//Checkout
Route::prefix('checkout')->group(function () {
    Route::get('/check',[CheckOutController::class,'index'])->name('product_cart_checkout');
    Route::post('/check', [CheckOutController::class, 'addOrder'])->name('addOrder');
});
