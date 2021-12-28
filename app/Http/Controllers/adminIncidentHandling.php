<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Screenshoot;
use Sentinel;
use App\Instansi;
use Yajra\Datatables\Datatables;

class adminIncidentHandling extends Controller
{
    public function index () {
        $instansi = Instansi::pluck('nama_ins','id'); 

    	return view ('admin.incident', compact('instansi')); 
    }
    
    public function aprove ($flag, $id){                  
        try{
            if ($flag == 'aplikasi'){
                $unit = Incident::where('id', $id)->update([
                    'stat'=>"2",
                    'stat_lapor' => '1'
                ]);
            }else{
                $satLapor = Incident::where('id', $id)->update([
                    'stat'=>"2",
                    'stat_lapor' => '0'
                ]);
            }
            return redirect('/admin/IncidentHandling')
            ->withSuccess(sprintf('Pengajuan Telah Diteruskan')); 
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
            ->withSuccess(sprintf('Pengajuan Telah Ditolak')); 
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
            ->withSuccess(sprintf('Pengajuan Telah Selesai')); 
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
        return view ('admin.incident_detail', compact(['incident', 'images', 'id']));
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
        ])
        ->orderBy('created_at', 'DESC');
        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            if($user->stat == '1'){return
                '<a href="/admin/IncidentHandling/detail/'.$user->id.'" class="btn btn-outline-info">Detail</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#denied" id="bdenied" class="btn btn-outline-danger" data-id="'.$user->id.'" data-email="'.$user->email.'">Tolak</a>';
            }elseif($user->stat == '2'){
                return 
                '<a href="/admin/IncidentHandling/detail/'.$user->id.'" class="btn btn-outline-info">Detail</a>';
            }elseif($user->stat == '3'){
                return 
                '<a href="/admin/laporan-incident/show/'.$user->id.'" class="btn btn-outline-info">Lihat Laporan</a>';
            }else {
                return '
                <a href="/admin/IncidentHandling/detail/'.$user->id.'" class="btn btn-outline-info">Detail</a>';
            }
        })
        ->editColumn('status', function($stat) {
            if($stat->stat == '1'){
                return '<span class="badge bg-primary">Baru</span>';
            }elseif($stat->stat == '2'){
                return '<span class="badge bg-secondary">Diteruskan ke Teknisi</span>';
            }elseif($stat->stat == '3'){
                return '<span class="badge bg-success">Selesai</span>';
            }elseif($stat->stat == '4'){
                return '<span class="badge bg-warning">Dibatalkan</span>';
            }elseif($stat->stat == '6'){
                return '<span class="badge bg-dark">Diproses Teknisi</span>';
            }else{
                return '<span class="badge bg-danger">Ditolak</span>';
            }
        })
        ->rawColumns(['id', 'status', 'action'])
        ->addIndexColumn()
        ->make(true);          
    }
}
