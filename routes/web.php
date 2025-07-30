<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\website\ProductDetailsController;
use App\Http\Controllers\Website\StripePaymentController;
use App\Http\Controllers\Website\WebsiteCategoryController;
use App\Http\Controllers\Website\WebsiteCouponController;
use App\Http\Controllers\Website\WishlistController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function () {
    session()->forget('user_id');
    return redirect('/login');
})->name('logout');

Route::get('/auth/checkout', function () {
    return view('website.checkout');
})->middleware('auth.check');




Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//Categories
Route::prefix('admin/categories')->name('admin.categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
});

//Brand
Route::prefix('admin/brands')->name('admin.brands.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('/create', [BrandController::class, 'create'])->name('create');
    Route::post('/', [BrandController::class, 'store'])->name('store');
    Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('edit');
    Route::put('/{brand}', [BrandController::class, 'update'])->name('update');
    Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('destroy');
});

//Products
Route::prefix('admin/products')->name('admin.products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

//Orders
Route::prefix('admin/orders')->name('admin.orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/{id}', [OrderController::class, 'show'])->name('show');
    Route::post('/{order}/status', [OrderController::class, 'updateStatus'])->name('updateStatus');
});

//Coupons
Route::prefix('admin/coupons')->name('admin.coupons.')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('index');
    Route::get('/create', [CouponController::class, 'create'])->name('create');
    Route::post('/', [CouponController::class, 'store'])->name('store');
    Route::get('/{coupon}/edit', [CouponController::class, 'edit'])->name('edit');
    Route::put('/{coupon}', [CouponController::class, 'update'])->name('update');
    Route::delete('/{coupon}', [CouponController::class, 'destroy'])->name('destroy');
});

//Users
Route::prefix('admin')->name('admin.')->middleware(['web'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
//-----------------------------------------------------------------------------------------//
// Website Routes "Home"
Route::get('/main-home', [HomeController::class, 'main_home'])->name('main-home');
Route::get('/home', [HomeController::class, 'index'])->name('website.home');
Route::get('/shop', [WebsiteCategoryController::class, 'index'])->name('website.shop');
Route::get('/search/shop', [HomeController::class, 'index'])->name('shop.index');


//-----------------------------------------//

// Subcategories by Main Category (e.g., Men, Women)
Route::prefix('category')->name('website.category.')->group(function () {
    Route::get('/{mainCategory:slug}/subcategories', [WebsiteCategoryController::class, 'showSubcategories'])->name('subcategories');
    Route::get('/subcategory/{subcategory:slug}/products', [WebsiteCategoryController::class, 'showSubcategoryProducts'])->name('subcategory.products');
});


Route::get('product/{product}', [ProductDetailsController::class, 'show'])->name('product.details');


//-----------------------------------------------------------------------------------------//

// Cart Routes
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/', [CartController::class, 'store'])->name('store');
    Route::put('/{itemKey}', [CartController::class, 'update'])->name('update');
    Route::delete('/{itemKey}', [CartController::class, 'destroy'])->name('destroy');
    Route::delete('/', [CartController::class, 'clear'])->name('clear');
});


//-----------------------------------------------------------------------------------------//

// Wishlist Routes
Route::prefix('wishlist')->name('wishlist.')->group(function () {
    Route::get('/', [WishlistController::class, 'index'])->name('index');
    Route::post('/', [WishlistController::class, 'store'])->name('store');
    Route::delete('/{productId}', [WishlistController::class, 'destroy'])->name('destroy');
});

// Checkout Routes
Route::prefix('shop')->name('shop.')->middleware('auth.check')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/checkout/apply-coupon', [WebsiteCouponController::class, 'apply'])->name('coupon.apply');
    Route::post('/coupon/remove', [WebsiteCouponController::class, 'remove'])->name('coupon.remove');
});


//payment routes
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/stripe', [StripePaymentController::class, 'index'])->name('stripe');
    Route::post('/stripe/charge', [StripePaymentController::class, 'charge'])->name('stripe.charge');
});

Route::post('/checkout/apply-coupon', [WebsiteCouponController::class, 'apply'])->name('coupon.apply');
Route::post('/coupon/remove', [WebsiteCouponController::class, 'remove'])->name('coupon.remove');



Route::get('/thank-you', function () {
    return view('website.cart.thankyou');
})->name('shop.thankyou');











