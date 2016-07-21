<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Debug
Route::get('debug','DebugController@index');

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/images/{image}',function ($image){
//    //dd($image);
//    if (!File::exists($image=storage_path('app/img/poster/'.$image))) abort(404);
//    $returnImage = Image::make($image);
//    return $returnImage->response();
//});
Route::get('/{slug}','MovieController@show');

Route::get('play/{slug}/{epislug?}','MovieController@play');

Route::get('/','IndexController@index');
Route::get('latestmovie','IndexController@latestmovie');
Route::get('latestseries','IndexController@latestseries');
Route::get('play/{id}','PlayerController@index');

Route::get('/home', 'HomeController@index');
//Route::get('admin',function (){
//    return view('admin.loginpage');
//});
//Admin RegisterLogin Route
$this->get('admin/login', 'Auth\AuthController@showLoginForm');
$this->post('admin/login', 'Auth\AuthController@login');
$this->get('admin/logout', 'Auth\AuthController@logout');
        // Registration Routes...
$this->get('admin/register', 'Auth\AuthController@showRegistrationForm');
$this->post('admin/register', 'Auth\AuthController@register');
        // Password Reset Routes...
$this->get('admin/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('admin/password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('admin/password/reset', 'Auth\PasswordController@reset');

//Admin routes
Route::get('admin/movie/newmovie','Admin\MovieController@newMovie');
Route::resource('admin/movie','Admin\MovieController');
Route::get('admin','Admin\IndexController@index');
Route::get('admin/enable/{id}','Admin\MovieController@enable');
Route::get('admin/disable/{id}','Admin\MovieController@disable');
//Admin search
Route::get('admin/search','Admin\SearchController@search');
//Admin Group
//Route::resource('admin/group','Admin\GroupController');
//User Manager
Route::resource('admin/user','Admin\UserController');
//Ajax Route
Route::get('ajax/movie/{id}','AjaxController@showMovie');
Route::get('ajax/movie/feature','AjaxController@feature');
Route::get('ajax/movie/topview','AjaxController@topView');
Route::get('ajax/movie/mostfav','AjaxController@mostFav');
Route::get('ajax/movie/toprate','AjaxController@topRate');

