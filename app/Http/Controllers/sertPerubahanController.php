<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perubahan_se;
use Sentinel;
use Yajra\Datatables\Datatables;

class sertPerubahanController extends Controller
{
    public function index () {
    	return view ('user.sertifikatperubahan');
    }

    public function insert(Request $request){
        $validator = $this->validate($request,[
            'files.*' => 'required|mimes:pdf',
            'nama_pemohon' => 'required',
         ]);
        $id = Sentinel::getUser()->id;

        try{
            if($request->hasfile('files'))
            {
                // dd($request->file('files'));
                $image = $request->file('files');
                $name=md5(time() . rand()) .'.'. $image->extension();
                $image->move(public_path().'/doc/perubahan/', $name);

                $insert = new Perubahan_se;
                $insert->user_id = $id;
                // $insert->instansi_lama = $request->dinasbaru;
                $insert->instansi_lama = $request->dinaslama;
                $insert->nama_pemohon = $request->nama_pemohon;
                $insert->nip = $request->nip;
                // $insert->instansi_baru = $request->dinaslama;
                $insert->instansi_baru = $request->dinasbaru;
                $insert->jabatan_lama = $request->jablama;
                $insert->jabatan_baru = $request->jabbaru;
                $insert->path = "/doc/perubahan/".$name;
                $insert->stat="1";

                $insert->save();
                return redirect()
                ->back()
                ->withSuccess(sprintf('Terimakasih %s pengajuan berhasil terkirim, kami akan segera menghubungi anda', $request->nama));
            }
            return redirect()->back()->with(['error' => "Gagal."]);

        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }

    public function getData(){
        $skpdid = Sentinel::getUser()->instansi_id;
        $users = Perubahan_se::join('users', 'users.id', '=', 'perubahan_ses.user_id')
        ->select(['path',
        'perubahan_ses.id',
        'stat',
        'instansi_lama',
        'nama_pemohon',
        'instansi_baru',
        'jabatan_lama',
        'jabatan_baru',
        'perubahan_ses.created_at',
        'users.nama','alasan_penolakan'
        ])
        ->where('instansi_id', $skpdid)
        ->orderBy('created_at', 'DESC');

        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            if($user->stat == '1'){
                return '<a href="" data-bs-toggle="modal" data-bs-target="#input" id="brea" class="btn btn-warning" data-id="'.$user->id.'">Input Realisasi</a>';
            }else {
                return '<a href="/admin/realisasi/det/'.$user->id.'" id="breadetail" class="btn btn-danger" >Edit Realisasi</a>';
            }
        })
        ->editColumn('status', function($stat) {
            if($stat->stat == '1'){
                return '<span class="badge bg-primary">Menunggu Persetujuan</span>';
            }elseif($stat->stat == '2'){
                return '<span class="badge bg-success">Disetujui</span>';
            }elseif($stat->stat == '3'){
                return '<span class="badge bg-warning">Dibatalkan</span>';
            }else{
                return '<span class="badge bg-danger">Ditolak</span>';
            }
        })
        ->rawColumns(['id', 'status', 'action'])
        ->addIndexColumn()
        ->make(true);
    }
}
