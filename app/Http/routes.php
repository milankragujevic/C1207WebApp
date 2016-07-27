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
Route::get('/movie/{slug}','MovieController@show');
Route::get('play/{slug}/{epislug?}','MovieController@play');
Route::get('/','IndexController@index');
Route::get('latestmovie','IndexController@latestmovie');
Route::get('latestseries','IndexController@latestseries');
Route::get('/request-movie','IndexController@createRequest');
Route::post('/storerequest','IndexController@storeRequest');

//Filter
Route::get('/genre/{genre}','FilterController@genre');
Route::get('/director/{director}','FilterController@director');
Route::get('/star/{star}','FilterController@star');
Route::get('/country/{country}','FilterController@country');
Route::get('/cinema','FilterController@cinema');
Route::get('/tvseries','FilterController@tvseries');
Route::get('/topimdb','FilterController@topimdb');
Route::get('/hot','FilterController@hot');
Route::get('/requested','FilterController@requested');
Route::get('/tags/{tag}','FilterController@tag');
Route::get('/search','FilterController@search');
Route::get('dmca',function (){
    return view('dmca');
});

Route::get('ads',function (){
   return view('ads');
});

Route::get('contact',function (){
    return view('contact');
});

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
Route::get('admin/enable/{id}','Admin\MovieController@enable');
Route::get('admin/disable/{id}','Admin\MovieController@disable');
Route::get('admin/','Admin\DashboardController@dashboard1');
Route::get('admin/dashboard2','Admin\DashboardController@dashboard2');
Route::get('admin/dashboard3','Admin\DashboardController@dashboard3');
Route::resource('admin/episode','Admin\EpisodeController');
Route::get('admin/episode/movie/{imdb}','Admin\EpisodeController@index');
Route::get('admin/tags/{id?}','Admin\MovieController@tagsManager');
Route::get('admin/banner/{id?}','Admin\BannerController@index');
Route::get('admin/banner-edit/{id}','Admin\BannerController@edit');
Route::post('admin/banner-update/{id}','Admin\BannerController@update');
//Admin search
Route::get('admin/search','Admin\SearchController@search');
//Admin Group
//Route::resource('admin/group','Admin\GroupController');
//User Manager
Route::resource('admin/user','Admin\UserController');
//Ajax Route
Route::get('ajax/movie/id/{id}','AjaxController@showMovie');
Route::get('ajax/movie/feature','AjaxController@feature');
Route::get('ajax/movie/topview','AjaxController@topView');
Route::get('ajax/movie/mostfav','AjaxController@mostFav');
Route::get('ajax/movie/toprate','AjaxController@topRate');
Route::get('ajax/search/{name}','AjaxController@search');

//Movie Request Route
Route::get('admin/request/{id?}','Admin\MovieRequestController@show');
Route::get('/googlelink/{code}','GoogleLinkController@index');
//Analytics
Route::get('analytics','AnalyticsController@index');

