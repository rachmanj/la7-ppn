<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'role:superadmin|admin'])
    ->group(function () {
        Route::resource('user', 'UserController');
        Route::resource('permission', 'PermissionController');
        Route::resource('role', 'RoleController');
    });

Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('/home', 'HomeController@index')->name('home');

    // data ajax

});
