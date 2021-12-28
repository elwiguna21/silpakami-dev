<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pencabutan_se;
use Sentinel;
use Yajra\Datatables\Datatables;

class sertPencabutanController extends Controller
{
    public function index () {
    	return view ('user.sertifikatpencabutan');
    }

    public function insert(Request $request){
        $validator = $this->validate($request,[
            'nama_pemohon' => 'required',
            'files.*' => 'required|mimes:pdf',
         ]);
        $id = Sentinel::getUser()->id;

        try{
            if($request->hasfile('files'))
            {

                $image =$request->file('files');
                $name = md5(time() . rand()) .'.'. $image->extension();
                $image->move(public_path().'/doc/pencabutan/', $name);
                $insert = new Pencabutan_se;
                $insert->user_id = $id;
                $insert->nama_pemohon = $request->nama_pemohon;
                $insert->nip = $request->nip;
                $insert->path = "/doc/pencabutan/".$name;
                $insert->stat="1";

                $insert->save();
            }
            return redirect()
            ->back()
            ->withSuccess(sprintf('Terimakasih %s pengajuan berhasil terkirim, kami akan segera menghubungi anda', $request->nama));
        }
        catch(QueryException $e){
            return redirect()->back()->withErrors(['error' => "Gagal."]);
        }
    }

    public function getData(){
        $skpdid = Sentinel::getUser()->instansi_id;
        $users = Pencabutan_se::join('users', 'users.id', '=', 'pencabutan_ses.user_id')
        ->select(['path',
        'pencabutan_ses.id',
        'stat',
        'nama_pemohon',
        'pencabutan_ses.created_at',
        'users.nama','alasan_penolakan'
        ])
        ->where('instansi_id', $skpdid)
        ->orderBy('created_at', 'DESC');

        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            // Remark by Hendri 27/12/2021
            // if($user->stat == '1'){
            //     return '<a href="" data-bs-toggle="modal" data-bs-target="#input" id="brea" class="btn btn-warning" data-id="'.$user->id.'">Input Realisasi</a>';
            // }else {
            //     return '<a href="/admin/realisasi/det/'.$user->id.'" id="breadetail" class="btn btn-danger" >Edit Realisasi</a>';
            // }
            if ($user->stat == '2') {
                return '<a href="" data-bs-toggle="modal" data-bs-target="#published" id="bpublished" class="btn btn-outline-success" data-id="' . $user->id . '" data-email="' . $user->email . '">selesai</a>';
            } else {
                return '';
            }
        })
        ->editColumn('status', function($stat) {
            if($stat->stat == '1'){
                return '<span class="badge bg-primary">Menunggu Persetujuan</span>';
            }elseif($stat->stat == '2'){
                return '<span class="badge bg-success">Disetujui</span>';
            }elseif($stat->stat == '3'){
                return '<span class="badge bg-warning">dibatalkan</span>';
            }elseif ($stat->stat == '4') {
                return '<span class="badge bg-danger">Tolak</span>';
            } else {
                return '<span class="badge bg-info">Telah Dicabut</span>';
            }
        })
        ->rawColumns(['id', 'status', 'action'])
        ->addIndexColumn()
        ->make(true);
        
    }

    public function published(Request $request)
    {
        $id = $request->idpublished;
        Pencabutan_se::where('id', $id)->update([
            'stat' => "5",
        ]);
        try {
            return redirect()
                ->back()
                ->withSuccess(sprintf('Pencabutan Telah Selesai!'));
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }
}
