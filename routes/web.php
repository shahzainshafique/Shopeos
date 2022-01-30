<?php

use Illuminate\Support\Facades\Route;

Use App\http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\ProductController;
use App\http\Controllers\Frontend\FrontendController;
use App\http\Controllers\Frontend\CartController;
use App\http\Controllers\Frontend\CheckoutController;
use App\http\Controllers\Frontend\UserController;


// Route::get('/', function () {
  //     return view('welcome');
  // });
  
  Route::get('/',[FrontendController::class,'index']);
  Route::get('category',[FrontendController::class,'category']);
  Route::get('view-category/{slug}',[FrontendController::class,'viewcategory']);
  Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);
  Auth::routes();
  // Route::get('/home', [ App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteproduct']);
Route::post('update-cart',[CartController::class,'updatecart']);

Route::middleware(['auth'])->group(function (){
 Route::get('cart',[CartController::class,'viewcart']);
 Route::get('checkout',[CheckoutController::class,'index']);
 Route::post('place-order',[CheckoutController::class,'placeorder']);

 
 Route::get('my-orders',[UserController::class,'index']);
 Route::get('view-order',[UserController::class,'view']);
});
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
