<?php

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]); //For verify Email

Route::get('/home', 'HomeController@index')->name('home');

/*--------------------------UserProfile Start-------------------------------------------------------*/
Route::get('user/profile','HomeController@editprofile')->name('user.profile.show');
Route::get('user/updateprofile','HomeController@updateprofile')->name('profileupdate');

// Route::get('user/profile/{id}', 'HomeController@userUpdate');
Route::put('user/profile/{id}', 'HomeController@userUpdate');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::GET('admin/home','AdminController@index')->name('admin.home');

Route::GET('admin-login','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin-login','Admin\LoginController@login');

Route::GET('admin-password/confirm','Auth\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
Route::POST('admin-password/confirm','Admin\ConfirmPasswordController@confirm');

Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

/*--------------------------UserListRoute at Start Admin Site-------------------------------------------------------*/

Route::resource('admin/user-list','Admin\ListUserController');
Route::get('admin/user-list/block/{id}/{block}', 'Admin\ListUserController@block');
Route::post('admin/user-list/block/{id}/{block}', 'Admin\ListUserController@block');
Route::get('admin/user-list/delete/{id}', 'Admin\ListUserController@delete');

/*--------------------------AdminProfile Start-------------------------------------------------------*/
Route::get('admin/profile','AdminController@editprofile')->name('admin.profile.show');
Route::put('admin/profile/{id}','AdminController@adminUpdate');
Route::get('admin/updateprofile','AdminController@updateprofile');

/*--------------------------userTrash-------------------------------------------------------*/
Route::get('admin/users/trash','Admin\ListUserController@userTrash')->name('user.trash');//User Trash
Route::get('admin/users/restore/{id}','Admin\ListUserController@userRestore')->name('restore');
Route::get('admin/users/restore/all/{id}','Admin\ListUserController@userRestoreAll')->name('restoreAll');