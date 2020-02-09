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

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/admin', 'IndexController@index')->name('admin');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
});

//Route::get('/admin', 'Admin\IndexController@index')->name('admin');

//Route::get('/test1', 'Admin\IndexController@test1')->name('test1');
//Route::get('/test2', 'Admin\IndexController@test2')->name('test2');

Route::get('/news', 'NewsController@categories')->name('news');
Route::get('/{category}', 'NewsController@category')->name('newsCategory');
Route::get('/news/{id}', 'NewsController@newsOne')->name('newsOne');
/*Route::get('/', [
   'uses' => 'HomeController@index'
]);*/
