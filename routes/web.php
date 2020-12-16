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

/**
 * User reelated routes
 */

Route::get('/', function ()
{
    return view('users.login');
});
Route::get('/register', function ()
{
    return view('users.register');
});
Route::get('/addUser', 'UserController@addUser');
Route::get('/registerUser', 'UserController@returnRegister');
Route::post('/registered', 'UserController@addUser');
Route::get('/getUser', 'UserController@login');
Route::get('/logged',function ()
{
    return view('users.menu');
});

/**
 * Pizza related routes
 */

Route::get('/createPizza', 'PizzaController@returnCreatePizza');
