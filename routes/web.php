<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\FavListItemController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\CustomerAccountController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/order/{tablenumber}', function($tablenumber){
    Session::put('tablenumber', $tablenumber);
    return redirect('/');
});

Route::get('/', [MenuItemController::class, 'getMenuList']);
Route::get('/search', [MenuItemController::class, 'searchItem']);

Route::get('/register',[CustomerAccountController::class, 'registerForm'])->middleware('guest');
Route::post('/register', [CustomerAccountController::class, 'register']);

Route::get('/login',[CustomerAccountController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [CustomerAccountController::class, 'login']);

Route::post('/logout', [CustomerAccountController::class, 'logout']);

Route::get('/favorite', [FavListItemController::class, 'getCustFav']);
Route::get('/history', [OrderController::class, 'getCustHistory']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::post('/cart', [OrderController::class, 'create']);
Route::get('/order_success', function(){
    return view('ordersuccess', ['title' => 'Order Success']);
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Buka halaman login admin
    Route::get('/login', [AdminAccountController::class, 'loginForm'])->name('adminLogin')->middleware('guest');
    // Aksi login admin
    Route::post('/login', [AdminAccountController::class, 'login'])->name('adminLoginPost');
    // Aksi logout admin
    Route::post('/logout', [AdminAccountController::class, 'logout'])->name('adminLogoutPost');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', [AdminAccountController::class, 'dashboardPage']);
    });
});