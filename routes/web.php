<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UsersalesController;
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


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.confirm');
Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', function () {
        return view('welcome');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'groups', 'as' => 'group.'], function () {

        Route::get('/', [UserGroupController::class, 'index'])->name('list');
        Route::get('/create', [UserGroupController::class, 'createGroup'])->name('create');
        Route::post('/store', [UserGroupController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [UserGroupController::class, 'destroy'])->name('delete');
    });

    Route::resource('users', UserController::class);
    Route::get('users/{id}/sales', [UsersalesController::class, 'index'])->name('user.sales');
    Route::get('users/{id}/purchases', [UserPurchasesController::class, 'index'])->name('user.purchases');

    Route::get('users/{id}/payments', [UserPaymentsController::class, 'index'])->name('user.payments');
    Route::post('users/{id}/payments', [UserPaymentsController::class, 'store'])->name('user.payments.store');
    Route::delete('users/{id}/payments/{payment_id}',[UserPaymentsController::class, 'destroy'])->name('user.payments.destroy');


    Route::get('users/{id}/receipts', [UserReceiptsController::class, 'index'])->name('user.receipts');
    Route::post('users/{id}/receipts', [UserReceiptsController::class, 'store'])->name('user.receipts.store');
    Route::delete('users/{id}/receipts/{receipt_id}', [UserReceiptsController::class, 'destroy'])->name('user.receipts.destroy');
    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductsController::class);
});
