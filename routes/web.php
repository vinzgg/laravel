<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('/auth/login');
});


Route::resource('/admin/surat-disposisi', 'MailListController')->middleware('auth');
Route::get('/admin/surat-disposisi/{id}/print/', 'MailListController@print')->name("mail.print")->middleware('auth');

Auth::routes();

Route::get('/home', function(){
    redirect()->route('surat-disposisi.index');
});
