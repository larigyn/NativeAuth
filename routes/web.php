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
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// admin
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'Admin\AdminLogin@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLogin@login')->name('admin.login.submit');
    Route::post('/logout', 'Admin\AdminLogin@logout')->name('admin.logout');
   
   Route::get('/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Admin\ResetPasswordController@reset');
});

// superadmin
Route::prefix('gcj')->group(function() {
    Route::get('/', 'SuperAdminController@index')->name('gcj.home');
    Route::get('/login', 'Super\SuperAdminLoginController@showLoginForm')->name('gcj.login');
    Route::post('/login', 'Super\SuperAdminLoginController@login')->name('gcj.login.submit');
    Route::get('/logout', 'Super\SuperAdminLoginController@logout')->name('gcj.logout');

    Route::get('/password/reset', 'Super\ForgotPasswordController@showLinkRequestForm')->name('gcj.password.request');
    Route::post('/password/email', 'Super\ForgotPasswordController@sendResetLinkEmail')->name('gcj.password.email');
    Route::get('/password/reset/{token}', 'Super\ResetPasswordController@showResetForm')->name('gcj.password.reset');
    Route::post('/password/reset', 'Super\ResetPasswordController@reset');
   
});
