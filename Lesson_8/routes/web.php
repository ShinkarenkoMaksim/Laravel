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

Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::get('/index', 'IndexController@index')->name('index');
    Route::match(['post', 'get'], '/profile', 'ProfileController@update')->name('updateProfile');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
});

Route::resource('admin.news', 'Admin\NewsController')
    ->parameters(['admin' => 'news'])
    ->middleware(['auth', 'is_admin']);

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.',
    ], function () {
    Route::get('/all', 'NewsController@news')->name('all');
    Route::get('/categories', 'NewsController@categories')->name('categories');
    Route::get('/category/{id}', 'NewsController@categoryId')->name('categoryId');
    Route::get('/{news}', 'NewsController@newsOne')->name('one');
}
);

/*Route::get('/', [
   'uses' => 'HomeController@index'
]);*/




