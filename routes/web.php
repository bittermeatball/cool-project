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

Route::prefix('admin')->group(function () {
    // Authentications
    Auth::routes();
    Route::middleware('auth')->group(function () {
        // Home or dashboard view
        Route::get('/', 'HomeController@index')->name('dashboard');
        Route::get('/home', 'HomeController@index')->name('dashboard');
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        // Users control

        // All users
        Route::get('/users', 'UsersController@index')->name('users');
        // Add user
        Route::get('/add-user', 'UsersController@create')->name('add-user');
        Route::post('/add-user', 'UsersController@store')->name('add-user.store');
        // Show user profile
        Route::get('/user/{id}','UsersController@show')->name('user.show');
        // Edit user
        Route::get('/user/edit/{id}','UsersController@edit')->name('user.edit');

        Route::post('/user/edit/{id}','UsersController@update')->name('user.update');
        Route::post('/user/edit/social/{id}','UsersController@updateSocial')->name('user.update.social');
        Route::post('/user/edit/password/{id}','UsersController@updatePassword')->name('user.update.password');
        // Delete user
        Route::delete('/delete/{id}','UsersController@destroy')->name('user.destroy');

        // Posts controller
        Route::resource('post','PostController');
    });
});


