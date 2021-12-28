<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'site'],function (){
    Route::get('/all','SiteController@apiSiteList')->name('api.site.all');
});
Route::group(['prefix'=>'pegawai'],function (){
    Route::get('/download','PegawaiController@download')->name('api.pegawai.download');
    Route::get('/search','PegawaiController@search')->name('api.pegawai.search');
});

