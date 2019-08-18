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

use App\Game;
use App\Http\Controllers\GameController;
use App\Http\Resources\GameCollection;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('user/{id}', 'UserController@show');

Route::get('/game', 'GameController@index')->name('game.index');
Route::get('/game/{game}', 'GameController@show')->where('game', '[0-9]+')->name('game.show');

Route::get('/bet/{bet}/edit', 'BetController@edit')->name('bet.edit');
Route::put('/bet/{bet}', 'BetController@update')->name('bet.update');
Route::patch('/bet/{bet}', 'BetController@update')->name('bet.update');

Route::middleware(['is_admin', 'auth'])->group(function () {

    Route::get('csv_file', 'CsvFile@index');
    Route::post('csv_file/import', 'CsvFile@csv_import')->name('import');

    Route::get('/game/{game}/edit', 'GameController@edit')->name('game.edit');
    Route::get('/game/create', 'GameController@create')->name('game.create');
    Route::post('/game', 'GameController@store')->name('game.store');
    Route::put('/game/{game}', 'GameController@update')->name('game.update');
    Route::patch('/game/{game}', 'GameController@update')->name('game.update');
    Route::delete('/game/{game}', 'GameController@destroy')->name('game.destroy');
});
Route::post('/placeBet', array('as' => 'placeBet', 'uses' => 'BetController@placeBet'));

