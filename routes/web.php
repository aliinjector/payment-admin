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
    Route::resource('checkout', 'CheckoutController');

    Route::get('transactionReport/wallet/{wallet}', 'TransactionReportController@walletReport')->name('transactionReport.wallet');
    Route::get('transactionReport/gateway/{gateway}', 'TransactionReportController@gatewayReport')->name('transactionReport.gateway');

    Route::group(['prefix' => 'shop'], function () {

    Route::resource('shops', 'ShopController');

    Route::put('shops/{id}/update-contact', 'ShopController@updateContact')->name('shops.update-contact');
    Route::put('shops/change-status/{id}', 'ShopController@changeStatus')->name('shops.change-status');



    Route::resource('shops-vouchers', 'ShopVoucherController');
    Route::get('shops-vouchers/{shopId}/vochers', 'ShopVoucherController@showVouchers')->name('shops-vouchers.vochers');


    Route::resource('shops-products', 'ShopProductController');
    Route::get('shops-products/{shopId}/products', 'ShopProductController@showProducts')->name('shops-products.products');
  });

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});
