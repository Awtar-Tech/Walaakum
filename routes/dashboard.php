<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Dashboard" middleware group. Enjoy building your Dashboard!
|
*/
Route::get('app/lang', 'HomeController@lang');


/*
|--------------------------------------------------------------------------
| Dashboard Auth
|--------------------------------------------------------------------------
| Here is where admin auth routes exists for login and log out
*/
Route::group([
    'namespace'  => 'Auth',
], function() {
    Route::get('login', ['uses' => 'LoginController@showLoginForm','as'=>'dashboard.login']);
    Route::post('login', ['uses' => 'LoginController@login']);
    Route::group([
        'middleware' => 'auth.dashboard',
    ], function() {
        Route::post('logout', ['uses' => 'LoginController@logout','as'=>'dashboard.logout']);
    });
});
/*
|--------------------------------------------------------------------------
| Dashboard After login in
|--------------------------------------------------------------------------
| Here is where admin panel routes exists after login in
*/
Route::group([
    'middleware'  => 'auth.dashboard',
], function() {
    Route::get('/', 'HomeController@index');
    Route::get('delete/media', 'HomeController@delete_media');
    Route::post('notification/send', 'HomeController@general_notification');

    /*
    |--------------------------------------------------------------------------
    | Dashboard > App Management
    |--------------------------------------------------------------------------
    | Here is where App Management routes
    */

    Route::group([
        'prefix'=>'app_managements',
        'namespace'=>'AppManagement',
    ],function () {
        Route::group([
            'prefix'=>'employees'
        ],function () {
            Route::get('/','EmployeeController@index');
            Route::get('/create','EmployeeController@create');
            Route::post('/','EmployeeController@store');
            Route::get('/{employee}','EmployeeController@show');
            Route::get('/{employee}/edit','EmployeeController@edit');
            Route::put('/{employee}','EmployeeController@update');
            Route::delete('/{employee}','EmployeeController@destroy');
            Route::patch('/update/password',  'EmployeeController@updatePassword');
            Route::get('/option/export','EmployeeController@export');
            Route::get('/{id}/activation','EmployeeController@activation');
        });
        Route::group([
            'prefix'=>'roles'
        ],function () {
            Route::get('/','RoleController@index');
            Route::get('/create','RoleController@create');
            Route::post('/','RoleController@store');
            Route::get('/{role}','RoleController@show');
            Route::get('/{role}/edit','RoleController@edit');
            Route::put('/{role}','RoleController@update');
            Route::delete('/{role}','RoleController@destroy');
            Route::get('/option/export','RoleController@export');
        });
        Route::group([
            'prefix'=>'permissions'
        ],function () {
            Route::get('/','PermissionController@index');
            Route::get('/create','PermissionController@create');
            Route::post('/','PermissionController@store');
            Route::get('/{permission}','PermissionController@show');
            Route::get('/{permission}/edit','PermissionController@edit');
            Route::put('/{permission}','PermissionController@update');
            Route::delete('/{permission}','PermissionController@destroy');
            Route::get('/option/export','PermissionController@export');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Dashboard > App Data
    |--------------------------------------------------------------------------
    | Here is where App Data routes
    */
    Route::group([
        'prefix'=>'app_data',
        'namespace'=>'AppData',
    ],function () {
        Route::group([
            'prefix'=>'settings'
        ],function () {
            Route::get('/','SettingController@index');
            Route::get('/{setting}/edit','SettingController@edit');
            Route::put('/{setting}','SettingController@update');
        });
        Route::group([
            'prefix'=>'countries'
        ],function () {
            Route::get('/','CountryController@index');
            Route::get('/create','CountryController@create');
            Route::post('/','CountryController@store');
            Route::get('/{country}','CountryController@show');
            Route::get('/{country}/edit','CountryController@edit');
            Route::put('/{country}','CountryController@update');
            Route::delete('/{country}','CountryController@destroy');
            Route::get('/option/export','CountryController@export');
        });
        Route::group([
            'prefix'=>'cities'
        ],function () {
            Route::get('/','CityController@index');
            Route::get('/create','CityController@create');
            Route::post('/','CityController@store');
            Route::get('/{city}','CityController@show');
            Route::get('/{city}/edit','CityController@edit');
            Route::put('/{city}','CityController@update');
            Route::delete('/{city}','CityController@destroy');
            Route::get('/option/export','CityController@export');
        });
        Route::group([
            'prefix'=>'splash_screens'
        ],function () {
            Route::get('/','SplashScreenController@index');
            Route::get('/create','SplashScreenController@create');
            Route::post('/','SplashScreenController@store');
            Route::get('/{splash_screen}','SplashScreenController@show');
            Route::get('/{splash_screen}/edit','SplashScreenController@edit');
            Route::put('/{splash_screen}','SplashScreenController@update');
            Route::delete('/{splash_screen}','SplashScreenController@destroy');
            Route::get('/option/export','SplashScreenController@export');
        });
        Route::group([
            'prefix'=>'categories'
        ],function () {
            Route::get('/','CategoryController@index');
            Route::get('/create','CategoryController@create');
            Route::post('/','CategoryController@store');
            Route::get('/{category}','CategoryController@show');
            Route::get('/{category}/edit','CategoryController@edit');
            Route::put('/{category}','CategoryController@update');
            Route::delete('/{category}','CategoryController@destroy');
            Route::get('/option/export','CategoryController@export');
        });
        Route::group([
            'prefix'=>'subscriptions'
        ],function () {
            Route::get('/','SubscriptionController@index');
            Route::get('/create','SubscriptionController@create');
            Route::post('/','SubscriptionController@store');
            Route::get('/{subscription}','SubscriptionController@show');
            Route::get('/{subscription}/edit','SubscriptionController@edit');
            Route::put('/{subscription}','SubscriptionController@update');
            Route::delete('/{subscription}','SubscriptionController@destroy');
            Route::get('/option/export','SubscriptionController@export');
        });
    });
    /*
    |--------------------------------------------------------------------------
    | Dashboard > App
    |--------------------------------------------------------------------------
    | Here is where App Content routes
    */
    Route::group([
        'prefix'=>'app_content',
        'namespace'=>'AppContent',
    ],function () {
        Route::group([
            'prefix'=>'advertisements'
        ],function () {
            Route::get('/','AdvertisementController@index');
            Route::get('/create','AdvertisementController@create');
            Route::post('/','AdvertisementController@store');
            Route::get('/{advertisement}','AdvertisementController@show');
            Route::get('/{advertisement}/edit','AdvertisementController@edit');
            Route::put('/{advertisement}','AdvertisementController@update');
            Route::delete('/{advertisement}','AdvertisementController@destroy');
            Route::get('/option/export','AdvertisementController@export');
        });
        Route::group([
            'prefix'=>'transactions'
        ],function () {
            Route::get('/','TransactionController@index');
            Route::get('/create','TransactionController@create');
            Route::post('/','TransactionController@store');
            Route::get('/{transaction}','TransactionController@show');
            Route::get('/{transaction}/edit','TransactionController@edit');
            Route::put('/{transaction}','TransactionController@update');
            Route::delete('/{transaction}','TransactionController@destroy');
            Route::get('/option/export','TransactionController@export');
        });
        Route::group([
            'prefix'=>'general_discounts'
        ],function () {
            Route::get('/','GeneralDiscountController@index');
            Route::get('/create','GeneralDiscountController@create');
            Route::post('/','GeneralDiscountController@store');
            Route::get('/{general_discount}','GeneralDiscountController@show');
            Route::get('/{general_discount}/edit','GeneralDiscountController@edit');
            Route::put('/{general_discount}','GeneralDiscountController@update');
            Route::delete('/{general_discount}','GeneralDiscountController@destroy');
            Route::get('/option/export','GeneralDiscountController@export');
        });
    });
    /*
    |--------------------------------------------------------------------------
    | Dashboard > App Users
    |--------------------------------------------------------------------------
    | Here is where App Users routes
    */

    Route::group([
        'prefix'=>'user_managements',
        'namespace'=>'UserManagement',
    ],function () {
        Route::group([
            'prefix'=>'users'
        ],function () {
            Route::get('/','UserController@index');
            Route::get('/create','UserController@create');
            Route::post('/','UserController@store');
            Route::get('/{user}','UserController@show');
            Route::patch('/update/password',  'UserController@updatePassword');
            Route::get('/option/export','UserController@export');
            Route::get('/{user}/activation','UserController@activation');
            Route::delete('/{user}','UserController@destroy');
            Route::get('/{user}/active_mobile_email','UserController@active_mobile_email');
        });
        Route::group([
            'prefix'=>'providers'
        ],function () {
            Route::get('/','ProviderController@index');
            Route::get('/create','ProviderController@create');
            Route::post('/','ProviderController@store');
            Route::get('/{provider}','ProviderController@show');
            Route::patch('/update/password',  'ProviderController@updatePassword');
            Route::get('/option/export','ProviderController@export');
            Route::get('/{provider}/activation','ProviderController@activation');
            Route::delete('/{provider}','ProviderController@destroy');
            Route::get('/{provider}/active_mobile_email','ProviderController@active_mobile_email');
        });
        Route::group([
            'prefix'=>'tickets'
        ],function () {
            Route::get('/','TicketController@index');
            Route::get('/create','TicketController@create');
            Route::post('/','TicketController@store');
            Route::get('/{ticket}','TicketController@show');
            Route::post('/{ticket}/response','TicketController@response');
            Route::get('/{ticket}/close','TicketController@close');
        });
    });
});
