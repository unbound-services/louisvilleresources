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




Route::get('about', 'HomeController@about');

Route::post('submit-resources', 'SubmissionController@submitResources');


// ==============================
//          MANAGEMENT ROUTES
// ===============================
Route::get('/adminlogin', 'HomeController@login');
Route::post('/adminlogin', 'HomeController@doLogin');

Route::group(['middleware'=>'auth'], function(){

    Route::get('/admin/', 'AdminController@index');
    Route::post('/admin/category', 'AdminController@createCategory'); // create a new category


    Route::get('/admin/category/{category}', 'AdminController@editCategory'); // edit a category and its links
    //* Shouldn't the above be read and the below be edit? Legitimately asking?
    Route::post('/admin/category/{category}/edit', 'AdminController@submitCategoryEdit'); // post an edit to a category

    Route::post('/admin/link', 'AdminController@createLink'); // create a new link

    Route::get('/admin/link/{link}', 'AdminController@editLink');
    Route::post('/admin/link/{link}', 'AdminController@updateLink');

});
