<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\CustomerAccountController;
use Illuminate\Support\Facades\Session;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/order/{tablenumber}', function($tablenumber){
    Session::put('tablenumber', $tablenumber);
    return redirect('/browse');
});

Route::get('/browse', [MenuItemController::class, 'getMenuList'])->middleware('adminauth');

Route::get('/register', function(){
    return view('registpage', ['title' => 'Register']);
})->middleware('guest');

Route::post('/register', [CustomerAccountController::class, 'register']);

Route::get('/login', function(){
    return view('customer.loginPage', ['title' => 'Login']);
})->name('customerLogin')->middleware('guest');

Route::post('/login', [CustomerAccountController::class, 'login']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Buka halaman login admin
    Route::get('/login', function(){
        return view('admin.loginpage');
    })->name('adminLogin')->middleware('guest');
    // Aksi login admin
    Route::post('/login', [AdminAccountController::class, 'login'])->name('adminLoginPost');
    // Aksi logout admin
    Route::post('/logout', [AdminAccountController::class, 'logout'])->name('adminLogoutPost');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('adminDashboard');

    });
});

// Route::post('/order/{tablenumber}', function(){
//     return view('menupage', ['title' => 'Order',
//                              'table_number' => $tablenumber                        
//                             ]);
// }
// );