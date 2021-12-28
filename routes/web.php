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

Route::group(['middleware' => 'visitor'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/formLogin', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@postLogin');
});

Route::post('/logout', 'LoginController@logout');
Route::post('/gantipassword', 'LoginController@gantipassword')->name('gantipassword');

Route::group(['middleware' => 'user'], function () {
    Route::get('/user', 'userController@index')->name('user');

    Route::get('/user/pengajuan_email', 'emailController@index')->name('pengajuanEmail');
    Route::post('/user/pengajuan_email/insert', 'emailController@insertpengajuan')->name('pengajuanEmailInsert');
    Route::get('/user/pengajuan_email/getdata', 'emailController@getDataPengajaun');

    Route::get('/user/pengajuan_se', 'sertifikatController@index')->name('pengajuanSE');
    Route::post('/user/pengajuan_se/insert', 'sertifikatController@insertpengajuan')->name('pengajuanseinsert');
    Route::get('/user/pengajuan_se/getdata', 'sertifikatController@getDataPengajaun');
    Route::post('/user/pengajuan_se/published', 'sertifikatController@published')->name('pembuatanpublished');


    Route::get('/user/pencabutan_se', 'sertPencabutanController@index')->name('pencabutanSE');
    Route::post('/user/pencabutan_se/insert', 'sertPencabutanController@insert')->name('pencabutanseinsert');
    Route::get('/user/pencabutan_se/getdata', 'sertPencabutanController@getData');
    Route::post('/user/pencabutan_se/published', 'sertPencabutanController@published')->name('pencabutanpublished');

    Route::get('/user/perubahan_se', 'sertPerubahanController@index')->name('perubahanSE');
    Route::post('/user/perubahan_se/insert', 'sertPerubahanController@insert')->name('perubahanseinsert');
    Route::get('/user/perubahan_se/getdata', 'sertPerubahanController@getData');

    Route::get('/user/layanan', 'layananController@index')->name('layanan');
    Route::get('/user/layanan/getSchedule', 'layananController@getSchedule');
    Route::get('/user/layanan/display-jadwal', 'layananController@displaySchedule')->name('jamming.display_schedule');
    Route::post('/user/layanan/insert', 'layananController@insert')->name('layananinsert');
    Route::post('/user/layanan/cancel', 'layananController@cancel')->name('layanancancel');
    Route::get('/user/layanan/getdata', 'layananController@getData');

    Route::get('/user/pengajuan_pentest', 'pentestController@index')->name('pengajuanPentest');
    Route::post('/user/pengajuan_pentest/insert', 'pentestController@insert')->name('pengajuanPentestInsert');
    Route::get('/user/pengajuan_pentest/getdata', 'pentestController@getData');

    Route::get('/user/insiden', 'insidenController@index')->name('insiden');
    Route::post('/user/insiden/insert', 'insidenController@insert')->name('Insideninsert');
    Route::post('/user/insiden/cancel', 'insidenController@cancel')->name('Insidencancel');
    Route::get('/user/insiden/getdata', 'insidenController@getData');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'adminController@index')->name('admin');

    Route::get('/admin/email/', 'adminEmailController@index')->name('adminemail');
    Route::get('/admin/email/getdata', 'adminEmailController@getData');
    Route::post('/admin/email/aprove', 'adminEmailController@aprove')->name('emailaprove');
    Route::post('/admin/email/denied', 'adminEmailController@denied')->name('emaildenied');
    Route::post('/admin/email/published', 'adminEmailController@published')->name('emailpublished');


    Route::get('/admin/sertifikat/pembuatan', 'adminSertifikatController@index')->name('adminpembuatan');
    Route::get('/admin/sertifikat/pembuatan/getdata', 'adminSertifikatController@getData');
    Route::post('/admin/sertifikat/pembuatan/aprove', 'adminSertifikatController@aprove')->name('pembuatanaprove');
    Route::post('/admin/sertifikat/pembuatan/denied', 'adminSertifikatController@denied')->name('pembuatandenied');
    Route::get('/admin/sertifikat/pembuatan/getdatapublished', 'adminSertifikatController@getDataPublished');
    // Route::post('/admin/sertifikat/pembuatan/published', 'adminSertifikatController@published')->name('pembuatanpublished');

    Route::get('/admin/sertifikat/p12', 'adminSertifikatController@p12')->name('adminp12');

    Route::get('/admin/sertifikat/perubahan', 'adminSertifikatPerubahanController@index')->name('adminperubahan');
    Route::get('/admin/sertifikat/perubahan/getdata', 'adminSertifikatPerubahanController@getData');
    Route::post('/admin/sertifikat/perubahan/aprove', 'adminSertifikatPerubahanController@aprove')->name('perubahanaprove');
    Route::post('/admin/sertifikat/perubahan/denied', 'adminSertifikatPerubahanController@denied')->name('perubahandenied');

    Route::get('/admin/sertifikat/pencabutan', 'adminSertifikatPencabutanController@index')->name('adminpencabutan');
    Route::get('/admin/sertifikat/pencabutan/getdata', 'adminSertifikatPencabutanController@getData');
    Route::post('/admin/sertifikat/pencabutan/aprove', 'adminSertifikatPencabutanController@aprove')->name('pencabutanaprove');
    Route::post('/admin/sertifikat/pencabutan/denied', 'adminSertifikatPencabutanController@denied')->name('pencabutandenied');
    //Route::get('/admin/sertifikat/list', 'adminSertifikatDaftarController@index')->name('serfikatlist');

    Route::get('/admin/layananjamming', 'adminLayananController@index')->name('adminlayanan');
    Route::get('/admin/layananjamming/getdata', 'adminLayananController@getData');
    Route::post('/admin/layananjamming/aprove', 'adminLayananController@aprove')->name('layananaprove');
    Route::post('/admin/layananjamming/denied', 'adminLayananController@denied')->name('layanandenied');
    //Route::get('/admin/layananjamming/list', 'adminLayananListController@index')->name('layananlist');

    Route::get('/admin/layananpentest', 'adminPentestController@index')->name('adminpentest');
    Route::get('/admin/layananpentest/getdata', 'adminPentestController@getData');
    Route::post('/admin/layananpentest/aprove', 'adminPentestController@aprove')->name('pentestaprove');
    Route::get('/admin/layananpentest/detail/{id}', 'adminPentestController@detail')->name('pentestdetail');


    Route::get('/admin/IncidentHandling', 'adminIncidentHandling@index')->name('adminincident');
    Route::get('/admin/IncidentHandling/getdata', 'adminIncidentHandling@getData');
    // Route::post('/admin/IncidentHandling/aprove', 'adminIncidentHandling@aprove')->name('incidentaprove');
    Route::post('/admin/IncidentHandling/denied', 'adminIncidentHandling@denied')->name('incidentdenied');
    // Route::post('/admin/IncidentHandling/finish', 'adminIncidentHandling@finish')->name('incidentfinish');
    Route::get('/admin/IncidentHandling/detail/{id}', 'adminIncidentHandling@detail')->name('incidentdetail');
    Route::get('/admin/IncidentHandling/lapor/{flag}/{id}', 'adminIncidentHandling@aprove')->name('incidentaprove');
    //Route::get('/admin/layananjamming/list', 'adminLayananListController@index')->name('layananlist');

    Route::get('/admin/LaporanIncident', 'adminLaporanInsidenController@index')->name('adminlaporan');
    Route::get('/admin/LaporanIncident/getdata', 'adminLaporanInsidenController@getData');
    Route::post('/admin/LaporanIncident/insert', 'adminLaporanInsidenController@insert')->name('laporaninsert');
    Route::get('/admin/laporan-incident/show/{id}', 'adminLaporanInsidenController@detail')->name('laporandetail');
    Route::get('/admin/LaporanIncident/input/{id}', 'adminLaporanInsidenController@inputview')->name('laporaninputview');
    // Route::post('/admin/LaporanIncident/reportinsert/', 'adminLaporanInsidenController@input')->name('laporaninput');
    Route::post('/admin/LaporanIncident/print/', 'adminLaporanInsidenController@print')->name('laporanprint');

    Route::post('/admin/LaporanEmail/report/', 'adminLaporanEmailController@print')->name('laporanEmail');

    Route::post('/admin/LaporanSE/reportinsert/', 'adminLaporanSeController@print')->name('laporanSeInput');

    Route::post('/admin/LayananJamming/reportinsert/', 'adminLaporanJammingController@print')->name('laporanJammingInput');

    Route::get('/admin/register', 'registerController@index')->name('register');
    Route::post('/admin/register', 'registerController@postRegister')->name('register.user');
    Route::post('/admin/register/edit', 'registerController@editRegister')->name('editregister');
    Route::post('/admin/register/delete', 'registerController@deleteRegister')->name('deleteregister');
    Route::get('admin/register/getdata', 'registerController@getData');
    Route::get('admin/register/getdata2', 'registerController@getData2');
    Route::get('admin/register/getDataById/{id}', 'registerController@jsonGetById');

    Route::get('/admin/jabatan', 'adminJabatanController@index')->name('jabatan');
    Route::post('/admin/jabatan', 'adminJabatanController@post')->name('jabatan_post');
    Route::get('/admin/jabatan/getDataById/{id}', 'adminJabatanController@jsonGetById');
    Route::get('/admin/jabatan/getdata', 'adminJabatanController@getData');
    Route::post('/admin/jabatan/delete', 'adminJabatanController@delete')->name('jabatan_delete');
    Route::get('/admin/jabatan/sync', 'adminJabatanController@sync')->name('jabatan_sync');

    Route::get('/admin/golongan', 'adminGolonganController@index')->name('golongan');
    Route::post('/admin/golongan', 'adminGolonganController@post')->name('golongan_post');
    Route::get('/admin/golongan/getDataById/{id}', 'adminGolonganController@jsonGetById');
    Route::get('/admin/golongan/getdata', 'adminGolonganController@getData');
    Route::post('/admin/golongan/delete', 'adminGolonganController@delete')->name('golongan_delete');
    Route::get('/admin/golongan/sync', 'adminGolonganController@sync')->name('golongan_sync');

    Route::get('/admin/unit-kerja', 'adminUnitKerjaController@index')->name('unitKerja');
    Route::post('/admin/unit-kerja', 'adminUnitKerjaController@post')->name('unitKerja_post');
    Route::get('/admin/unit-kerja/getDataById/{id}', 'adminUnitKerjaController@jsonGetById');
    Route::get('/admin/unit-kerja/getdata', 'adminUnitKerjaController@getData');
    Route::post('/admin/unit-kerja/delete', 'adminUnitKerjaController@delete')->name('unitKerja_delete');
    Route::get('/admin/unit-kerja/sync', 'adminUnitKerjaController@sync')->name('unitKerja_sync');
});

Route::group(['middleware' => 'admin', 'prefix' => '/admin'], function () {
    Route::get('/sites', 'SiteController@index')->name('sites');
    Route::get('/site/config', 'SiteController@config')->name('site.config');
    Route::get('/site/addform', 'SiteController@addform')->name('site.addform');
    Route::get('/site/{id}/editform', 'SiteController@editform')->name('site.editform');
    Route::get('/site/delete', 'SiteController@delete')->name('site.delete');
    Route::post('/site/update', 'SiteController@update')->name('site.update');
    Route::get('/site/logs', 'SiteController@logs')->name('site.logs');

    // Telegram
    Route::get('/telegrams', 'TelegramController@index')->name('telegrams');
    Route::get('/telegram/addform', 'TelegramController@addform')->name('telegram.addform');
    Route::get('/telegram/{id}/editform', 'TelegramController@editform')->name('telegram.editform');
    Route::get('/telegram/delete', 'TelegramController@delete')->name('telegram.delete');
    Route::post('/telegram/update', 'TelegramController@update')->name('telegram.update');
    Route::get('/telegram/config-page', 'TelegramController@configPage')->name('telegram.config.page');
    Route::post('/telegram/config-update', 'TelegramController@configUpdate')->name('telegram.config.update');
});

Route::group(['middleware' => 'teknisi'], function () {
    Route::get('/teknisi', 'teknisiController@index')->name('teknisi');

    Route::get('/teknisi/incident-handling', 'teknisiInsidentHandlingController@index')->name('teknisi_incident_handling');
    Route::get('/teknisi/Incident-handling/getdata', 'teknisiInsidentHandlingController@getData')->name('teknisi_incident_data');
    Route::get('/teknisi/Incident-handling/detail/{id}', 'teknisiInsidentHandlingController@detail')->name('teknisi_incident_detail');
    Route::post('/teknisi/Incident-handling/finish', 'teknisiInsidentHandlingController@finish')->name('incidentfinish');
    Route::post('/teknisi/Incident-handling/proses', 'teknisiInsidentHandlingController@process')->name('incident_process');

    Route::get('/teknisi/incident-laporan/{id}', 'teknisiInsidentReportController@insert')->name('incident_insert_report');
    Route::post('/teknisi/incident-laporan/store/', 'teknisiInsidentReportController@store')->name('incident_store_report');
    Route::get('/teknisi/incident-laporan/view/{id}', 'teknisiInsidentReportController@show')->name('incident_show_report');
});
