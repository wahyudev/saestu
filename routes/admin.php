<?php

Route::get('load-dosen-pegawai','LoadDataController@loadDosenPegawai');

Route::get('dashboard','DashboardController@index');
Route::resource('bidang','BidangController');
Route::resource('indikator-kinerja','IndikatorKinerjaController');
Route::resource('sasaran-strategis','SasaranStrategisController');
Route::resource('evaluasi-kinerja','EvaluasiKinerjaController');
Route::resource('iku-depan','IkuDepanController');
Route::resource('manage-user','UserController');
Route::resource('manage-role','RoleController');
Route::resource('manage-menu','MenuController');
Route::post('manage-menu/create-permission','MenuController@createPermission');
Route::resource('log-aktivitas','LogAktivitasController');
Route::get('unauthorized',function(){
echo "Maaf untuk sementara yag dapat mengakses aplikasi ini adalah operator dan validator yg ditunjuk oleh prodi, sedangkan untuk melihat apakah kegiatan sudah dimasukan atau tidak oleh operator, maka dapat dilihat pada halaman <a href='".url('https://simpeg.unja.ac.id/login')."'>SIMPEG</a>  pada menu Riwayat Kegiatan (akan segera dibuat tampilannya) dimana data nya mengambil data SIREDO dan LEGAL DRAFTING ";
});



