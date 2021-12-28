<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perubahan_se;
use App\Instansi;
use Sentinel;
use Yajra\Datatables\Datatables;

class adminSertifikatPerubahanController extends Controller
{
    public function index () {
        $instansi = Instansi::pluck('nama_ins','id');
    	return view ('admin.sertifikatperubahan', compact('instansi'));
    }

    public function aprove (Request $request){
        $id = $request->idaprove;
        $unit = Perubahan_se::where('id', $id)->update([
            'stat'=>"2"
        ]);
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Pengajuan Telah Disetujui'));
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }

    public function denied(Request $request){
        $id = $request->iddenied;
        $unit = Perubahan_se::where('id', $id)->update([
            'stat'=>"4",
            'alasan_penolakan'=>$request->get('alasan_penolakan'),
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

    public function getData(){
        //$skpdid = Sentinel::getUser()->instansi_id;
        $users = Perubahan_se::join('users', 'users.id', '=', 'perubahan_ses.user_id')
        ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
        ->select(['path',
        'perubahan_ses.id',
        'stat',
        'nama_pemohon',
        'instansi_lama',
        'instansi_baru',
        'jabatan_lama',
        'jabatan_baru',
        'perubahan_ses.created_at',
        'users.nama',
        'instansis.nama_ins',
        'users.email','alasan_penolakan'
        ])->orderBy('created_at', 'DESC');

        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            if($user->stat == '1'){
                return '<a href="" data-bs-toggle="modal" data-bs-target="#aproved" id="baproved" class="btn btn-outline-success" data-id="'.$user->id.'" data-email="'.$user->email.'">aprove</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#denied" id="bdenied" class="btn btn-outline-danger" data-id="'.$user->id.'" data-email="'.$user->email.'">Denied</a>';
            }
            else if ($user->stat == 4){
                return "<a href='#' class='btn-reason' data-reason='$user->alasan_penolakan'>Lihat Alasan Penolakan</a>";
            }
            else {
                return '';
            }
        })
        ->editColumn('status', function($stat) {
            if($stat->stat == '1'){
                return '<span class="badge bg-primary">Baru</span>';
            }elseif($stat->stat == '2'){
                return '<span class="badge bg-success">Di Proses</span>';
            }elseif($stat->stat == '3'){
                return '<span class="badge bg-warning">Batal</span>';
            }else{
                return '<span class="badge bg-danger">Ditolak</span>';
            }
        })
        ->rawColumns(['id', 'status', 'action'])
        ->addIndexColumn()
        ->make(true);
    }
}
