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

//categories
Route::get('/products/category','App\Http\Controllers\InventoryController@viewCategory')->name('viewCategory');
Route::get('/products/category/delete/{id}','App\Http\Controllers\InventoryController@deleteCategory')->name('deleteCategory');
Route::get('/products/editCategory/{id}','App\Http\Controllers\InventoryController@editCategory')->name('editCategory');
Route::post('/storeCategory','App\Http\Controllers\InventoryController@storeCategory')->name('storeCategory');
Route::post('/updateCategory/{id}','App\Http\Controllers\InventoryController@updateCategory')->name('updateCategory');


//brands
Route::get('/products/brands','App\Http\Controllers\InventoryController@viewBrands')->name('viewBrands');
Route::post('/storeBrand','App\Http\Controllers\InventoryController@storeBrand')->name('storeBrand');
Route::get('/products/brand/delete/{id}','App\Http\Controllers\InventoryController@deleteBrand')->name('deleteBrand');
Route::get('/products/editBrand/{id}','App\Http\Controllers\InventoryController@editBrand')->name('editBrand');
Route::post('/updateBrand/{id}','App\Http\Controllers\InventoryController@updateBrand')->name('updateBrand');


//units
Route::get('/products/units','App\Http\Controllers\InventoryController@viewUnits')->name('viewUnits');
Route::post('/storeUnit','App\Http\Controllers\InventoryController@storeUnit')->name('storeUnit');
Route::get('/products/unit/delete/{id}','App\Http\Controllers\InventoryController@deleteUnit')->name('deleteUnit');
Route::get('/products/editUnit/{id}','App\Http\Controllers\InventoryController@editUnit')->name('editUnit');
Route::post('/updateUnit/{id}','App\Http\Controllers\InventoryController@updateUnit')->name('updateUnit');


//taxes
Route::get('/products/taxes','App\Http\Controllers\InventoryController@viewTaxes')->name('viewTaxes');
Route::post('/storeTax','App\Http\Controllers\InventoryController@storeTax')->name('storeTax');
Route::get('/products/tax/delete/{id}','App\Http\Controllers\InventoryController@deleteTax')->name('deleteTax');
Route::get('/products/editTax/{id}','App\Http\Controllers\InventoryController@editTax')->name('editTax');
Route::post('/updateTax/{id}','App\Http\Controllers\InventoryController@updateTax')->name('updateTax');



//apply taxes
Route::get('products/getAppliedTaxes','App\Http\Controllers\InventoryController@getAppliedTaxes')->name('getAppliedTaxes');
Route::post('/storeappliedTax','App\Http\Controllers\InventoryController@storeAppliedtax')->name('storeAppliedtax');
Route::get('/products/appliedTax/delete/{id}','App\Http\Controllers\InventoryController@deleteAppliedTax')->name('deleteAppliedTax');
Route::get('/products/editAppliedTax/{id}','App\Http\Controllers\InventoryController@editAppliedTax')->name('editAppliedTax');
Route::post('/updateAppliedTax/{id}','App\Http\Controllers\InventoryController@updateAppliedTax')->name('updateAppliedTax');


//products
Route::get('products/products','App\Http\Controllers\InventoryController@getProducts')->name('getProducts');
Route::get('products/addProduct','App\Http\Controllers\InventoryController@addProduct')->name('addProduct');
Route::post('storeProduct','App\Http\Controllers\InventoryController@storeProduct')->name('storeProduct');
Route::get('accounting/products/getStockProductsHtml/{id}','App\Http\Controllers\InventoryController@getProductHtml')->name('getProductHtml');
Route::get('/products/delete/{id}','App\Http\Controllers\InventoryController@deleteProduct')->name('deleteProduct');



//stock count
Route::get('products/stockInvoices','App\Http\Controllers\InventoryController@stockInvoices')->name('stockInvoices');
Route::post('/storeStockInvoice','App\Http\Controllers\InventoryController@storeStockInvoice')->name('storeStockInvoice');
Route::get('products/createStockInvoice','App\Http\Controllers\InventoryController@createStockInvoice')->name('createStockInvoice');
Route::get('/products/stockInvoices/delete/{id}','App\Http\Controllers\InventoryController@deleteStockInvoice')->name('deleteStockInvoice');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//purchase quotation
Route::get('product/purchaseQuotation','App\Http\Controllers\PurchaseController@getPurchaseQuotation')->name('purchaseQuotation');
