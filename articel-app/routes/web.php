<?php

use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardAdminController@index')->name('dashboard');
    Route::get('reporter/list', 'DashboardAdminController@listOfReporter')->name('dashboard.list.reporter');
    Route::get('editor/list', 'DashboardAdminController@listOfEditor')->name('dashboard.list.editor');
    Route::get('user', 'DashboardAdminController@add')->name('dashboard.add.user');
    Route::post('user', 'DashboardAdminController@saveUser')->name('dashboard.save.user');
    Route::get('categories', "DashboardAdminController@categories")->name('dashboard.list.categories');
    Route::post('store/categories', "DashboardAdminController@saveCategory")->name('dashboard.save.categories');
    Route::get('articles', "ArticleController@index")->name('dashboard.list.article');
    Route::get('articles/{article}', "ArticleController@view")->name('dashboard.view.article');
    Route::get('write/article', "ArticleController@write")->name('dashboard.write.article');
    Route::post('store/article', "ArticleController@store")->name('dashboard.store.article');
    Route::get('edit/article', "ArticleController@editList")->name('dashboard.edit-list.article');
    Route::get('edit/{article}/articles', "ArticleController@edit")->name('dashboard.edit.article');
    Route::post('update/{article}/article', "ArticleController@update")->name('dashboard.update.article');
    Route::get('publish/{article}/article', "ArticleController@publish")->name('dashboard.publish.article');

});
