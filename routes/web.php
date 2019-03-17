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
Route::get('/home/quienesSomos', 'HomeController@quienesSomos');
Route::get('/home/preguntasFrecuentes', 'HomeController@preguntasFrecuentes');
Route::get('/preferences', 'HomeController@preferences');

// Users
Route::get('/registerUser', 'UserController@registerUser')->name('register');
Route::post('/registerUser', 'UserController@save');
Route::get('/users', 'UserController@list')->name('list-users');
Route::get('/user/{id}', 'UserController@show');
Route::delete('/user/{id}/delete', 'UserController@delete')->name('delete-user');
Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/user/edit', 'UserController@edit')->name('edit-user');
Route::put('/user/edit', 'UserController@update');

// Events
Route::get('/events', 'EventController@list')->name('list-events');
Route::get('/event/nuevo', 'EventController@create')->name('new-event');
Route::post('/event/nuevo', 'EventController@save');
Route::get('/events/{event}/edit', 'EventController@edit')->name('edit-event');
Route::put('/events/{event}/edit', 'EventController@update');
Route::delete('/events/{event}/delete', 'EventController@delete')->name('delete-event');
Route::get('/events/{event}/detail', 'EventController@detail')->name('detail-event');
