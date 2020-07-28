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

// Route::get('/test', function () {
//     return view('single-post');;
// });
Auth::routes(['register' => false]);

Route::get('/', 'BlogController@home')->name('home');
Route::get('/dashboard', 'BlogController@index')->name('dashboard')->middleware('auth');;

Route::prefix('post')->group(function () {
    Route::get('/','PostController@index')->name('post.index');
    Route::get('/add-new','PostController@add')->name('post.add');
    Route::post('/store','PostController@store')->name('post.store');
    Route::get('/{slug}','BlogController@showPost')->name('post.show');
    Route::get('/{slug}/edit','PostController@edit')->name('post.edit');
    Route::put('/{slug}/update','PostController@update')->name('post.update');
    Route::patch('/{slug}/switch-status','PostController@switchStatus')->name('post.switch-status');
    Route::delete('/{id}/delete','PostController@delete')->name('post.delete');
});
