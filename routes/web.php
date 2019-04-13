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


Route::resource('home','HomeController');
//routes to user
Route::resource('users', 'UsersController');
//Json
Route::get('paginate/users', 'UsersController@paginate');

Route::resource('instituitions', 'InstituitionsController');
Route::get('paginate/instituitions', 'InstituitionsController@paginate');
Route::resource('instituitions.products', 'ProductsController');
Route::get('paginate/instituitions/{instituition_id}/products', 'ProductsController@paginate');


Route::resource('groups', 'GroupsController');
Route::get('paginate/groups', 'GroupsController@paginate');
Route::get('paginate/groups/members/{group_id}', 'GroupsController@paginateMembers');

Route::post('groups/{group_id}/user', ['as' => 'groups.user.store', 'uses' => 'GroupsController@userStore']);
