<?php

// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;

// use App\Http\Controllers\AuthController;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// Route::get('/', action:'App\Http\Controllers\HomeController@index');

// // Trang đăng nhập và xử lý đăng nhập
// Route::get('/login-admin', [App\Http\Controllers\AuthController::class, 'login_index'])->name('login-admin');
// Route::post('/login-admin', [App\Http\Controllers\AuthController::class, 'login_post']);

// // Route để đăng xuất
// Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// // Trang chi tiết sản phẩm
// Route::get('/detail/{id}', action:'App\Http\Controllers\HomeController@detail');

// // Trang admin với kiểm tra đăng nhập
// Route::get('/admin', function () {
//     $user = Session::get('user_admin');
//     if (!$user) {
//         return redirect()->route('login-admin');
//     }
//     return view('admin');
// });

// Route::post('/add-to-cart', action:'App\Http\Controllers\CartController@savecart');
// Route::get('/load-cart', action:'App\Http\Controllers\CartController@loadcart');
// Route::get('/cart-detail', action:'App\Http\Controllers\CartController@detailcart');
// Route::get('/info-cart', action:'App\Http\Controllers\CartController@infocart');
// Route::get('/list-product/{id}', action:'App\Http\Controllers\HomeController@list');
// Route::get('/login', action:'App\Http\Controllers\CustomerController@login_index');
// Route::post('/login-post', action:'App\Http\Controllers\CustomerController@login_post');
// Route::post('/update-cart', action:'App\Http\Controllers\CartController@update_cart');
// Route::get('/delete-p/{session_id}', action:'App\Http\Controllers\CartController@delete_cart');
// Route::get('/delete-all-p', action:'App\Http\Controllers\CartController@delete_all_product');

// Route::get('/register', action:'App\Http\Controllers\CustomerController@register_index');
// Route::get('/user-order', action:'App\Http\Controllers\CustomerController@get_order');
// Route::post('/register-post', action:'App\Http\Controllers\CustomerController@register_post');

// Route::get('/logout', action:'App\Http\Controllers\CustomerController@logout');
// Route::get('/dashboard/index', action:'App\Http\Controllers\DashboardController@index');
// Route::post('/dashboard/get', action:'App\Http\Controllers\DashboardController@get');

// Route::get('/search', action:'App\Http\Controllers\HomeController@search');

// Route::get('/user-info', action:'App\Http\Controllers\CustomerController@userinfo');
// Route::get('/order-info', action:'App\Http\Controllers\CustomerController@get_order');
// Route::get('/order-trash/{id}', action:'App\Http\Controllers\OrderController@trash');
// Route::prefix('orders')->group(function () {
//     Route::post('/save-order', [
//     	'as'=>'orders.save',
//     	'uses'=>'App\Http\Controllers\OrderController@save'
//     ]);
//     Route::post('/change-status', [
// 'as'=>'orders.status',
//     	'uses'=>'App\Http\Controllers\OrderController@change'
//     ]);
//     Route::get('/export-to-word/{id}', [
//     	'as'=>'orders.export',
//     	'uses'=>'App\Http\Controllers\OrderController@exporttoword'
//     ]);
//     Route::get('/index', [
//     	'as'=>'orders.index',
//     	'uses'=>'App\Http\Controllers\OrderController@index'
//     ]);
// });

// Route::prefix('categories')->group(function () {
//     Route::get('/index', [
//     	'as'=>'categories.index',
//     	'uses'=>'App\Http\Controllers\CategoryController@index'
//     ]);
//     Route::get('/create', [
//     	'as'=>'categories.create',
//     	'uses'=>'App\Http\Controllers\CategoryController@create'
//     ]);
//     Route::post('/save', [
//     	'as'=>'categories.save',
//     	'uses'=>'App\Http\Controllers\CategoryController@save'
//     ]);
//     Route::get('/edit/{id}', [
//     	'as'=>'categories.edit',
//     	'uses'=>'App\Http\Controllers\CategoryController@edit'
//     ]);
//     Route::post('/saveedit/{id}', [
//     	'as'=>'categories.saveedit',
//     	'uses'=>'App\Http\Controllers\CategoryController@saveedit'
//     ]);
//     Route::get('/delete/{id}', [
//     	'as'=>'categories.delete',
//     	'uses'=>'App\Http\Controllers\CategoryController@delete'
//     ]);
// });

// Route::prefix('statistics')->group(function () {
//     Route::get('/index', [
//     	'as'=>'statistics.index',
//     	'uses'=>'App\Http\Controllers\StatisticalController@index'
//     ]);
//     Route::get('/create', [
//     	'as'=>'statistics.create',
//     	'uses'=>'App\Http\Controllers\StatisticalController@create'
//     ]);
//     Route::post('/save', [
//     	'as'=>'statistics.save',
//     	'uses'=>'App\Http\Controllers\StatisticalController@save'
//     ]);
//     Route::get('/edit/{id}', [
//     	'as'=>'statistics.edit',
//     	'uses'=>'App\Http\Controllers\StatisticalController@edit'
//     ]);
//     Route::post('/saveedit/{id}', [
//     	'as'=>'statistics.saveedit',
//     	'uses'=>'App\Http\Controllers\StatisticalController@saveedit'
//     ]);
//     Route::get('/delete/{id}', [
//     	'as'=>'statistics.delete',
//     	'uses'=>'App\Http\Controllers\StatisticalController@delete'
//     ]);
// });

// Route::prefix('products')->group(function () {
//     Route::get('/index', [
//     	'as'=>'products.index',
//     	'uses'=>'App\Http\Controllers\ProductController@index'
//     ]);
//     Route::get('/create', [
//     	'as'=>'products.create',
//     	'uses'=>'App\Http\Controllers\ProductController@create'
//     ]);
//     Route::post('/save', [
//     	'as'=>'products.save',
//     	'uses'=>'App\Http\Controllers\ProductController@save'
//     ]);
//     Route::get('/edit/{id}', [
//     	'as'=>'products.edit',
//     	'uses'=>'App\Http\Controllers\ProductController@edit'
//     ]);
//     Route::post('/saveedit/{id}', [
//     	'as'=>'products.saveedit',
//     	'uses'=>'App\Http\Controllers\ProductController@saveedit'
//     ]);
//     Route::get('/delete/{id}', [
//     	'as'=>'products.delete',
//     	'uses'=>'App\Http\Controllers\ProductController@delete'
//     ]);
// });



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index']);

// Trang đăng nhập và xử lý đăng nhập
Route::get('/login-admin', [AuthController::class, 'login_index'])->name('login-admin');
Route::post('/login-admin', [AuthController::class, 'login_post']);

// Route để đăng xuất
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Trang chi tiết sản phẩm
Route::get('/detail/{id}', [HomeController::class, 'detail']);

// Trang admin với kiểm tra đăng nhập
Route::get('/admin', function () {
    $user = Session::get('user_admin');
    if (!$user) {
        return redirect()->route('login-admin');
    }
    return view('admin');
});

Route::post('/add-to-cart', [CartController::class, 'savecart']);
Route::get('/load-cart', [CartController::class, 'loadcart']);
Route::get('/cart-detail', [CartController::class, 'detailcart']);
Route::get('/info-cart', [CartController::class, 'infocart']);
Route::get('/list-product/{id}', [HomeController::class, 'list']);
Route::get('/login', [CustomerController::class, 'login_index']);
Route::post('/login-post', [CustomerController::class, 'login_post']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::get('/delete-p/{session_id}', [CartController::class, 'delete_cart']);
Route::get('/delete-all-p', [CartController::class, 'delete_all_product']);

Route::get('/register', [CustomerController::class, 'register_index']);
Route::get('/user-order', [CustomerController::class, 'get_order']);
Route::post('/register-post', [CustomerController::class, 'register_post']);

Route::get('/logout', [CustomerController::class, 'logout']);
Route::get('/dashboard/index', [DashboardController::class, 'index']);
Route::post('/dashboard/get', [DashboardController::class, 'get']);

Route::get('/search', [HomeController::class, 'search']);

Route::get('/user-info', [CustomerController::class, 'userinfo']);
Route::get('/order-info', [CustomerController::class, 'get_order']);
Route::get('/order-trash/{id}', [OrderController::class, 'trash']);

Route::prefix('orders')->group(function () {
    Route::post('/save-order', [OrderController::class, 'save'])->name('orders.save');
    Route::post('/change-status', [OrderController::class, 'change'])->name('orders.status');
    Route::get('/export-to-word/{id}', [OrderController::class, 'exporttoword'])->name('orders.export');
    Route::get('/index', [OrderController::class, 'index'])->name('orders.index');
});

Route::prefix('categories')->group(function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/save', [CategoryController::class, 'save'])->name('categories.save');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/saveedit/{id}', [CategoryController::class, 'saveedit'])->name('categories.saveedit');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
});

Route::prefix('statistics')->group(function () {
    Route::get('/index', [StatisticalController::class, 'index'])->name('statistics.index');
    Route::get('/create', [StatisticalController::class, 'create'])->name('statistics.create');
    Route::post('/save', [StatisticalController::class, 'save'])->name('statistics.save');
    Route::get('/edit/{id}', [StatisticalController::class, 'edit'])->name('statistics.edit');
    Route::post('/saveedit/{id}', [StatisticalController::class, 'saveedit'])->name('statistics.saveedit');
    Route::get('/delete/{id}', [StatisticalController::class, 'delete'])->name('statistics.delete');
});

Route::prefix('products')->group(function () {
    Route::get('/index', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/save', [ProductController::class, 'save'])->name('products.save');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/saveedit/{id}', [ProductController::class, 'saveedit'])->name('products.saveedit');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
});
