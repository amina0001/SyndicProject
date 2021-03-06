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
/***************************admin************************************/
Route::post('/contact', ['as' => 'contactus', 'uses' => 'ContactusController@sendMessage']);

Route::group(['prefix'=>'/admin', 'middleware'=>['auth', 'admin']], function(){
Route::post('/occupants', ['as' => 'occupants', 'uses' => 'AdminOccupantController@occupants']);
Route::post('occupant/add', ['as' => 'occupantAdd', 'uses' => 'AdminOccupantController@occupantsAdd']);

Route::post('/gener/occupants', ['as' => 'generOccupant', 'uses' => 'AdminOccupantController@generoccupants']);
Route::post('/occupant/delete', ['as' => 'userDelete', 'uses' => 'AdminOccupantController@occupantDelete']);

Route::post('/occupants/create', ['as' => 'occupantCreate', 'uses' => 'AdminOccupantController@create']);
Route::get('/home', 'HomeController@adminHome');
});

/*Route::get('/admin/occupants', ['as' => 'occupants', 'uses' => 'AdminOccupantController@occupants']);*/
/***************************end admin************************************/
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'TestController@index')->name('test');
Route::get('/fetch/{id}', 'TestController@fetch');

Route::get('depenses', ['as' => 'depensesSyndic', 'uses' => 'depenseController@preview']);
/***********************depense routes**************************/
Route::group([ 'middleware'=>['auth', 'Syndic']], function() {

    Route::post('depense/create', ['as' => 'depenseCreate', 'uses' => 'depenseController@create']);

    Route::get('depense/new', ['as' => 'depenseNew', 'uses' => 'depenseController@new']);
    Route::post('depense/update', ['as' => 'despenseUpdate', 'uses' => 'depenseController@update']);
    Route::post('depense/delete', ['as' => 'despenseDelete', 'uses' => 'depenseController@delete']);
});
/***********************recette routes**************************/

/*Route::resource('recette', 'recetteController');*/
Route::get('recettes', ['as' => 'recetteSyndic', 'uses' => 'recetteController@preview']);
Route::group([ 'middleware'=>['auth', 'Syndic']], function() {

    Route::post('recette/create', ['as' => 'recetteCreate', 'uses' => 'recetteController@create']);
    Route::post('recette/loc/create', ['as' => 'recettelocCreate', 'uses' => 'recetteController@createloc']);
    Route::post('recette/loc/update', ['as' => 'recetteslocUpdate', 'uses' => 'recetteController@updateloc']);
    Route::post('recette/delete/loc', ['as' => 'deleteloc', 'uses' => 'recetteController@deleteloc']);

    Route::post('recette/update', ['as' => 'recettesUpdate', 'uses' => 'recetteController@update']);
    Route::post('recette/delete', ['as' => 'recettesDelete', 'uses' => 'recetteController@delete']);
    Route::get('recette/mail/{email}', ['as' => 'recetteMail', 'uses' => 'recetteController@mail']);
});
/***********************reunion routes**************************/

Route::get('reunions', ['as' => 'reunionSyndic', 'uses' => 'ReunionController@preview']);
Route::group([ 'middleware'=>['auth', 'Syndic']], function() {

    Route::post('reunion/create', ['as' => 'reunionCreate', 'uses' => 'ReunionController@create']);
    Route::post('reunion/update', ['as' => 'reunionUpdate', 'uses' => 'ReunionController@update']);
    Route::post('reunion/delete', ['as' => 'deletereunion', 'uses' => 'ReunionController@delete']);

    Route::post('reunion/Seen/{id}', ['as' => 'reunionSeen', 'uses' => 'notificationController@update']);
    Route::get('reunion/mail/{id}', ['as' => 'reunionMail', 'uses' => 'ReunionController@mail']);
});
/***********************reunion routes**************************/
Route::post('chores/create', ['as' => 'choresCreate', 'uses' => 'HomeController@choreCreate']);
Route::post('chores/delete', ['as' => 'choresDelete', 'uses' => 'HomeController@delete']);
/***********************profile routes**************************/
Route::get('profile/{id}', ['as' => 'profile', 'uses' => 'UserController@profile']);
Route::post('profileUpdate/{id}', ['as' => 'profileUpdate', 'uses' => 'UserController@update']);
/***********************messages routes**************************/
Route::post('msgSeen/{id}', ['as' => 'msgSeen', 'uses' => 'notificationController@msgupdate']);
Route::get('/chat',['as' => 'chat', 'uses' => 'ChatsController@index'] );
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
/*    Route::resource('groups', 'GroupController');
    Route::resource('conversations', 'ConversationController');
*/
    Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});
     Route::get('/', function () {
   return view('welcome');
});
/*Route::get('/email', function () {
    return view('email');
});*/
     Broadcast::routes();
/***********************pdf**************************/
Route::post('depenese/generate-pdf',['as' => 'generatepdf', 'uses' => 'depenseController@generatePDF']);
Route::post('Recette/generate-pdf',['as' => 'Rgeneratepdf', 'uses' => 'recetteController@generatePDF']);
Route::get('reunion/generate-pdf/{id}',['as' => 'download', 'uses' => 'reunionController@generatePDF']);

/***********************users**************************/
Route::group([ 'middleware'=>['auth', 'Syndic']], function() {

    Route::get('occupant', ['as' => 'occupant', 'uses' => 'UserController@occupant']);
    Route::post('occupant/update', ['as' => 'userUpdate', 'uses' => 'AdminOccupantController@occupantUpdate']);
    Route::get('occupant/add', ['as' => 'userAdd', 'uses' => 'AdminOccupantController@occupantAdd']);
});