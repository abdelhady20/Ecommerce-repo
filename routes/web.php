<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminAuthController;
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
use Illuminate\Support\Facades\Auth;
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


//Admin Routes - dashboard login

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Admin Routes - Protected by Admin Middleware
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth:admin'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Categories
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        // Brands
        Route::prefix('brands')->name('brands.')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('index');
            Route::get('/create', [BrandController::class, 'create'])->name('create');
            Route::post('/', [BrandController::class, 'store'])->name('store');
            Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('edit');
            Route::put('/{brand}', [BrandController::class, 'update'])->name('update');
            Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('destroy');
        });

        // Products
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/', [ProductController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProductController::class, 'update'])->name('update');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
        });

        // Orders
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/{id}', [OrderController::class, 'show'])->name('show');
            Route::post('/{order}/status', [OrderController::class, 'updateStatus'])->name('updateStatus');
        });

        // Coupons
        Route::prefix('coupons')->name('coupons.')->group(function () {
            Route::get('/', [CouponController::class, 'index'])->name('index');
            Route::get('/create', [CouponController::class, 'create'])->name('create');
            Route::post('/', [CouponController::class, 'store'])->name('store');
            Route::get('/{coupon}/edit', [CouponController::class, 'edit'])->name('edit');
            Route::put('/{coupon}', [CouponController::class, 'update'])->name('update');
            Route::delete('/{coupon}', [CouponController::class, 'destroy'])->name('destroy');
        });

        // Users
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        });
    });

//-----------------------------------------------------------------------------------------//
// Website Routes "Home"
Route::get('/', [HomeController::class, 'main_home'])->name('main-home');
Route::get('/home', [HomeController::class, 'index'])->name('website.home');
Route::get('/shop', [WebsiteCategoryController::class, 'index'])->name('website.shop');
Route::get('/search/shop', [HomeController::class, 'index'])->name('shop.index');


//---------User login and register------------//
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::guard('web')->logout();
    return redirect('/login');
})->name('logout');

//--------------------------------------------------------------------------------------//

// Subcategories by Main Category (e.g., Men, Women)
//Route::prefix('category')->name('website.category.')->group(function () {
//    Route::get('/subcategory/{subcategory:slug}/products', [WebsiteCategoryController::class, 'showSubcategoryProducts'])
//        ->name('subcategory.products');
//    Route::get('/{mainCategory:slug}/subcategories', [WebsiteCategoryController::class, 'showSubcategories'])
//        ->name('subcategories');
//});



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

Route::get('/auth/checkout', function () {
    return view('website.checkout');
})->middleware('auth.check');


//payment routes
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/stripe', [StripePaymentController::class, 'index'])->name('stripe');
    Route::post('/stripe/charge', [StripePaymentController::class, 'charge'])->name('stripe.charge');
});

Route::post('/checkout/apply-coupon', [WebsiteCouponController::class, 'apply'])->name('coupon.apply');
Route::post('/coupon/remove', [WebsiteCouponController::class, 'remove'])->name('coupon.remove');



Route::middleware('auth.check')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::post('/account/password', [AccountController::class, 'updatePassword'])->name('account.password.update');


    Route::get('/account/addresses', [AccountController::class, 'addresses'])->name('account.addresses');
    Route::post('/account/addresses/{id}/default', [AccountController::class, 'setDefaultAddress'])->name('account.address.default');
    Route::delete('/account/address/{id}', [AccountController::class, 'deleteAddress'])->name('account.address.delete');
});



Route::get('/thank-you', function () {
    return view('website.cart.thankyou');
})->name('shop.thankyou');











