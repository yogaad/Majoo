<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackAdmin; 

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
    return redirect()->route('backadmin.landing.index');
});


Route::name('backadmin.')->group(function() {
    Route::get('login', [BackAdmin\LoginController::class, 'index'])->name('auth.index');
    Route::get('home', [BackAdmin\ProdukController::class, 'home'])->name('landing.index');
    Route::post('login', [BackAdmin\LoginController::class, 'login'])->name('auth.login');
    Route::get('logout', [BackAdmin\LoginController::class, 'logout'])->name('auth.logout');
    Route::resources(['registration' => BackAdmin\RegistrationController::class ]);
     
    Route::middleware('auth')->group(function() {
        Route::resources([
            'users' => BackAdmin\UserController::class,
            'kategori-produk' => BackAdmin\KategoriProdukController::class,
            'produk' => BackAdmin\ProdukController::class,
             
        ]); 
        Route::post('users/logo', [BackAdmin\UserController::class, 'logos'])->name('users.logo');
        Route::get('dashboard', [BackAdmin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('list-registration', [BackAdmin\RegistrationController::class, 'dataRegistrasi'])->name('list-registration');
       
        Route::prefix('s2opt')->name('s2Opt.')->group(function () {  
            Route::get('kategori-produks', [BackAdmin\KategoriProdukController::class, 'getS2Options'])->name('kategori-produks');
       
        });
        
        Route::prefix('s2init')->name('s2Init.')->group(function () {  
            Route::get('edit-kategori', [BackAdmin\KategoriProdukController::class, 'getS2Init'])->name('edit-kategori');
        });
    });
});