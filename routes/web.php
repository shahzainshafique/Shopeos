<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\ProductController;
use App\http\Controllers\Frontend\FrontendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------`-------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
  //     return view('welcome');
  // });
  
  Route::get('/',[FrontendController::class,'index']);
  
  Route::get('category',[FrontendController::class,'category']);
  Route::get('view-category/{slug}',[FrontendController::class,'viewcategory']);
  Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);
  Auth::routes();
Route::get('/home', [ App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','isAdmin'])->group(function () {

   Route::get('/dashboard', 'Admin\FrontendController@index');
  Route::get('categories','Admin\CategoryController@index');
  Route::get('add categories','Admin\CategoryController@add');
  Route::post('insert-category','Admin\CategoryController@insert');
Route::get('edit-category/{id}',[CategoryController::class,'edit']);
Route::put('update-category/{id}',[CategoryController::class,'update']);
Route::get('delete-category/{id}',[CategoryController::class,'destroy']);

Route::get('products',[ProductController::class,'index']);
Route::get('add products',[ProductController::class,'add']);
Route::post('insert-product',[ProductController::class,'insert']);

Route::get('edit-product/{id}',[ProductController::class,'edit']);
Route::put('update-product/{id}',[ProductController::class,'update']);
Route::get('delete-product/{id}',[ProductController::class,'destroy']);

});
