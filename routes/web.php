<?php

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



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'MainController@dashboard')->name('home')->middleware('auth');
route::get('/dashboard','MainController@dashboard')->middleware('auth');
// CUSTOM AUTH ROUTES

Route::get('/custom_login', 'MainController@login')->middleware('guest');

Route::get('/custom_register','MainController@register')->middleware('guest');

// CUSTOMERS
Route::get('/customer','CustomerController@index');
Route::post('/customer','CustomerController@submit');
Route::post('/customer/update','CustomerController@update');
Route::get('/customer/delete','CustomerController@delete');

// CATEGORIES / BRANDS
Route::get('/category','CategoryController@index');
Route::post('/category','CategoryController@submit');
Route::post('/category/update','CategoryController@update');
Route::get('/category/delete','CategoryController@delete');

// PRODUCTS
Route::get('/product','ProductController@index');
Route::post('/product','ProductController@submit');
Route::post('/product/update','ProductController@update');
Route::get('/product/delete','ProductController@delete');

// DISCOUNT OFFERS
Route::get('/discount','DiscountController@index');
Route::post('/discount','DiscountController@submit');
Route::post('/discount/update','DiscountController@update');
Route::get('/discount/delete','DiscountController@delete');

// SALE
Route::get('/sale','SaleController@index')->middleware('manager');
Route::get('/sale-details', 'SaleController@sale_detail')->middleware('manager');
Route::get('/pos/category','SaleController@pos_category')->middleware('user');
Route::get('/pos','SaleController@pos')->middleware('user');
Route::post('/generate-sales','SaleController@generate_sales')->middleware('user');

// USER
Route::get('/user','UserController@index')->middleware('admin');
Route::post('/user', 'UserController@submit')->middleware('admin');
Route::post('/user/update','UserController@update')->middleware('admin');
Route::get('/user/delete','UserController@delete');

// SUPER ADMIN
Route::get('/admin_user', 'UserController@view_admin')->middleware('superadmin');
Route::post('/admin_user', 'UserController@submit_admin')->middleware('superadmin');
Route::post('/admin_user/update', 'UserController@update_admin')->middleware('superadmin');