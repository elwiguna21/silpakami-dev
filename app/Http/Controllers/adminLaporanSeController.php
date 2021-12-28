<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajuan_se;
use App\Perubahan_se;
use App\Pencabutan_se;
use App\Screenshoot;
use Sentinel;
use Carbon\Carbon;
use DB;
use Yajra\Datatables\Datatables;

class adminLaporanSeController extends Controller
{
    public function print(Request $request){
        // return $request->all();
        $jenis = $request->jenis;
        
        if ($jenis == "pembuatan") {
            if ($request->instansi == "semua") {
                    $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
                    $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
                    $ses = Pengajuan_se::select('users.nama', 'users.nip', 'instansis.nama_ins', 'jabatans.nama_jab',
                    'unit_kerjas.nama_unker', 'pengajuan_ses.created_at', DB::raw('DATE_FORMAT(pengajuan_ses.created_at,"%d-%m-%Y") AS date'),
                     DB::raw('DATE_FORMAT( DATE(DATE_ADD(pengajuan_ses.created_at, INTERVAL +2 YEAR)),"%d-%m-%Y")  AS kadaluarsa'))
                    ->join('users', 'users.id', '=', 'pengajuan_ses.user_id')
                    ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                    ->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
                    ->join('unit_kerjas', 'users.unit_kerja_id', '=', 'unit_kerjas.id')
                    ->whereDate('pengajuan_ses.created_at','>=', $tglmul)
                    ->whereDate('pengajuan_ses.created_at','<=', $tglakh)
                    ->orderBy('pengajuan_ses.created_at', 'desc')
                    ->get();
            
                    $se_count = $ses->count();
                    //return $incidents;
                    return view ('admin.laporanse_print', compact(['ses', 'tglmul', 'tglakh', 'se_count', 'jenis']));
            } else {
                $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
                    $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
                    $ses = Pengajuan_se::select('users.nama', 'users.nip', 'instansis.nama_ins', 'jabatans.nama_jab',
                    'unit_kerjas.nama_unker', 'pengajuan_ses.created_at', DB::raw('DATE_FORMAT(pengajuan_ses.created_at,"%d-%m-%Y") AS date'),
                     DB::raw('DATE_FORMAT( DATE(DATE_ADD(pengajuan_ses.created_at, INTERVAL +2 YEAR)),"%d-%m-%Y")  AS kadaluarsa'))
                    ->join('users', 'users.id', '=', 'pengajuan_ses.user_id')
                    ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                    ->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
                    ->join('unit_kerjas', 'users.unit_kerja_id', '=', 'unit_kerjas.id')
                    ->whereDate('pengajuan_ses.created_at','>=', $tglmul)
                    ->whereDate('pengajuan_ses.created_at','<=', $tglakh)
                    ->where('instansis.id', $request->instansi)
                    ->orderBy('pengajuan_ses.created_at', 'desc')
                    ->get();
            
                    $se_count = $ses->count();
                    //return $incidents;
                    return view ('admin.laporanse_print', compact(['ses', 'tglmul', 'tglakh', 'se_count', 'jenis']));
            } 
        }elseif($request->jenis == "perubahan"){
            if ($request->instansi == "semua") {
                $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
                $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
                $ses = Perubahan_se::select('users.nama', 'users.nip',  'instansis.nama_ins', 'perubahan_ses.created_at', DB::raw('DATE_FORMAT(perubahan_ses.created_at,"%d-%m-%Y") AS date'), 'perubahan_ses.jabatan_lama', 'perubahan_ses.jabatan_baru', 'perubahan_ses.instansi_lama', 'perubahan_ses.instansi_baru')
                ->join('users', 'users.id', '=', 'perubahan_ses.user_id')
                ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                ->whereDate('perubahan_ses.created_at','>=', $tglmul)
                ->whereDate('perubahan_ses.created_at','<=', $tglakh)
                ->orderBy('perubahan_ses.created_at', 'desc')
                ->get();
        
                $se_count = $ses->count();
                //return $incidents;
                return view ('admin.laporanse_print', compact(['ses', 'tglmul', 'tglakh', 'se_count', 'jenis']));
            } else {
                $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
                    $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
                    $ses = Perubahan_se::select('users.nama', 'users.nip', 'instansis.nama_ins', 'perubahan_ses.created_at', DB::raw('DATE_FORMAT(perubahan_ses.created_at,"%d-%m-%Y") AS date'), 'perubahan_ses.jabatan_lama', 'perubahan_ses.jabatan_baru', 'perubahan_ses.instansi_lama', 'perubahan_ses.instansi_baru')
                    ->join('users', 'users.id', '=', 'perubahan_ses.user_id')
                    ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                    ->whereDate('perubahan_ses.created_at','>=', $tglmul)
                    ->whereDate('perubahan_ses.created_at','<=', $tglakh)
                    ->where('instansis.id', $request->instansi)
                    ->orderBy('perubahan_ses.created_at', 'desc')
                    ->get();
            
                    $se_count = $ses->count();
                    //return $incidents;
                    return view ('admin.laporanse_print', compact(['ses', 'tglmul', 'tglakh', 'se_count', 'jenis']));
            } 
        }else {
            if ($request->instansi == "semua") {
                $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
                $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
                $ses = Pencabutan_se::select('users.nama', 'users.nip', 'instansis.nama_ins', 'jabatans.nama_jab',
                'unit_kerjas.nama_unker', 'pencabutan_ses.created_at', DB::raw('DATE_FORMAT(pencabutan_ses.created_at,"%d-%m-%Y") AS date'),
                    DB::raw('DATE_FORMAT( DATE(DATE_ADD(pencabutan_ses.created_at, INTERVAL +2 YEAR)),"%d-%m-%Y")  AS kadaluarsa'))
                ->join('users', 'users.id', '=', 'pencabutan_ses.user_id')
                ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                ->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
                ->join('unit_kerjas', 'users.unit_kerja_id', '=', 'unit_kerjas.id')
                ->whereDate('pencabutan_ses.created_at','>=', $tglmul)
                ->whereDate('pencabutan_ses.created_at','<=', $tglakh)
                ->orderBy('pencabutan_ses.created_at', 'desc')
                ->get();
        
                $se_count = $ses->count();
                //return $incidents;
                return view ('admin.laporanse_print', compact(['ses', 'tglmul', 'tglakh', 'se_count', 'jenis']));
            } else {
                $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
                    $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
                    $ses = Pencabutan_se::select('users.nama', 'users.nip', 'instansis.nama_ins', 'jabatans.nama_jab',
                    'unit_kerjas.nama_unker', 'pencabutan_ses.created_at', DB::raw('DATE_FORMAT(pencabutan_ses.created_at,"%d-%m-%Y") AS date'),
                     DB::raw('DATE_FORMAT( DATE(DATE_ADD(pencabutan_ses.created_at, INTERVAL +2 YEAR)),"%d-%m-%Y")  AS kadaluarsa'))
                    ->join('users', 'users.id', '=', 'pencabutan_ses.user_id')
                    ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                    ->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
                    ->join('unit_kerjas', 'users.unit_kerja_id', '=', 'unit_kerjas.id')
                    ->whereDate('pencabutan_ses.created_at','>=', $tglmul)
                    ->whereDate('pencabutan_ses.created_at','<=', $tglakh)
                    ->where('instansis.id', $request->instansi)
                    ->orderBy('pencabutan_ses.created_at', 'desc')
                    ->get();
            
                    $se_count = $ses->count();
                    //return $incidents;
                    return view ('admin.laporanse_print', compact(['ses', 'tglmul', 'tglakh', 'se_count', 'jenis']));
            } 
        }
     }
}
