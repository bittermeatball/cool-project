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

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        // Authentications
        Auth::routes();
        Route::middleware('auth')->group(function () { // Logged in
            Route::middleware('user.status:active')->group(function(){ // Only active users allowed
//-------------------------------------------- Home or dashboard view ---------------------------------------//
                Route::get('/', 'HomeController@index')->name('dashboard');
                Route::get('/home', 'HomeController@index')->name('dashboard');
                Route::get('/dashboard', 'HomeController@index')->name('dashboard');
//------------------------------------------------ Users control (General) ------------------------------------------//
                // Edit profile
                Route::get('/profile/edit/{id}','ProfileController@edit')->name('profile.edit');
                Route::post('/profile/edit/{id}','ProfileController@update')->name('profile.update');
                Route::post('/profile/edit/social/{id}','ProfileController@updateSocial')->name('profile.update.social');
                Route::post('/profile/edit/password/{id}','ProfileController@updatePassword')->name('profile.update.password');
                // All users
                Route::get('/users', 'UsersController@index')->name('users');
                Route::get('/users/{property}/{filter}', 'UsersController@filterUsers')->name('users.filter');
                // Editor stuff ( Administrator can also be allowed )
                Route::middleware('role:editor')->group(function() {
//----------------------------------------------- Posts controller --------------------------------------//
                    Route::resource('post', 'PostController');
                    Route::post('post/publish/{id}','PostController@publish')->name('post.publish');
                    Route::post('post/save-draft/{id}','PostController@saveDraft')->name('post.draft');
//----------------------------------------------- Categories controller --------------------------------------//
                    Route::resource('category', 'CategoryController');
                    Route::get('/category/{property}/{filter}', 'CategoryController@filterCategories')->name('category.filter');
                    Route::post('/category/activate/{category}','CategoryController@activate')->name('category.activate');
                    Route::post('/category/deactivate/{category}','CategoryController@deactivate')->name('category.deactivate');
                    Route::post('/category/store-from-post','CategoryController@storeFromPost')->name('category.store.post');
//----------------------------------------------- Tags controller --------------------------------------//
                    Route::resource('tag', 'TagController');
                    Route::get('/tag/{property}/{filter}', 'TagController@filterTags')->name('tag.filter');
                    Route::post('/tag/activate/{tag}','TagController@activate')->name('tag.activate');
                    Route::post('/tag/deactivate/{tag}','TagController@deactivate')->name('tag.deactivate');
                    Route::post('/tag/store-from-post','TagController@storeFromPost')->name('tag.store.post');
//------------------------------------------------ Users control (Admin) --------------------------------------//
                    // Admin stuff
                    Route::middleware('role:administrator')->group(function (){
                        // Add user            
                        Route::get('/user/add', 'UsersController@create')->name('user.create');
                        Route::post('/user/add', 'UsersController@store')->name('user.store');                        
                        // Edit user
                        Route::get('/user/edit/{id}','UsersController@edit')->name('user.edit');
                        Route::post('/user/edit/{id}','UsersController@update')->name('user.update');
                        Route::post('/user/edit/social/{id}','UsersController@updateSocial')->name('user.update.social');
                        Route::post('/user/edit/password/{id}','UsersController@updatePassword')->name('user.update.password');
                        // Delete user
                        Route::post('/user/activate/{id}','UsersController@activate')->name('user.activate');
                        Route::post('/user/deactivate/{id}','UsersController@deactivate')->name('user.deactivate');
                        Route::delete('/user/delete/{id}','UsersController@destroy')->name('user.destroy');
                    });
                });
                // Show user profile
                Route::get('/user/{id}','UsersController@show')->name('user.show');
            });
        });
    });
});

    Route::get('/403',function(){return view('errors.403');});
    Route::get('/403/banned',function(){return view('errors.banned');});



