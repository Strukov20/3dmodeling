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
 * Home
 */
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

/**
 * Authentication
 */
Route::get('/signup', [
    'uses' => 'Auth\AuthController@getSignUp',
    'as' => 'auth.signup',
    'middleware' => ['guest']
]);

Route::post('/signup', [
    'uses' => 'Auth\AuthController@postSignUp',
    'middleware' => ['guest']
]);

Route::get('/signup/{token}', [
    'uses' => 'Auth\AuthController@getEmailConf',
    'as' => 'auth.confirm',
    'middleware' => ['guest']
]);

Route::get('/signin', [
    'uses' => 'Auth\AuthController@getSignIn',
    'as' => 'auth.signin',
    'middleware' => ['guest']
]);

Route::post('/signin', [
    'uses' => 'Auth\AuthController@postSignIn',
    'as' => 'auth.signin',
    'middleware' => ['guest']
]);

Route::get('/signout', [
    'uses' => 'Auth\AuthController@getSignOut',
    'as' => 'auth.signout',
    'middleware' => ['auth']
]);

/**
 * Search
 */
Route::get('/search', [
    'uses' => 'SearchController@getResults',
    'as' => 'search.results'
]);

/**
 * User Profile
 */
Route::get('/profile', [
    'uses' => 'ProfileController@getProfile',
    'as' => 'profile.index',
    'middleware' => ['auth']
]);

Route::get('/edit', [
    'uses' => 'ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth']
]);

Route::post('/edit/infoupdate', [
    'uses' => 'ProfileController@postEdit',
    'as' => 'profile.editPost',
    'middleware' => ['auth']
]);

Route::post('/edit/passupdate', [
    'uses' => 'ProfileController@postEditPass',
    'as' => 'profile.editPass',
    'middleware' => ['auth']
]);

/**
 * Admin Panel
 */
Route::get('/admin',[
    'uses' => 'Admin\AdminController@getDashboard',
    'as' => 'admin.index',
    'middleware' => ['auth','admin']
]);

Route::get('/admin/users',[
    'uses' => 'Admin\AdminController@getUsers',
    'as' => 'admin.users',
    'middleware' => ['auth','admin']
]);
Route::get('/admin/edit/user/{user_id}',[
    'uses' => 'Admin\EditController@getEditUser',
    'as' => 'admin.edit.user',
    'middleware' => ['auth','admin']
]);
Route::post('/admin/edit/user/{user_id}',[
    'uses' => 'Admin\EditController@postEditUser',
    'as' => 'admin.edit.user',
    'middleware' => ['auth','admin']
]);
Route::get('/admin/delete/user/{user_id}',[
    'uses' => 'Admin\EditController@getDeleteUser',
    'as' => 'admin.delete.user',
    'middleware' => ['auth','admin']
]);

Route::get('/admin/materials',[
    'uses' => 'Admin\AdminController@getMaterials',
    'as' => 'admin.materials',
    'middleware' => ['auth','admin']
]);
Route::get('/admin/edit/material/{material_id}',[
    'uses' => 'Admin\EditController@getEditMaterial',
    'as' => 'admin.edit.material',
    'middleware' => ['auth','admin']
]);
Route::post('/admin/edit/material/{material_id}',[
    'uses' => 'Admin\EditController@postEditMaterial',
    'as' => 'admin.edit.material',
    'middleware' => ['auth','admin']
]);
Route::get('/admin/delete/material/{material_id}',[
    'uses' => 'Admin\EditController@getDeleteMaterial',
    'as' => 'admin.delete.material',
    'middleware' => ['auth','admin']
]);
Route::get('/admin/create/material',[
    'uses' => 'Admin\CreateController@getCreateMaterial',
    'as' => 'admin.create.material',
    'middleware' => ['auth','admin']
]);
Route::post('/admin/create/material',[
    'uses' => 'Admin\CreateController@postCreateMaterial',
    'as' => 'admin.create.material',
    'middleware' => ['auth','admin']
]);



/**
 * Messages
 */
Route::get('/im/chat{chatId}', [
    'uses' => 'MessageController@getMessages',
    'as' => 'messages.show',
    'middleware' => ['auth']
]);

Route::post('/im/send/{chatId}', [
    'uses' => 'MessageController@postMessage',
    'as' => 'messages.send',
    'middleware' => ['auth']
]);

Route::get('/im', [
    'uses' => 'MessageController@getDialogs',
    'as' => 'dialogs.show',
    'middleware' => ['auth']
]);

Route::get('/im/create', [
    'uses' => 'MessageController@createDialog',
    'as' => 'dialogs.create',
    'middleware' => ['auth']
]);

/**
 * Search
 */
Route::get('/search', [
    'uses' => 'SearchController@getResults',
    'as' => 'search.results'
]);

/**
 * Materials
 */
Route::get('/material/{materialId}', [
    'uses' => 'MaterialController@getMaterial',
    'as' => 'material.index',
]);