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


Route::get('/qwe','AdminController@qweView');
Route::get('/admin','AdminController@adminindex');
Route::get('/rememberpassword','AdminController@rememberpassword');
Route::get('/sil/{id}', 'AdminController@delete')->where(array('id' => '[0-9]+'));
Route::get('/register','AdminController@Register');
Route::post('/create','AdminController@create');
Route::post('/update/{id}', 'AdminController@update')->where(array('id' => '[0-9]+'));
Route::get('/guncelle/{id}','AdminController@updateView')->where(array('id' => '[0-9]+'));
Route::get('/user-import','ExcelUploadController@userImportView')->name('upload');
Route::post('/user-import-post','ExcelUploadController@userImport')->name('user.import');

Route::get('/purchase','PurchaseController@index');
Route::get('/about','AdminController@aboutView');
Route::get('/services','AdminController@servicesView');
Route::get('/blogPage','AdminController@blogView');
Route::get('/contact','AdminController@contactView');
Route::get('/kisiler','HomeController@kisilerView');
Route::get('/seller','HomeController@sellerView');
Route::get('/receiver','HomeController@receiverView');
Route::get('/reference','AdminController@referenceView');
Route::get('/orderform','HomeController@orderform');
Route::get('/myorders','HomeController@myorders');
Route::get('/form','HomeController@formView');
Route::post('/formadd','HomeController@formaddView')->name('form.add');


Route::get('/siparisler','HomeController@siparisView');
Route::get('/orderapprove/{id}','HomeController@orderapprove');
Route::post('/orderformadd','HomeController@orderformget')->name('orderform.add');


Route::post('/message-save','RegisterController@messagebox');

Route::get('/profile','AdminController@profile');
Route::post('profile','AdminController@update_avatar');

Route::post('/seller-add','HomeController@selleradd')->name('seller.add');
Route::get('/urun-ekle','ProductController@productCreateView');
Route::post('urun-kaydet','ProductController@productCreate')->name('product.create');
Route::get('/urun-liste','ProductController@indexView');
Route::get('/indir','ExcelDownloadController@userDownload')->name('user.download');

Route::get('/adsseller','HomeController@adssellerView');
Auth::routes();

Route::get('/home', 'HomeController@userindex')->name('home');
Route::get('/', function () {
    return view('layouts.user-master');
});
Auth::routes();

Route::get('/anasayfa', 'HomeController@index')->name('anasayfa');

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
