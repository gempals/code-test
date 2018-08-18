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

use App\Mail\Notification;

Route::get('/', 'FrontController@index')->name('front');

Auth::routes();

Route::group( ['middleware' => ['auth']], function() {    

    Route::group(array('prefix' => 'cpanel_admin'), function(){

        Route::get('home', 'FrontController@admin')->name('admin_home');        
       
        Route::get('dashboard/profile', 'DashboardControler@profile')->name('dashboard.profile_index');
        Route::post('dashboard/profile/set', 'DashboardControler@profile')->name('dashboard.profile');
    	
        /*Route From Resource*/
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
	    Route::resource('news', 'NewsController');        
        Route::resource('dashboard', 'DashboardControler');
    	Route::group(array('prefix' => 'menu'), function(){
    		Route::get('/', 'MenuController@index')->name('menus');
	    	Route::post('/', 'MenuController@postIndex');
		    Route::post('new', 'MenuController@postNew');
		    Route::post('delete', 'MenuController@postDelete');
		    Route::get('edit/{id}', 'MenuController@edit');
		    Route::post('edit/{id}', 'MenuController@postEdit');
    	});

    });
   

});
