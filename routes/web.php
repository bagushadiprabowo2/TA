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
//route CRUD USAHA
Route::get('/usaha','usahaController@index');
Route::get('/usaha/tambah','usahaController@tambah');
Route::post('/usaha/store','usahaController@store');
Route::get('/usaha/tambah_paket','usahaController@tambah_paket');
Route::get('/usaha/tambah_paket_pelapak/{id}','usahaController@tambah_paket_pelapak');
Route::post('/usaha/store_paket','usahaController@store_paket');
Route::post('/usaha/store_paket_pelapak','usahaController@store_paket_pelapak');
Route::get('/usaha/edit/{id}','usahaController@edit_usaha');
Route::get('/usaha/edit_paket/{id}','usahaController@edit_paket');
Route::get('/usaha/edit_usaha_pelapak/{id}','usahaController@edit_usaha_pelapak');
Route::post('/usaha/update_usaha_pelapak','usahaController@update_usaha_pelapak');
Route::post('/usaha/update_usaha','usahaController@update_usaha');
Route::post('/usaha/update_paket','usahaController@update_paket');
Route::get('/usaha/hapus/{id_usaha}','usahaController@hapus');
Route::get('/usaha/hapus_paket/{id}','usahaController@hapus_paket');
Route::get('/usaha/tampil/{id}','usahaController@show');

//CRUD PENGGUNA
Route::get('/pengguna','penggunaController@index');
Route::get('/pengguna/tambah','penggunaController@tambah');
Route::post('/pengguna/store','penggunaController@store');
Route::get('/pengguna/hapus/{id_pengguna}','penggunaController@hapus');
Route::get('/pengguna/edit/{id_pengguna}','penggunaController@edit');
Route::post('/pengguna/update','penggunaController@update');

//CRUD DAFTAR
Route::get('/index', 'loginController@index');
Route::get('/', 'loginController@login');
Route::post('/loginPost', 'loginController@loginPost');
Route::get('/register', 'loginController@register');
Route::post('/registerPost', 'loginController@registerPost');
Route::get('/logout', 'loginController@logout');

//CRUD KOTA
Route::get('/kota','kotaController@index');
Route::get('/kota/tambah','kotaController@tambah');
Route::post('/kota/store','kotaController@store');
Route::get('/kota/hapus/{id_kota}','kotaController@hapus');
Route::get('/kota/edit/{id_kota}','kotaController@edit');
Route::post('/kota/update','kotaController@update');

//CRUD WISATA
Route::get('/wisata','wisataController@index');
Route::get('/wisata/tambah','wisataController@tambah');
Route::post('/wisata/store','wisataController@store');
Route::get('/wisata/hapus/{id_wisata}','wisataController@hapus');
Route::get('/wisata/edit/{id_wisata}','wisataController@edit');
Route::post('/wisata/update','wisataController@update');

//CRUD USAHA FRONT END

Route::get('/usahaku','usahakuController@index');
Route::get('/usahaku/show','usahakuController@show');
Route::post('/usahaku/store','usahakuController@store');

//CRUD TRANSAKSI
//CRUD WISATA
Route::get('/transaksi','transaksiController@index');
Route::get('/transaksi/pembatalan/{id}','transaksiController@pembatalan');
Route::post('/transaksi/store_pembatalan','transaksiController@store_pembatalan');
Route::get('/transaksi/transaksi_detail/{id}','transaksiController@detail_transaksi');
Route::get('/transaksi/transaksi_pelapak/{id}','transaksiController@transaksi_pelapak');
// Route::get('/transaksi/transaksi_pelapak/{id}','transaksiController@upload_show');
Route::get('/transaksi/upload/{id}','transaksiController@upload');
Route::post('/transaksi/upload_file','transaksiController@upload_file');
Route::get('/transaksi/lihat_transaksi/{id}','transaksiController@lihat_transaksi');
Route::get('/transaksi/status/edit/{request}/{id}','transaksiController@update_status');
Route::get('/transaksi/tampil','transaksiController@show');
Route::get('/transaksi/detail/{id}','transaksiController@detail');
Route::get('/transaksi/tambah/{id}','transaksiController@tambah');
Route::post('/transaksi/store','transaksiController@store');
Route::get('/transaksi/hapus/{id_transaksi}','transaksiController@hapus');
Route::get('/transaksi/edit/{id_transaksi}','transaksiController@edit');
Route::post('/transaksi/update','transaksiController@update');

Route::get('/transaksi/riwayat_transaksi','transaksiController@riwayat_transaksi');
Route::get('/transaksi/riwayat_transaksi_pelapak','transaksiController@riwayat_transaksi_pelapak');
Route::get('/transaksi/riwayat_topup','transaksiController@riwayat_topup');
Route::get('/transaksi/upload_file/{id}','transaksiController@pelapak_upload_file');

Route::get('/transaksi/komen/{usaha}', 'transaksiController@komen');
Route::get('/transaksi/show_komen/{usaha}', 'transaksiController@show_komen');
Route::post('/transaksi/komen/store', 'transaksiController@komenstore');

Route::get('/transaksi/topup/{id}','transaksiController@topup');
Route::post('/transaksi/store_topup','transaksiController@store_topup');
Route::get('/transaksi/generate/{id}','transaksiController@topup_generate');
Route::get('/transaksi/generate_edit/{id}','transaksiController@edit_topup');
Route::post('/transaksi/update_topup','transaksiController@update_topup');
Route::get('/admin','transaksiController@show');

Route::get('/contact','transaksiController@contact');
Route::get('/transaksi/kode/generate/{id}','transaksiController@buatkode');
Route::get('/transaksi/toupup/saldo/{id}/{pengguna}/{kode}','transaksiController@toupupsaldo');
