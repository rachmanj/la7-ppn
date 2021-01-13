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
        Route::put('user/change_password/{id}', 'UserController@change_password')->name('user.change_password');
    });

Route::name('accounting.')
    ->prefix('accounting')
    ->namespace('Accounting')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/fakturs/export_excel', 'FakturController@export_excel')->name('fakturs.export_excel');
        Route::get('/fakturs/receive_export_excel', 'FakturController@faktur_receive_export_excel')->name('fakturs.receive_export_excel');
        Route::get('/fakturs/notreceive_export_excel', 'FakturController@faktur_notreceive_export_excel')->name('fakturs.notreceive_export_excel');

        // data ajax
        Route::get('faktur/all/data', 'DataController@fakturall')->name('fakturs.all.data');
        Route::get('faktur/receive/data', 'DataController@receive')->name('fakturs.receive.data');
        Route::get('faktur/receive_already/data', 'DataController@receive_already')->name('fakturs.receive_already.data');
        Route::get('faktur/receive_not/data', 'DataController@receive_not')->name('fakturs.receive_not.data');
        Route::get('faktur/efaktur/data', 'DataController@efaktur')->name('fakturs.efaktur.data');
        Route::get('faktur/duplicates/data', 'DataController@duplicates')->name('fakturs.duplicates.data');
        Route::get('faktur/belumsap/data', 'DataController@belumsap')->name('fakturs.belumsap.data');

        Route::get('fakturs/receive', 'FakturController@receive_index')->name('fakturs.receive_index');
        Route::get('fakturs/receive_already', 'FakturController@receive_already_index')->name('fakturs.receive_already_index');
        Route::get('fakturs/receive_not', 'FakturController@receive_not_index')->name('fakturs.receive_not_index');
        Route::get('fakturs/efaktur', 'FakturController@efaktur_index')->name('fakturs.efaktur_index');
        Route::get('fakturs/efaktur/{id}/edit', 'FakturController@efaktur_edit')->name('fakturs.efaktur_edit');
        Route::put('fakturs/efaktur/{id}', 'FakturController@efaktur_update')->name('fakturs.efaktur_update');
        Route::get('fakturs/duplicates', 'FakturController@duplicates_index')->name('fakturs.duplicates_index');
        Route::get('fakturs/belumsap', 'FakturController@belumsap_index')->name('fakturs.belumsap_index');
        Route::resource('fakturs', 'FakturController');


        Route::post('/fakturs/import_excel', 'FakturController@import_excel')->name('fakturs.import_excel');
    });

Route::name('general.')
    ->prefix('general')
    ->namespace('General')
    ->middleware(['auth'])
    ->group(function () {

        // data ajax
        Route::get('suppliers/data', 'DataController@suppliers')->name('suppliers.data');

        Route::resource('suppliers', 'SupplierController');

        Route::post('/suppliers/import_excel', 'SupplierController@import_excel')->name('suppliers.import_excel');
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
