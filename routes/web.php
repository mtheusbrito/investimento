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

Route::get('/', ['uses' => 'Controller@homepage']);
// Route::get('/cadastro',['uses'=> 'Controller@cadastrar']);



//Routes to user auth
Route::get('/login', ['uses' => 'Controller@login']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);



//routes to user
Route::resource('users', 'UsersController');

Route::resource('instituitions', 'InstituitionsController');

Route::resource('groups', 'GroupsController');

Route::post('groups/{group_id}/user', ['as' => 'groups.user.store', 'uses' => 'GroupsController@userStore']);
