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

Route::get('/', 'HomeController@index');
Route::get('/directory', 'BusinessDirectoryController@index');
Route::get('/directory/{business}', 'BusinessDirectoryController@view');


Route::get('about', 'HomeController@about');

Route::post('submit-resources', 'SubmissionController@submitResources');
Route::get('contact', 'SubmissionController@getForm');


// ==============================
//          MANAGEMENT ROUTES
// ===============================
Route::get('/adminlogin', 'HomeController@login');
Route::post('/adminlogin', 'HomeController@doLogin');

Route::group(['middleware'=>'auth'], function(){

    Route::get('/admin/', 'AdminController@index');

    Route::get('/admin/business', 'AdminBusinessController@index');
    Route::post('/admin/business', 'AdminBusinessController@createBusiness');
    Route::get('/admin/business/{business}', 'AdminBusinessController@edit');
    Route::post('/admin/business/{business}', 'AdminBusinessController@update');
    Route::post('/admin/business/{business}/tag', 'TagController@addTagsToBusiness');

    Route::post('/admin/category', 'AdminController@createCategory'); // create a new category


    Route::get('/admin/category/{category}', 'AdminController@editCategory'); // edit a category and its links
    Route::post('/admin/category/{category}', 'AdminController@updateCategory'); // post an edit to a category

    Route::post('/admin/link', 'AdminController@createLink'); // create a new link

    Route::get('/admin/link/{link}', 'AdminController@editLink');
    Route::post('/admin/link/{link}', 'AdminController@updateLink');


});
