<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Instansi;
use App\Screenshoot;
use Sentinel;
use Carbon\Carbon;
use DB;
use Yajra\Datatables\Datatables;

class adminLaporanInsidenController extends Controller
{
    public function index () {
        $instansi = Instansi::pluck('nama_ins','id'); 
    	return view ('admin.laporan', compact('instansi')); 
    }
    
    public function aprove (Request $request){
        $id = $request->idaprove;                 
        $unit = Incident::where('id', $id)->update([
            'stat'=>"2"
        ]);
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Pengajuan Anda Telah Di Ijinkan')); 
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        } 
    }

    public function denied(Request $request){
        $id = $request->iddenied;                 
        $unit = Incident::where('id', $id)->update([
            'stat'=>"5"
        ]);
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Pengajuan Anda Telah Ditolak')); 
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        } 
    }

    public function finish(Request $request){
        $id = $request->idfinish;                 
        $unit = Incident::where('id', $id)->update([
            'stat'=>"3"
        ]);
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Pengajuan Anda Telah Ditolak')); 
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        } 
    }

    public function detail($id){
        $incident = Incident::join('users', 'users.id', '=', 'incidents.user_id')
                ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                ->where('incidents.id', $id)
                ->first();
        $images = Screenshoot::where('incident_id', $id)->get();
        return view ('admin.laporan_detail', compact(['incident', 'images', 'id']));
    }

    public function inputview($id){
        $incident = Incident::join('users', 'users.id', '=', 'incidents.user_id')
                ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                ->where('incidents.id', $id)
                ->first();
        $images = Screenshoot::where('incident_id', $id)->get();
        return view ('admin.laporan_input', compact(['incident', 'images', 'id']));
    }

    public function print(Request $request){
       // return $request->all();
       if ($request->instansi == "semua") {
            $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
            $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
            $incidents = Incident::select('users.nama', 'instansis.nama_ins', 'incidents.created_at', 'handler.nama AS hand', 'incidents.ket_pelapor')
            ->join('users', 'users.id', '=', 'incidents.user_id')
            ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
            ->join(DB::raw('users AS handler'), DB::raw('handler.id'), '=', 'incidents.handler_id')
            ->whereDate('incidents.created_at','>=', $tglmul)
            ->whereDate('incidents.created_at','<=', $tglakh)
            ->orderBy('incidents.created_at', 'desc')
            ->get();

            $incident_count = $incidents->count();
            //return $incidents;
            return view ('admin.laporan_print', compact(['incidents', 'tglmul', 'tglakh', 'incident_count']));
       }else{
            $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
            $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
            $incidents = Incident::select('users.nama', 'instansis.nama_ins', 'incidents.created_at', 'handler.nama AS hand', 'incidents.ket_pelapor')
            ->join('users', 'users.id', '=', 'incidents.user_id')
            ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
            ->join(DB::raw('users AS handler'), DB::raw('handler.id'), '=', 'incidents.handler_id')
            ->whereDate('incidents.created_at','>=', $tglmul)
            ->whereDate('incidents.created_at','<=', $tglakh)
            ->where('instansis.id', $request->instansi)
            ->orderBy('incidents.created_at', 'desc')
            ->get();

            $incident_count = $incidents->count();
            //return $incidents;
            return view ('admin.laporan_print', compact(['incidents', 'tglmul', 'tglakh', 'incident_count']));
       }
        
    }

    public function input(Request $request){
        $now = Carbon::parse($request->tgl_ditangani)->format('Y-m-d');
        //return $now;
        $id = $request->idlaporan; 
        $handler_id = Sentinel::getUser()->id; 
        ///return $handler_id;              
        $lap = Incident::where('id', $id)->update([
            'stat'=>"6",
            'handler_id'=>$handler_id,
            'jenis_insiden'=>$request->jenis_insiden,
            'cakupan_insiden'=>$request->cakupan_insiden,
            'jumlah_sistem'=>$request->jumlah_sistem,
            'jumlah_pengguna'=>$request->jumlah_pengguna,
            'pihak_ketiga'=>$request->pihak_ketiga,
            'dampak_insiden'=>$request->dampak_insiden,
            'sensitivita_informasi'=>$request->sensitivita_informasi,
            'data_enkripsi'=>$request->data_enkripsi,
            'besar_data'=>$request->besar_data,
            'sumber_serangan'=>$request->sumber_serangan,
            'tujuan_serangan'=>$request->tujuan_serangan,
            'ip_sistem'=>$request->ip_sistem,
            'domain_sistem'=>$request->domain_sistem,
            'fungsi'=>$request->fungsi,
            'so'=>$request->so,
            'patching_level'=>$request->patching_level,
            'security_sistem'=>$request->security_sistem,
            'lokasi'=>$request->lokasi,
            'level_hak_akses'=>$request->level_hak_akses,
            'tindakan_identifikasi'=>$request->tindakan_identifikasi,
            'tindakan_pemulihan'=>$request->tindakan_pemulihan,
            'tindakan_pencegahan'=>$request->tindakan_pencegahan,
            'tgl_ditangani'=>$now
        ]);
        try{
            $lap = Incident::where('id', $id)->update([
                'stat'=>"6",
                'handler_id'=>$handler_id,
                'jenis_insiden'=>$request->jenis_insiden,
                'cakupan_insiden'=>$request->cakupan_insiden,
                'jumlah_sistem'=>$request->jumlah_sistem,
                'jumlah_pengguna'=>$request->jumlah_pengguna,
                'pihak_ketiga'=>$request->pihak_ketiga,
                'dampak_insiden'=>$request->dampak_insiden,
                'sensitivita_informasi'=>$request->sensitivita_informasi,
                'data_enkripsi'=>$request->data_enkripsi,
                'besar_data'=>$request->besar_data,
                'sumber_serangan'=>$request->sumber_serangan,
                'tujuan_serangan'=>$request->tujuan_serangan,
                'ip_sistem'=>$request->ip_sistem,
                'domain_sistem'=>$request->domain_sistem,
                'fungsi'=>$request->fungsi,
                'so'=>$request->so,
                'patching_level'=>$request->patching_level,
                'security_sistem'=>$request->security_sistem,
                'lokasi'=>$request->lokasi,
                'level_hak_akses'=>$request->level_hak_akses,
                'tindakan_identifikasi'=>$request->tindakan_identifikasi,
                'tindakan_pemulihan'=>$request->tindakan_pemulihan,
                'tindakan_pencegahan'=>$request->tindakan_pencegahan,
                'tgl_ditangani'=>$now
            ]);

            return redirect('admin/LaporanIncident')
            ->withSuccess(sprintf('Laporan Berhasil Dibuat')); 
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        } 
       
    }

    public function getData(){
        //$skpdid = Sentinel::getUser()->instansi_id;
        $users = Incident::join('users', 'users.id', '=', 'incidents.user_id')
        ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
        ->select(['incidents.id',
        'stat',
        'incidents.created_at',
        'incidents.ket_pelapor',
        'users.nama',
        'instansis.nama_ins',
        'users.email'
        ])->wherein('stat', ['3', '6']);
        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            if ($user->stat == "3") {
                return '<a href="/admin/LaporanIncident/input/'.$user->id.'" class="btn btn-round btn-info btn-xs">Input Laporan</a>';
            } elseif($user->stat == "6") {
                return '<a href="/admin/LaporanIncident/detail/'.$user->id.'" class="btn btn-round btn-primary btn-xs">Lihat Laporan</a>';
            }
            
                           
        })
        ->editColumn('status', function($stat) {
            if($stat->stat == '1'){
                return '<span class="label label-primary">New</span>';
            }elseif($stat->stat == '2'){
                return '<span class="label label-success">proceed</span>';
            }elseif($stat->stat == '3' or $stat->stat == '6'){
                return '<span class="label label-warning">Finish</span>';
            }elseif($stat->stat == '4'){
                return '<span class="label label-warning">Canceled</span>';
            }else{
                return '<span class="label label-danger">Denied</span>';
            }
        })
        ->rawColumns(['id', 'status', 'action'])
        ->addIndexColumn()
        ->make(true);          
    }
}
