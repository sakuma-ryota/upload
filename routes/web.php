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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //news
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::get('news', 'Admin\NewsController@index');
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete');
    Route::get('/', 'NewsController@index');
    //pofile
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile', 'Admin\ProfileController@index');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/delete', 'Admin\ProfileController@delete');
    Route::get('profile/', 'ProfileController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





/*
3.「http://XXXXXX.jp/XXX というアクセスが来たときに、
  AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください。
  
Route::group(['prefix' => XXX], funtion()
{
    Rout::get('', 'AAA@bbb');
});

4.【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。web.phpを編集して、
  admin/profile/create にアクセスしたらProfileController の add Action に、
  admin/profile/edit にアクセスしたら ProfileController の edit Action に
  割り当てるように設定してください。
*/
