<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Screenshoot;
use Sentinel;
use Yajra\Datatables\Datatables;

class teknisiInsidentHandlingController extends Controller
{
    public function index () {
        $teknisi = $this->getTeknisi();
    	return view ('teknisi.incident', compact('teknisi')); 
    }

    public function getData(){
        $role = Sentinel::getUser()->roles()->first()->slug;

        if($role == 'teknisi_jaringan'){
            $teknisiRole = '0';
        }else{
            $teknisiRole = '1';
        }
        $users = Incident::join('users', 'users.id', '=', 'incidents.user_id')
        ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
        ->where('incidents.stat_lapor', $teknisiRole)
        ->where(function($q) {
            $q->where('incidents.stat', '2')
            ->orWhere('incidents.stat', '3')
            ->orWhere('incidents.stat', '6');
        })
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
            if($user->stat == '2'){
                return 
                '<a href="/teknisi/Incident-handling/detail/'.$user->id.'" class="btn btn-outline-info">Detail</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#process" id="bprocess" class="btn btn-outline-warning" data-id="'.$user->id.'" data-email="'.$user->email.'">Proses</a>';
            }elseif($user->stat == '6'){
                return 
                '<a href="/teknisi/Incident-handling/detail/'.$user->id.'" class="btn btn-outline-info">Detail</a>
                <a href="/teknisi/incident-laporan/'.$user->id.'" class="btn btn-outline-warning">Selesai</a>';
            }elseif($user->stat == '3'){
                return '<a href="/teknisi/incident-laporan/view/'.$user->id.'" class="btn btn-outline-info">Lihat Laporan</a>';
            }
           
        })
        ->editColumn('status', function($stat) {
            if($stat->stat == '2'){
                return '<span class="badge bg-primary">Baru</span>';
            }elseif($stat->stat == '3'){
                return '<span class="badge bg-success">Selesai</span>';
            }elseif($stat->stat == '6'){
                return '<span class="badge bg-warning">Proses</span>';
            }
        })
        ->rawColumns(['id', 'status', 'action'])
        ->addIndexColumn()
        ->make(true);          
    }

    public function detail($id){
        $incident = Incident::join('users', 'users.id', '=', 'incidents.user_id')
                ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                ->where('incidents.id', $id)
                ->first();
        $images = Screenshoot::where('incident_id', $id)->get();
        $teknisi = $this->getTeknisi();
        return view ('teknisi.incident_detail', compact(['teknisi','incident', 'images', 'id']));
    }

    public function process (Request $request){
        $id = $request->id_process;                 
        $unit = Incident::where('id', $id)->update([
            'stat'=>"6"
        ]);
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Pengajuan Incident Sedang di Proses')); 
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
            ->withSuccess(sprintf('Pengajuan Selesai')); 
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        } 
    }

    public function getTeknisi(){
        $slug = Sentinel::getUser()->roles()->first()->slug; // mencari role user
        if ($slug == 'teknisi_aplikasi') {
           $teknisi = 'TEKNISI APLIKASI';
        } else {
            $teknisi = 'TEKNISI JARINGAN';
        }
        return $teknisi;
    }
}
