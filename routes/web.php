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
    return view('auth.login');
})->middleware('guest');

Route::get('/overview', function () {
    return view('overview.index');
})->middleware('auth');

Route::group(['prefix' => 'profiles',  'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index')->name('profiles');
    Route::post('/', 'UserController@store')->name('profile-store');
    Route::get('/{profile_id}', 'UserController@show')->name('profile-show');
    Route::put('/{profile_id}', 'UserController@update')->name('profile-update');
    Route::get('/{profile_id}/edit', 'UserController@edit');
    Route::delete('/{profile_id}/docs/{doc_id}', 'UserController@deleteDocument')->name('profile-doc-delete');
});

/*  JOBCARDS    create, edit, save, delete, display */
Route::group(['prefix' => 'jobcards',  'middleware' => 'auth'], function () {
    Route::get('/', 'JobcardController@index')->name('jobcards');
    Route::post('/', 'JobcardController@store')->name('jobcard-store');
    Route::get('/create', 'JobcardController@create')->name('jobcard-create');
    Route::get('/{jobcard_id}', 'JobcardController@show')->name('jobcard-show');
    Route::put('/{jobcard_id}', 'JobcardController@update')->name('jobcard-update');
    Route::delete('/{jobcard_id}', 'JobcardController@delete')->name('jobcard-delete');
    Route::put('/{jobcard_id}/progress', 'JobcardController@updateProgress')->name('jobcard-update-progress');
    //Route::get('/{jobcard_id}/edit', 'JobcardController@edit')->name('jobcard-edit');
});

/*  CLIENTS    create, edit, save, delete, display */
Route::group(['prefix' => 'clients',  'middleware' => 'auth'], function () {
    //Route::get('/', 'ClientController@index')->name('clients');
    Route::post('/', 'ClientController@store')->name('client-store');
    //Route::get('/create', 'ClientController@create')->name('client-create');
    //Route::get('/{client_id}', 'ClientController@show')->name('client-show');
    //Route::put('/{client_id}', 'ClientController@update')->name('client-update');
    //Route::delete('/{client_id}', 'ClientController@delete')->name('client-delete');
    //Route::get('/{client_id}/edit', 'ClientController@edit')->name('client-edit');
});

/*  CONTACTS    create, edit, save, delete, display */
Route::group(['prefix' => 'contacts',  'middleware' => 'auth'], function () {
    //Route::get('/', 'ContactController@index')->name('contacts');
    Route::post('/', 'ContactController@store')->name('contact-store');
    //Route::get('/create', 'ContactController@create')->name('contact-create');
    //Route::get('/{contact_id}', 'ContactController@show')->name('contact-show');
    //Route::put('/{contact_id}', 'ContactController@update')->name('contact-update');
    //Route::delete('/{contact_id}', 'ContactController@delete')->name('contact-delete');
    //Route::get('/{contact_id}/edit', 'ContactController@edit')->name('contact-edit');
});

/*  CONTRACTORS    create, edit, save, delete, display */
Route::group(['prefix' => 'contractors',  'middleware' => 'auth'], function () {
    //Route::get('/', 'ContractorController@index')->name('contractors');
    Route::post('/', 'ContractorController@store')->name('contractor-store');
    //Route::get('/create', 'ContractorController@create')->name('contractor-create');
    //Route::get('/{contractor_id}', 'ContractorController@show')->name('contractor-show');
    //Route::put('/{contractor_id}', 'ContractorController@update')->name('contractor-update');
    //Route::delete('/{contractor_id}', 'ContractorController@delete')->name('contractor-delete');
    //Route::get('/{contractor_id}/edit', 'ContractorController@edit')->name('contractor-edit');
});

Route::get('jobcards/pending', function () {
    return view('jobcard.pending');
});

Route::get('jobcards/unpaid', function () {
    return view('jobcard.unpaid');
});

Route::get('jobcards/overdue', function () {
    return view('jobcard.overdue');
});

Route::get('jobcards/all', function () {
    return view('jobcard.all');
});

Route::get('/jobcards/1', function () {
    return view('jobcard.show');
});

Route::get('/jobcards/1/views/1', function () {
    return view('jobcard.views');
});

Route::get('/jobcards/1/viewers', function () {
    return view('jobcard.viewers');
});

Route::get('/jobcards/1/viewers/1', function () {
    return view('jobcard.viewer');
});

Route::get('/clients', function () {
    return view('client.index');
});

Route::get('/clients/1', function () {
    return view('client.show');
});

Route::get('/contractors', function () {
    return view('contractor.index');
});

Route::get('/contractors/gaborone', function () {
    return view('contractor.gaborone');
});

Route::get('/contractors/1', function () {
    return view('contractor.show');
});

Route::get('/calendar', function () {
    return view('calendar.index');
});

Route::get('/search', function () {
    return view('search.default');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
