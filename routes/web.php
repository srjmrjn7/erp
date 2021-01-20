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

//products
Route::get('/products/category','App\Http\Controllers\InventoryController@viewCategory')->name('viewCategory');
Route::post('/storeCategory','App\Http\Controllers\InventoryController@storeCategory')->name('storeCategory');


//brands
Route::get('/products/brands','App\Http\Controllers\InventoryController@viewBrands')->name('viewBrands');
Route::post('/storeBrand','App\Http\Controllers\InventoryController@storeBrand')->name('storeBrand');


//units
Route::get('/products/units','App\Http\Controllers\InventoryController@viewUnits')->name('viewUnits');
Route::post('/storeUnit','App\Http\Controllers\InventoryController@storeUnit')->name('storeUnit');

//taxes
Route::get('/products/taxes','App\Http\Controllers\InventoryController@viewTaxes')->name('viewTaxes');
Route::post('/storeTax','App\Http\Controllers\InventoryController@storeTax')->name('storeTax');

//apply taxes
Route::get('products/getAppliedTaxes','App\Http\Controllers\InventoryController@getAppliedTaxes')->name('getAppliedTaxes');
Route::post('/storeappliedTax','App\Http\Controllers\InventoryController@storeAppliedtax')->name('storeAppliedtax');

//products
Route::get('products/products','App\Http\Controllers\InventoryController@getProducts')->name('getProducts');
Route::post('/storeProducts','App\Http\Controllers\InventoryController@storeAppliedtax')->name('storeAppliedtax');


//stock count
Route::get('products/stockInvoices','App\Http\Controllers\InventoryController@stockInvoices')->name('stockInvoices');
Route::post('/storeStockInvoice','App\Http\Controllers\InventoryController@storeStockInvoice')->name('storeStockInvoice');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
