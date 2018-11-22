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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->name('test');
Route::get('/fetch/{id}', 'TestController@fetch');

Route::get('depensesSyndic', ['as' => 'depensesSyndic', 'uses' => 'depenseController@preview']);
/***********************depense routes**************************/
Route::get('depensesSyndic', ['as' => 'depensesSyndic', 'uses' => 'depenseController@preview']);

Route::post('depense/create', ['as' => 'depenseCreate', 'uses' => 'depenseController@create']);

Route::get('depense/new', ['as' => 'depenseNew', 'uses' => 'depenseController@new']);
Route::post('depense/update', ['as' => 'despenseUpdate', 'uses' => 'depenseController@update']);
Route::post('depense/delete', ['as' => 'despenseDelete', 'uses' => 'depenseController@delete']);
/***********************recette routes**************************/

/*Route::resource('recette', 'recetteController');*/
Route::get('recetteSyndic', ['as' => 'recetteSyndic', 'uses' => 'RecetteController@preview']);

Route::post('recettecreate', ['as' => 'recetteCreate', 'uses' => 'RecetteController@create']);
Route::get('recette/new', ['as' => 'recetteNew', 'uses' => 'RecetteController@new']);
Route::post('recetteUpdate', ['as' => 'recetteUpdate', 'uses' => 'RecetteController@update']);
Route::post('recette/delete', ['as' => 'recetteDelete', 'uses' => 'RecetteController@delete']);
/***********************reunion routes**************************/

Route::get('reunionSyndic', ['as' => 'reunionSyndic', 'uses' => 'ReunionController@preview']);
Route::post('reunioncreate', ['as' => 'reunionCreate', 'uses' => 'ReunionController@create']);
Route::post('reunionUpdate', ['as' => 'reunionUpdate', 'uses' => 'ReunionController@update']);
/***********************reunion routes**************************/
Route::post('chorescreate', ['as' => 'choresCreate', 'uses' => 'HomeController@choreCreate']);
Route::post('recette/delete', ['as' => 'choresDelete', 'uses' => 'HomeController@delete']);
/***********************profile routes**************************/
Route::get('profile/{id}', ['as' => 'profile', 'uses' => 'UserController@profile']);
Route::post('profileUpdate/{id}', ['as' => 'profileUpdate', 'uses' => 'UserController@update']);
/***********************messages routes**************************/

Route::get('/chat',['as' => 'chat', 'uses' => 'ChatsController@index'] );
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
/*    Route::resource('groups', 'GroupController');
    Route::resource('conversations', 'ConversationController');
*/