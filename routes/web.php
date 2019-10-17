<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('index', 'DashboardController');
    Route::resource('UserInformation', 'UserInformationController');
    Route::resource('user', 'UserController');
    Route::resource('ticket', 'TicketController');
    Route::resource('setting', 'SettingController');
    Route::resource('card', 'CardController');
    Route::get('card/delete/{id}', 'CardController@destroy')->name('card.delete');

    Route::resource('wallet', 'WalletController');
    Route::get('wallet/delete/{id}', 'WalletController@destroy')->name('wallet.delete');

    Route::resource('gateway', 'GatewayController');
    Route::get('gateway/delete/{id}', 'GatewayController@destroy')->name('gateway.delete');

    Route::resource('bill', 'BillController');
    Route::resource('chequeInquiry', 'CheckInquiryController');
    Route::resource('shop', 'ShopController');
    Route::resource('checkout', 'CheckoutController');

    Route::get('transactionReport/wallet/{wallet}', 'TransactionReportController@walletReport')->name('transactionReport.wallet');
    Route::get('transactionReport/gateway/{gateway}', 'TransactionReportController@gatewayReport')->name('transactionReport.gateway');

    Route::resource('product-list', 'ProductController');
    Route::get('product-list/product-category/{productCategory}/product/{productId}', 'ProductController@showProduct')->name('product-list.showProduct');
    Route::post('product-list/storeProduct', 'ProductController@storeProduct')->name('Product.storeProduct');
    Route::post('product-list/storeFile', 'ProductController@storeFile')->name('Product.storeFile');
    Route::post('product-list/storeService', 'ProductController@storeService')->name('Product.storeService');
    Route::post('product-list/delete', 'ProductController@destroy')->name('Product.destroy');
    Route::resource('product-detail', 'ProductDetailController');
    Route::resource('product-category', 'ProductCategoryController');
    Route::post('product-category/delete', 'ProductCategoryController@destroy');
    Route::resource('shop-setting', 'ShopSettingController');
    Route::put('shop-setting/update-contact/{id}', 'ShopSettingController@updateContact')->name('shop.setting.updateContact');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');



});
