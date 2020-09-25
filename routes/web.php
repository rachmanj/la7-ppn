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

Route::name('accounting.')
    ->prefix('accounting')
    ->namespace('Accounting')
    ->middleware(['auth'])
    ->group(function () {

        // data ajax
        Route::get('fakturall/data', 'DataController@fakturall')->name('fakturall.data');
        Route::get('fakturnoreceive/data', 'DataController@fakturnoreceive')->name('fakturnoreceive.data');
        Route::get('fakturduplicate/data', 'DataController@fakturduplicate')->name('fakturduplicate.data');
        // Route::get('fakturbelumsap/data', 'DataController@fakturbelumsap')->name('fakturbelumsap.data');

        Route::resource('fakturall', 'FakturallController');
        Route::resource('fakturnoreceive', 'FakturnoreceiveController');
        // Route::resource('fakturbelumsap', 'FakturbelumsapController');
        Route::resource('fakturduplicate', 'FakturduplicateController');

        Route::post('/fakturall/import_excel', 'FakturallController@import_excel')->name('fakturall.import_excel');
    });

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);

// Route::middleware(['auth'])->group(function () {

//     //dashboard
//     Route::get('/home', 'HomeController@index')->name('home');

//     // data ajax
//     Route::get('fakturs/data', 'DataController@fakturs')->name('fakturs.data');
//     Route::get('fakturs/outs/data', 'DataController@fakturs_outs')->name('fakturs_outs.data');

//     Route::get('/fakturs/outs', 'FakturController@fakturs_outs')->name('fakturs_outs.index');
//     Route::resource('fakturs', 'FakturController');
//     Route::post('/fakturs/import_excel', 'FakturController@import_excel')->name('fakturs.import_excel');
// });
