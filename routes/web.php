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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/admin','admin.index');
// Route::view('/','front.home.index');
// Route::get('/','Front\HomeController@index');
Route::get('/','Front\HomeController@index');
Route::get('/category{category}','Front\CategoryController@show')->name('front.category.show');
Route::get('local',function (){
    session(['local'=>request('local')]);
    return redirect('/');
});

Route::get('/carts/add/{product_id}/q/{quantity}','Front\CartController@store')->name('front.carts.store');
Route::get('/carts','Front\CartController@index')->name('front.carts.index');
Route::get('/carts/remove/{index}','Front\CartController@destroy')->name('front.carts.destroy');
Route::post('carts/update','Front\CartController@update');
Route::post('/checkout','Front\OrderController@store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
