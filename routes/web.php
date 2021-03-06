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
//

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('biodata', \App\Http\Controllers\BiodataController::class)
    ->except('index');

Route::group([
    'namespace' => 'App\Http\Controllers'
], function (){
    Route::get('login', 'LoginController@showLoginForm')->name('backpack.auth.login');
    Route::post('login', 'LoginController@login');

    Route::get('admin/login', function (){
        return redirect('login');
    });


    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('backpack.auth.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email');

    Route::get('logout', 'LoginController@logout')->name('backpack.auth.logout');
    Route::post('logout', 'LoginController@logout');

// Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('backpack.auth.register');
    Route::post('register', 'RegisterController@register');

    Route::get('admin/register', function (){
        return redirect('register');
    });
});

Route::group([
    'middleware' => ['web', 'role:user'],
    'namespace' => 'App\Http\Controllers'
], function (){

    Route::get('/dashboard', function (){
        return view('pages.dashboard');
    })->name('dashboard');
});

Route::group(
    [
        'prefix' => config('backpack.base.route_prefix', 'admin'),
        'middleware' => ['web', 'role:admin'],
        'namespace'  => 'App\Http\Controllers\Admin'

    ],
    function () {
        Route::crud('permission', 'PermissionCrudController');
        Route::crud('role', 'RoleCrudController');
        Route::crud('user', 'UserCrudController');
        Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
        Route::get('/', 'AdminController@redirect')->name('backpack');
        Route::get('edit-account-info', 'MyAccountController@getAccountInfoForm')->name('backpack.account.info');
        Route::post('edit-account-info', 'MyAccountController@postAccountInfoForm')->name('backpack.account.info.store');
        Route::post('change-password', 'MyAccountController@postChangePasswordForm')->name('backpack.account.password');

    }
);

