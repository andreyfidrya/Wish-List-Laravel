<?php

use App\Http\Controllers\ShoppingList;
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

Route::group(['namespace' => 'App\Http\Controllers\Categories'], function(){
    Route::get('/car', 'CarController');
    Route::get('/flat', 'FlatController');
    Route::get('/tourism', 'TourismController');
    Route::get('/clothes', 'ClothesController');
    Route::get('/fishing', 'FishingController');
    Route::get('/pets', 'PetsController');
    Route::get('/lera', 'LeraController');
});

Route::get('/', [ShoppingList::class, 'AllProducts']);

Route::group(['namespace' => 'App\Http\Controllers\Posts'], function(){
    Route::get('/add-product', 'CreateController');
    Route::post('/add-product', 'StoreController')->name('product.store'); 
    Route::get('/edit-product/{id}', 'EditController'); 
    Route::post('/update-product', 'UpdateController')->name('product.update'); 
    Route::get('/delete-product/{id}', 'DeleteController'); 
});

Route::group(['namespace' => 'App\Http\Controllers\Productstobuy'], function(){
    Route::get('/select-product/{id}', 'SelectProducts'); 
    Route::get('/unselect-product/{id}', 'UnselectProducts');
    Route::get('/shopping-cart', 'ShoppingCart')->name('shoppingcart');
    Route::get('/emptyshopping-cart','EmptyShoppingCart');   
});


Route::get('/search', [ShoppingList::class, 'search'])->name('search');

