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


Route::get('/admin/periode', 'PeriodeController@index')->middleware('auth','verified');
Route::prefix('api/periode')->middleware('auth','verified')->group(function() {
	Route::get('', 'PeriodeController@all')->withoutMiddleware('auth','verified');
	Route::get('{periode}', 'PeriodeController@show');
	Route::post('', 'PeriodeController@store');
	Route::get('delete/{periode}', 'PeriodeController@destroy');
	Route::post('{periode}', 'PeriodeController@update');	
});

Route::get('/admin/organisasi', 'OrganisasiController@index')->middleware('auth','verified');
Route::prefix('api/organisasi')->middleware('auth','verified')->group(function() {
	Route::get('{id}', 'OrganisasiController@all')->withoutMiddleware('auth','verified');
	Route::get('detail/{periode}', 'OrganisasiController@show');
	Route::post('', 'OrganisasiController@store');
	Route::get('delete/{id}', 'OrganisasiController@destroy');
	Route::post('{id}', 'OrganisasiController@update');	
});

Route::get('/admin/program', 'KegiatanController@index')->middleware('auth','verified');
Route::prefix('api/kegiatan')->middleware('auth','verified')->group(function() {
	Route::get('{id}', 'KegiatanController@all')->withoutMiddleware('auth','verified');
	Route::get('detail/{id}', 'KegiatanController@show');
	Route::post('', 'KegiatanController@store');
	Route::get('delete/{id}', 'KegiatanController@destroy');
	Route::post('{id}', 'KegiatanController@update');
	Route::get('search/{jenis}/{s}', 'KegiatanController@search')->withoutMiddleware('auth','verified');	
});

Route::get('/admin/prestasi', 'PrestasiController@index')->middleware('auth','verified');
Route::prefix('api/prestasi')->middleware('auth','verified')->group(function() {
	Route::get('', 'PrestasiController@all')->withoutMiddleware('auth','verified');
	Route::get('detail/{id}', 'PrestasiController@show');
	Route::post('', 'PrestasiController@store');
	Route::get('delete/{id}', 'PrestasiController@destroy');
	Route::post('{id}', 'PrestasiController@update');	
	Route::get('search/{s}', 'PrestasiController@search')->withoutMiddleware('auth','verified');
});

Route::get('/admin/contact', 'ContactController@index')->middleware('auth','verified');
Route::prefix('api/contact')->middleware('auth','verified')->group(function() {
	Route::get('', 'ContactController@all')->withoutMiddleware('auth','verified');
	Route::get('detail/{id}', 'ContactController@show');
	Route::post('', 'ContactController@store');
	Route::get('delete/{id}', 'ContactController@destroy');
	Route::post('{id}', 'ContactController@update');	
	Route::get('search/{s}', 'ContactController@search')->withoutMiddleware('auth','verified');
});

Route::get('/admin/sarana', 'SaranaController@index')->middleware('auth','verified');
Route::prefix('api/sarana')->middleware('auth','verified')->group(function() {
	Route::get('', 'SaranaController@all')->withoutMiddleware('auth','verified');
	Route::get('detail/{id}', 'SaranaController@show');
	Route::post('', 'SaranaController@store');
	Route::get('delete/{id}', 'SaranaController@destroy');
	Route::post('{id}', 'SaranaController@update');	
	Route::get('search/{s}', 'SaranaController@search')->withoutMiddleware('auth','verified');
});

Route::get('/admin/kurikulum', 'KurikulumController@index')->middleware('auth','verified');
Route::prefix('api/kurikulum')->middleware('auth','verified')->group(function() {
	Route::get('{jenis}', 'KurikulumController@all')->withoutMiddleware('auth','verified');
	Route::get('detail/{id}', 'KurikulumController@show');
	Route::post('', 'KurikulumController@store');
	Route::get('delete/{id}', 'KurikulumController@destroy');
	Route::post('{id}', 'KurikulumController@update');
	Route::get('search/{jenis}/{s}', 'KurikulumController@search')->withoutMiddleware('auth','verified');
});

Route::get('/admin/alumni', 'AlumniController@index')->middleware('auth','verified');
Route::prefix('api/alumni')->middleware('auth','verified')->group(function() {
	Route::get('', 'AlumniController@all')->withoutMiddleware('auth','verified');
	Route::get('detail/{id}', 'AlumniController@show');
	Route::post('', 'AlumniController@store');
	Route::get('delete/{id}', 'AlumniController@destroy');
	Route::post('{id}', 'AlumniController@update');	
	Route::get('search/{s}', 'AlumniController@search')->withoutMiddleware('auth','verified');
});

Route::get('/admin/berita', 'BeritaController@index')->middleware('auth','verified');
Route::get('/admin/berita/create', 'BeritaController@create')->middleware('auth','verified');
Route::get('/admin/berita/edit/{id}', 'BeritaController@edit')->middleware('auth','verified');
Route::post('/admin/berita', 'BeritaController@store')->middleware('auth','verified');
Route::post('/admin/berita/update/{id}', 'BeritaController@update')->middleware('auth','verified');
Route::prefix('api/berita')->middleware('auth','verified')->group(function() {
	Route::get('', 'BeritaController@all')->withoutMiddleware('auth','verified');
	Route::get('detail/{id}', 'BeritaController@show');
	Route::post('', 'BeritaController@store');
	Route::get('delete/{id}', 'BeritaController@destroy');
	Route::post('{id}', 'BeritaController@update');
	Route::get('search/{s}', 'BeritaController@search')->withoutMiddleware('auth','verified');
	Route::get('searchHTML/{s}', 'BeritaController@searchHTML')->withoutMiddleware('auth','verified');
	Route::get('limitHTML/{page}', 'BeritaController@limitHTML')->withoutMiddleware('auth','verified');
});

Route::get('/admin/user', 'UserController@index')->middleware('admin');
Route::get('/admin/user/profile/{id}', 'UserController@profile')->middleware('auth','verified');
Route::get('/admin/user/ubahPassword/{id}', 'UserController@ubahPassword')->middleware('auth','verified');
Route::prefix('api/user')->middleware('admin')->group(function() {
	Route::get('', 'UserController@all')->withoutMiddleware('admin');
	Route::get('detail/{id}', 'UserController@show');
	Route::post('', 'UserController@store');
	Route::get('delete/{id}', 'UserController@destroy');
	Route::post('{id}', 'UserController@update');
	Route::get('/toAdmin/{id}', 'UserController@toAdmin');
	Route::post('/updatePassword/{id}', 'UserController@updatePassword');
	Route::get('search/{s}', 'UserController@search')->withoutMiddleware('auth','verified');
});


Route::get('/admin/profil', 'ProfilController@index')->middleware('auth','verified');
Route::post('/api/profil', 'ProfilController@update')->middleware('auth','verified');
Route::get('/api/profil', 'ProfilController@get');

Route::get('/admin/pengasuh', 'PengasuhController@index')->middleware('auth','verified');
Route::post('/api/pengasuh', 'PengasuhController@update')->middleware('auth','verified');
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

Route::get('/home', 'HomeController@index')->middleware('auth','verified')->name('home');

// DB_DATABASE=u911039425_mydb
// DB_USERNAME=u911039425_fahmi
// DB_PASSWORD=myHostingDb26

