<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login','AuthController@login');
    Route::post('social_login','AuthController@social_login');
    Route::post('signup','AuthController@register');
    Route::post('forget_password','AuthController@forget_password');
    Route::post('reset_password','AuthController@reset_password');
    Route::get('resend_verify', 'AuthController@resend_verify');
    Route::post('verify', 'AuthController@verify');
    Route::post('check_reset_code','AuthController@check_reset_code');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('me','AuthController@show');
        Route::post('refresh','AuthController@refresh');
        Route::post('update','AuthController@update');
        Route::post('change_password','AuthController@change_password');
        Route::post('logout','AuthController@logout');
    });
});


Route::group([
    'prefix' => 'home',
], function() {
    Route::get('install','HomeController@install');
    Route::get('faqs','HomeController@faqs');
    Route::get('advertisement','AdvertisementController@index');
    Route::get('general_discount','GeneralDiscountController@index');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::post('request_advertisement','HomeController@request_advertisement');
    });
});
Route::group([
    'prefix' => 'tickets',
], function() {
    Route::post('store','TicketController@store');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('/','TicketController@index');
        Route::get('show','TicketController@show');
        Route::post('response','TicketController@response');
    });
});
Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'notifications',
], function() {
    Route::get('/', 'NotificationController@index');
    Route::post('send', 'NotificationController@send');
    Route::post('read', 'NotificationController@read');
    Route::post('read/all', 'NotificationController@read_all');
});
Route::group([
    'prefix' => 'providers',
], function() {
    Route::get('/', 'ProviderController@index');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('favorites', 'ProviderController@favorites');
        Route::post('toggle_favorite', 'ProviderController@toggle_favorite');
        Route::get('me', 'ProviderController@me');
        Route::post('update', 'ProviderController@update');
        Route::group([
            'prefix' => 'addresses',
        ], function() {
            Route::get('me', 'ProviderController@my_addresses');
            Route::get('show', 'ProviderController@show_address');
            Route::post('store', 'ProviderController@add_address');
            Route::post('update', 'ProviderController@edit_address');
            Route::post('delete', 'ProviderController@delete_address');
        });
    });
});
Route::group([
    'prefix' => 'discounts',
    'middleware' => 'auth:api'
], function() {
    Route::get('/','DiscountController@index');
    Route::post('store','DiscountController@store');
    Route::post('update','DiscountController@update');
    Route::post('delete','DiscountController@delete');
});
Route::group([
    'prefix' => 'subscriptions',
    'middleware' => 'auth:api'
], function() {
    Route::get('/','SubscriptionsController@index');
    Route::post('store','SubscriptionsController@store');
});
Route::group([
    'prefix' => 'transactions',
], function() {
    Route::get('/', 'TransactionController@index');
    Route::get('my_balance', 'TransactionController@my_balance');
    Route::post('generate_checkout', 'TransactionController@generate_checkout');
    Route::get('check_payment', 'TransactionController@check_payment');
    Route::post('request_refund', 'TransactionController@request_refund');
});

