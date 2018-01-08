<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//hitung
route::post('proseshitung', 'gejalaController@hitung');
route::get('hasilkonsultasi', 'gejalaController@hasilkonsultasi');
route::get('riwayat/{id_pasien}', 'gejalaController@riwayat');
route::get('hasil', 'gejalaController@hasil');
route::get('tambahkonsultasi', 'gejalaController@tambahkonsultasi');
//route resource
route::resource('datapasien', 'datapasienController');
route::resource('datagejala', 'gejalaController');
route::resource('datahimpunan', 'himpunanController');
route::resource('datasolusi', 'solusiController');
route::resource('dataaturan', 'aturanController');
route::resource('datauser', 'userController');
route::resource('daftargejala', 'daftarVariabelController');

//template
// route::get('dashboardlte', 'grafikController@index');
route::get('dashboardlte', function(){
	return view('ltedashboard');
});
route::get('print/{id_gejala}', 'pdfController@getPDF');
