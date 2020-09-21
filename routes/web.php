<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@index');
Route::get('/eventDetails', 'PagesController@eventDetails');
Route::get('/berita', 'PagesController@berita');
Route::get('/alumni', 'PagesController@alumni');
Route::get('/contact', 'PagesController@contact');
Route::get('/organisasi', 'PagesController@organisasi');
Route::get('/program', 'PagesController@program');
Route::get('/program/{id}', 'PagesController@detailProgram');
Route::get('/ekstra', 'PagesController@ekstra');
Route::get('/ekstra/{id}', 'PagesController@detailEkstra');
Route::get('/prestasi', 'PagesController@prestasi');
Route::get('/berita', 'PagesController@berita');
Route::get('/berita/{id}', 'PagesController@beritaDetails');
Route::post('/send_email', 'PagesController@contactProcess');
Route::get('/daftar', 'PagesController@daftar');
Route::get('/sarana', 'PagesController@sarana');
Route::get('/sarana/{id}', 'PagesController@detailSarana');
Route::get('/kurikulum', 'PagesController@kurikulum');


Route::get('/admin/periode', 'PeriodeController@index')->middleware('verified');
Route::prefix('api/periode')->middleware('verified')->group(function() {
	Route::get('', 'PeriodeController@all')->withoutMiddleware('verified');
	Route::get('{periode}', 'PeriodeController@show');
	Route::post('', 'PeriodeController@store');
	Route::get('delete/{periode}', 'PeriodeController@destroy');
	Route::post('{periode}', 'PeriodeController@update');	
});

Route::get('/admin/organisasi', 'OrganisasiController@index')->middleware('verified');
Route::prefix('api/organisasi')->middleware('verified')->group(function() {
	Route::get('{id}', 'OrganisasiController@all')->withoutMiddleware('verified');
	Route::get('detail/{periode}', 'OrganisasiController@show');
	Route::post('', 'OrganisasiController@store');
	Route::get('delete/{id}', 'OrganisasiController@destroy');
	Route::post('{id}', 'OrganisasiController@update');	
});

Route::get('/admin/program', 'KegiatanController@index')->middleware('verified');
Route::prefix('api/kegiatan')->middleware('verified')->group(function() {
	Route::get('{id}', 'KegiatanController@all')->withoutMiddleware('verified');
	Route::get('detail/{id}', 'KegiatanController@show');
	Route::post('', 'KegiatanController@store');
	Route::get('delete/{id}', 'KegiatanController@destroy');
	Route::post('{id}', 'KegiatanController@update');
	Route::get('search/{jenis}/{s}', 'KegiatanController@search')->withoutMiddleware('verified');	
});

Route::get('/admin/prestasi', 'PrestasiController@index')->middleware('verified');
Route::prefix('api/prestasi')->middleware('verified')->group(function() {
	Route::get('', 'PrestasiController@all')->withoutMiddleware('verified');
	Route::get('detail/{id}', 'PrestasiController@show');
	Route::post('', 'PrestasiController@store');
	Route::get('delete/{id}', 'PrestasiController@destroy');
	Route::post('{id}', 'PrestasiController@update');	
	Route::get('search/{s}', 'PrestasiController@search');
});

Route::get('/admin/contact', 'ContactController@index')->middleware('verified');
Route::prefix('api/contact')->middleware('verified')->group(function() {
	Route::get('', 'ContactController@all')->withoutMiddleware('verified');
	Route::get('detail/{id}', 'ContactController@show');
	Route::post('', 'ContactController@store');
	Route::get('delete/{id}', 'ContactController@destroy');
	Route::post('{id}', 'ContactController@update');	
	Route::get('search/{s}', 'ContactController@search');
});

Route::get('/admin/sarana', 'SaranaController@index')->middleware('verified');
Route::prefix('api/sarana')->middleware('verified')->group(function() {
	Route::get('', 'SaranaController@all')->withoutMiddleware('verified');
	Route::get('detail/{id}', 'SaranaController@show');
	Route::post('', 'SaranaController@store');
	Route::get('delete/{id}', 'SaranaController@destroy');
	Route::post('{id}', 'SaranaController@update');	
	Route::get('search/{s}', 'SaranaController@search');
});

Route::get('/admin/kurikulum', 'KurikulumController@index')->middleware('verified');
Route::prefix('api/kurikulum')->middleware('verified')->group(function() {
	Route::get('{jenis}', 'KurikulumController@all')->withoutMiddleware('verified');
	Route::get('detail/{id}', 'KurikulumController@show');
	Route::post('', 'KurikulumController@store');
	Route::get('delete/{id}', 'KurikulumController@destroy');
	Route::post('{id}', 'KurikulumController@update');
	Route::get('search/{jenis}/{s}', 'KurikulumController@search');	
});

Route::get('/admin/alumni', 'AlumniController@index')->middleware('verified');
Route::prefix('api/alumni')->middleware('verified')->group(function() {
	Route::get('', 'AlumniController@all')->withoutMiddleware('verified');
	Route::get('detail/{id}', 'AlumniController@show');
	Route::post('', 'AlumniController@store');
	Route::get('delete/{id}', 'AlumniController@destroy');
	Route::post('{id}', 'AlumniController@update');	
	Route::get('search/{s}', 'AlumniController@search');
});

Route::get('/admin/berita', 'BeritaController@index')->middleware('verified');
Route::get('/admin/berita/create', 'BeritaController@create')->middleware('verified');
Route::get('/admin/berita/edit/{id}', 'BeritaController@edit')->middleware('verified');
Route::post('/admin/berita', 'BeritaController@store')->middleware('verified');
Route::post('/admin/berita/update/{id}', 'BeritaController@update')->middleware('verified');
Route::prefix('api/berita')->middleware('verified')->group(function() {
	Route::get('', 'BeritaController@all')->withoutMiddleware('verified');
	Route::get('detail/{id}', 'BeritaController@show');
	Route::post('', 'BeritaController@store');
	Route::get('delete/{id}', 'BeritaController@destroy');
	Route::post('{id}', 'BeritaController@update');
	Route::get('search/{s}', 'BeritaController@search')->withoutMiddleware('verified');
	Route::get('searchHTML/{s}', 'BeritaController@searchHTML')->withoutMiddleware('verified');
	Route::get('limitHTML/{page}', 'BeritaController@limitHTML')->withoutMiddleware('verified');
});

Route::get('/admin/user', 'UserController@index')->middleware('admin');
Route::get('/admin/user/profile/{id}', 'UserController@profile')->middleware('verified');
Route::get('/admin/user/ubahPassword/{id}', 'UserController@ubahPassword')->middleware('verified');
Route::prefix('api/user')->middleware('admin')->group(function() {
	Route::get('', 'UserController@all')->withoutMiddleware('admin');
	Route::get('detail/{id}', 'UserController@show');
	Route::post('', 'UserController@store');
	Route::get('delete/{id}', 'UserController@destroy');
	Route::post('{id}', 'UserController@update');
	Route::get('/toAdmin/{id}', 'UserController@toAdmin');
	Route::post('/updatePassword/{id}', 'UserController@updatePassword');
	Route::get('search/{s}', 'UserController@search');	
});


Route::get('/admin/profil', 'ProfilController@index')->middleware('verified');
Route::post('/api/profil', 'ProfilController@update')->middleware('verified');
Route::get('/api/profil', 'ProfilController@get');

Route::get('/admin/pengasuh', 'PengasuhController@index')->middleware('verified');
Route::post('/api/pengasuh', 'PengasuhController@update')->middleware('verified');
Route::get('/api/pengasuh', 'PengasuhController@get');

Route::get('/sejarah','PagesController@sejarah');
Route::get('/pengasuh', 'PagesController@pengasuh');
Route::get('/about', 'PagesController@about');

Route::get('/admin/tema', 'TemaController@index');
Route::post('/api/tema', 'TemaController@update');
Route::get('/api/tema', 'TemaController@get');
Route::get('/slink', function() {
    $target = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($target, $linkFolder);
});



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');

// DB_DATABASE=u911039425_mydb
// DB_USERNAME=u911039425_fahmi
// DB_PASSWORD=myHostingDb26

