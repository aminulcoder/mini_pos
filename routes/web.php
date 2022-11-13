<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UsersController;
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
Route::group(['prefix'=>'groups','as'=>'group.'], function(){

    Route::get('/',[UserGroupController::class,'index'])->name('list');
    Route::get('/create',[UserGroupController::class,'createGroup'])->name('create');
    Route::post('/store',[UserGroupController::class,'store'])->name('store');
    Route::get('/delete/{id}',[UserGroupController::class,'destroy'])->name('delete');

});
Route::resource('users', UserController::class);
Route::resource('categories', CategoriesController::class);

