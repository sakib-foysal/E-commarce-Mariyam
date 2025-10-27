<?php

use Illuminate\Support\Facades\Schema;

Route::get('/get-columns', function () {
    return Schema::getColumnListing('stocks');
});

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderVariantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\EarnNameController;
use App\Http\Controllers\ExpenseNameController;
use App\Http\Controllers\EarnController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OfflineCartController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\StockController;



Route::get('/search-products', [WelcomeController::class, 'search'])->name('search.products');
Route::get('/clear-all', function() { Artisan::call('optimize:clear'); return redirect()->to('/'); });
Route::get('/lanmango', [WelcomeController::class, 'lanmango']);
Route::post('/form-submit', [WelcomeController::class, 'fishinsert'])->name('form.submit');
Route::get('/form-submissions', [WelcomeController::class, 'index2'])->name('form-submissions.index2');

Route::get('/orderlist', [HomeController::class, 'orderlist'])->name('orderlist.orderlist');
Route::post('/admin/update-order-status', [HomeController::class, 'updateOrderStatus'])->name('admin.updateOrderStatus');


Route::get('/offline-cart', [OfflineCartController::class, 'index'])->name('offline.cart');
Route::post('/offline-cart/add', [OfflineCartController::class, 'addToCart'])->name('offline.cart.add');
Route::post('/offline-cart/remove/{id}', [OfflineCartController::class, 'removeFromCart'])->name('offline.cart.remove');
Route::get('/offline-orders', [OfflineCartController::class, 'showOrders'])->name('offline.orders');


Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/shop', [WelcomeController::class, 'shop'])->name('shop');
Route::get('/category_wise_product/{id}', [WelcomeController::class, 'category_wise_product']);
Route::get('/sub_category_wise_product/{id}', [WelcomeController::class, 'sub_category_wise_product']);
Route::get('/product_details/{id}', [WelcomeController::class, 'product_details']);
Route::get('/import_products', [WelcomeController::class, 'import_products']);
Route::get('/export_products', [WelcomeController::class, 'export_products']);
Route::get('/trade_products', [WelcomeController::class, 'trade_products']);
Route::post('/login2/{id}', [WelcomeController::class, 'login2'])->name('login2');
Route::get('/login3', [WelcomeController::class, 'login3'])->name('login3');
Route::get('/register2', [WelcomeController::class, 'register2'])->name('register2');

Route::post('/orderNow', [OrderController::class, 'orderNow']);

Auth::routes();
Route::get('/source', [HomeController::class, 'source'])->name('source');
Route::resource('sources', SourceController::class);
Route::get('/ofline_sales', [HomeController::class, 'ofline_sales'])->name('ofline_sales');
Route::get('/cart/count', [HomeController::class, 'getCartCount']);
Route::get('/add-to-cart/{productId}', [HomeController::class, 'addToCart'])->middleware('auth');
Route::get('/cart', [HomeController::class, 'cart'])->middleware('auth');
Route::put('/cart/update/{id}', [HomeController::class, 'updateCartItem'])->name('cart.update');
Route::delete('/cart/delete/{id}', [HomeController::class, 'deleteCartItem'])->name('cart.delete');
Route::post('/checkout', [HomeController::class, 'checkout'])->middleware('auth');
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');




// USER----------------------------------------------------------------------------------------
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/search-orders', [HomeController::class, 'searchOrders'])->name('search.orders');

    Route::resource('orders', OrderController::class);
    Route::get('/delete_order_variant/{id}', [OrderVariantController::class,'delete_order_variant']);
    Route::put('/update_user_address', [UserController::class,'update_user_address']);
});



// ADMIN---------------------------------------------------------------------------------------
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::resource('settings', SettingController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('units', UnitController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('socials', SocialController::class);
    Route::resource('earnnames', EarnNameController::class);
    Route::resource('expensenames', ExpenseNameController::class);
    Route::resource('earns', EarnController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('stocks', StockController::class);

    Route::post('/fetch_sub_categories', [ProductController::class, 'fetch_sub_categories']);
    Route::put('/product_variant_quantity_update/{id}', [ProductController::class, 'product_variant_quantity_update']);


});


Route::get('/clear-all', function() { Artisan::call('optimize:clear'); return redirect()->to('/'); });
Route::get('/migrate-fresh', function() { Artisan::call('migrate:fresh'); return redirect()->to('/'); });
Route::get('/migrate-fresh-seed', function() { Artisan::call('migrate:fresh --seed'); return redirect()->to('/'); });
