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
})->name('welcome');

Route::get('polls', 'PollController@showAllPolls')->name('polls');

Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {

    Route::get('login', 'LoginController@showLoginForm')->name('login');

    /*
     * These routes require the user to be logged in
     */
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', 'LoginController@logout')->name('logout');
    });

    /*
     * These routes require no user to be logged in
     */
    Route::group(['middleware' => 'guest'], function () {
        // Socialite Routes
        Route::get('login/{provider}', 'UserController@login')->name('social.login');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () {
    CRUD::resource('poll', 'PollCrudController');

    Route::group(['prefix' => 'poll/{poll_id}'], function()
    {
        CRUD::resource('question', 'QuestionCrudController');
    });

    Route::group(['prefix' => 'poll/{poll_id}/question/{question_id}'], function()
    {
        CRUD::resource('option', 'OptionCrudController');
    });

    Route::get('my-polls/{id}', 'PollController@showMyPolls')->name('my-polls');
});