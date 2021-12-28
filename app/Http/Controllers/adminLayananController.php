<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamming;
use App\Instansi;
use Sentinel;
use Yajra\Datatables\Datatables;

class adminLayananController extends Controller
{
    public function index () {
        $instansi = Instansi::pluck('nama_ins','id');
    	return view ('admin.layanan', compact('instansi'));
    }

    public function aprove (Request $request){
        $id = $request->idaprove;
        $unit = Jamming::where('id', $id)->update([
            'stat'=>"2"
        ]);
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Pengajuan Layanan Telah Disetujui'));
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }

    public function denied(Request $request){
        $id = $request->iddenied;
        $unit = Jamming::where('id', $id)->update([
            'stat'=>"4",
            'alasan_penolakan'=>$request->get('alasan_penolakan'),
        ]);
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Pengajuan Layanan Telah Ditolak'));
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }

    public function getData(){
        //$skpdid = Sentinel::getUser()->instansi_id;
        $users = Jamming::join('users', 'users.id', '=', 'jammings.user_id')
        ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
        ->select(['path',
        'jammings.id',
        'stat',
        'tgl_mulai',
        'tgl_akhir',
        'lokasi_ruangan',
        'luas_ruangan',
        'kegiatan',
        'jammings.created_at',
        'users.nama',
        'instansis.nama_ins',
        'users.email','alasan_penolakan'
        ])
        ->orderBy('created_at', 'DESC');

        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            if($user->stat == '1'){
                return '<a href="" data-bs-toggle="modal" data-bs-target="#detail" id="bdetail" class="btn btn-outline-info"
                data-id="'.$user->id.'"
                data-nama="'.$user->nama.'"
                data-instansi="'.$user->nama_ins.'"
                data-path="'.$user->path.'"
                data-tgl_mulai="'.$user->tgl_mulai.'"
                data-tgl_akhir="'.$user->tgl_akhir.'"
                data-lokasi_ruangan="'.$user->lokasi_ruangan.'"
                data-luas_ruangan="'.$user->luas_ruangan.'"
                data-kegiatan="'.$user->kegiatan.'"
                data-alasan_penolakan="'.$user->alasan_penolakan.'"
                data-email="'.$user->email.'">Detail</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#aproved" id="baproved" class="btn btn-outline-success" data-id="'.$user->id.'" data-email="'.$user->email.'">Aprove</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#denied" id="bdenied" class="btn btn-outline-danger" data-id="'.$user->id.'" data-email="'.$user->email.'">Denied</a>';
            }else {
                return '<a href="" data-bs-toggle="modal" data-bs-target="#detail" id="bdetail" class="btn btn-outline-info"
                data-id="'.$user->id.'"
                data-nama="'.$user->nama.'"
                data-instansi="'.$user->nama_ins.'"
                data-path="'.$user->path.'"
                data-tgl_mulai="'.$user->tgl_mulai.'"
                data-tgl_akhir="'.$user->tgl_akhir.'"
                data-lokasi_ruangan="'.$user->lokasi_ruangan.'"
                data-luas_ruangan="'.$user->luas_ruangan.'"
                data-kegiatan="'.$user->kegiatan.'"
                data-alasan_penolakan="'.$user->alasan_penolakan.'"
                data-email="'.$user->email.'">Detail</a>';
            }
        })
        ->editColumn('status', function($stat) {
            if($stat->stat == '1'){
                return '<span class="badge bg-primary">Baru</span>';
            }elseif($stat->stat == '2'){
                return '<span class="badge bg-success">Disetujui</span>';
            }elseif($stat->stat == '3'){
                return '<span class="badge bg-warning">Batal</span>';
            }elseif($stat->stat == '4'){
                return '<span class="badge bg-danger">Ditolak</span>';
            }
        })
        ->rawColumns(['id', 'status', 'action'])
        ->addIndexColumn()
        ->make(true);
    }
}

