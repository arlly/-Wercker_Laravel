<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.auth.login');
    Route::post('login', 'Auth\LoginController@login')->name('admin.auth.login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.auth.logout');
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.auth.logout');
    Route::get('home', 'AdminHomeController@index')->name('admin.home');
    Route::get('', 'AdminHomeController@index')->name('admin.home');
    
    /**
     * Member
     */
    Route::group([
        "prefix" => 'member'
    ], function () {
    
        Route::post('/', 'AdminMemberController@postIndex');
        Route::get('/', 'AdminMemberController@index')->name('admin.member');
        Route::get('create/', 'AdminMemberController@create')->name('admin.member.create');
        Route::post('create/', 'AdminMemberController@store');
        Route::get('edit/{id}', 'AdminMemberController@edit')->name('admin.member.edit');
        Route::post('edit/{id}', 'AdminMemberController@update');
        Route::post('search', 'AdminMemberController@postIndex');
        Route::get('search', 'AdminMemberController@search')->name('admin.member.search');
        Route::get('search/reset', 'AdminMemberController@resetSearch')->name('admin.member.search.reset');
        Route::get('delete/{id}', 'AdminMemberController@destroy')->name('admin.member.delete');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
