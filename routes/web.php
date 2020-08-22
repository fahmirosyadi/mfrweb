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
Route::get('/kegiatan', 'PagesController@kegiatan');
Route::get('/prestasi', 'PagesController@prestasi');

Route::get('/admin/periode', 'PeriodeController@index')->middleware('auth');
Route::prefix('api/periode')->middleware('auth')->group(function() {
	Route::get('', 'PeriodeController@all')->withoutMiddleware('auth');
	Route::get('{periode}', 'PeriodeController@show');
	Route::post('', 'PeriodeController@store');
	Route::get('delete/{periode}', 'PeriodeController@destroy');
	Route::post('{periode}', 'PeriodeController@update');	
});

Route::get('/admin/organisasi', 'OrganisasiController@index')->middleware('auth');
Route::prefix('api/organisasi')->middleware('auth')->group(function() {
	Route::get('{id}', 'OrganisasiController@all')->withoutMiddleware('auth');
	Route::get('detail/{periode}', 'OrganisasiController@show');
	Route::post('', 'OrganisasiController@store');
	Route::get('delete/{id}', 'OrganisasiController@destroy');
	Route::post('{id}', 'OrganisasiController@update');	
});

Route::get('/admin/kegiatan', 'KegiatanController@index')->middleware('auth');
Route::prefix('api/kegiatan')->middleware('auth')->group(function() {
	Route::get('{id}', 'KegiatanController@all')->withoutMiddleware('auth');
	Route::get('detail/{id}', 'KegiatanController@show');
	Route::post('', 'KegiatanController@store');
	Route::get('delete/{id}', 'KegiatanController@destroy');
	Route::post('{id}', 'KegiatanController@update');	
});

Route::get('/admin/prestasi', 'PrestasiController@index')->middleware('auth');
Route::prefix('api/prestasi')->middleware('auth')->group(function() {
	Route::get('', 'PrestasiController@all')->withoutMiddleware('auth');
	Route::get('detail/{id}', 'PrestasiController@show');
	Route::post('', 'PrestasiController@store');
	Route::get('delete/{id}', 'PrestasiController@destroy');
	Route::post('{id}', 'PrestasiController@update');	
});

Route::get('/admin/sarana', 'SaranaController@index')->middleware('auth');
Route::prefix('api/sarana')->middleware('auth')->group(function() {
	Route::get('', 'SaranaController@all')->withoutMiddleware('auth');
	Route::get('detail/{id}', 'SaranaController@show');
	Route::post('', 'SaranaController@store');
	Route::get('delete/{id}', 'SaranaController@destroy');
	Route::post('{id}', 'SaranaController@update');	
});

Route::get('/admin/kurikulum', 'KurikulumController@index')->middleware('auth');
Route::prefix('api/kurikulum')->middleware('auth')->group(function() {
	Route::get('{jenis}', 'KurikulumController@all')->withoutMiddleware('auth');
	Route::get('detail/{id}', 'KurikulumController@show');
	Route::post('', 'KurikulumController@store');
	Route::get('delete/{id}', 'KurikulumController@destroy');
	Route::post('{id}', 'KurikulumController@update');	
});

Route::get('/admin/alumni', 'AlumniController@index')->middleware('auth');
Route::prefix('api/alumni')->middleware('auth')->group(function() {
	Route::get('', 'AlumniController@all')->withoutMiddleware('auth');
	Route::get('detail/{id}', 'AlumniController@show');
	Route::post('', 'AlumniController@store');
	Route::get('delete/{id}', 'AlumniController@destroy');
	Route::post('{id}', 'AlumniController@update');	
});

Route::get('/admin/profil', 'ProfilController@index')->middleware('auth');
Route::post('/api/profil', 'ProfilController@update')->middleware('auth');
Route::get('/api/profil', 'ProfilController@get');

Route::get('/admin/tema', function () {
    return view('admin/tema');
});
Route::post('/api/tema', 'TemaController@update');
Route::get('/api/tema', 'TemaController@get');
Route::get('/slink', function() {
    $target = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($target, $linkFolder);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// DB_DATABASE=u911039425_mydb
// DB_USERNAME=u911039425_fahmi
// DB_PASSWORD=myHostingDb26

