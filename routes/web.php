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



/*
 * From Illuminate/Routing/Router.php
 *
    public function auth()
    {
        // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    }
*/

Auth::routes();


Route::get('/', 'home\HomeController@index')->name('home');


/*
|--------------------------------------------------------------------------
| Gig Features
|--------------------------------------------------------------------------
|
| Gig controller endpoints
|
*/

if(config('app.features.gig')) {

    Route::Group(['middleware' => ['auth']], function(){

        Route::get('/gig/add', 'gig\GigController@addForm')->name('gig.addForm');

        Route::post('/gig/add', 'gig\GigController@add')->name('gig.add');
        
    });
}


