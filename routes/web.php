<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\ProductsController;

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

    Route::get('logout',[LoginController::class,'logout'])->name('logout');

    Route::group(['prefix' => 'groups', 'as' => 'group.'], function () {

        Route::get('/', [UserGroupController::class, 'index'])->name('list');
        Route::get('/create', [UserGroupController::class, 'createGroup'])->name('create');
        Route::post('/store', [UserGroupController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [UserGroupController::class, 'destroy'])->name('delete');
    });

    Route::resource('users', UserController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductsController::class);


});





