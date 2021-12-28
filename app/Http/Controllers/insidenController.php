<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Screenshoot;
use Sentinel;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class insidenController extends Controller
{
    public function index () {
    	return view ('user.incident'); 
    }

    public function insert(Request $request){
        $validator = $this->validate($request,[
            'files.*' => 'required|mimes:jpg,jpeg,png',
         ]);
        //return $request->all();
        $id = Sentinel::getUser()->id;

        // $date = $request->tgl; 
        // $tgl_insiden = Carbon::createFromFormat('m/d/Y g:i A', $date, 'UTC')->toDateTimeString();
         $tgl_insiden = Carbon::now()->toDateTimeString(); 

        if($request->hasfile('files'))
        {
            $insert = new Incident;
            $insert->user_id = $id;
            $insert->stat="1";
            $insert->tgl_insiden=$tgl_insiden;
            $insert->ket_pelapor=$request->keterangan;
            $insert->save();

           foreach($request->file('files') as $image)
           {
               $name = md5(time() . rand()) .'.'. $image->extension(); 
               $image->move(public_path().'/doc/incident/', $name);  
               
               $ss = new Screenshoot;
               $ss->incident_id = $insert->id;
               $ss->path = "/doc/incident/".$name;

               $ss->save();               
           }
        }
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Terimakasih %s pelaporan berhasil terkirim, kami akan segera menghubungi anda', $request->nama)); 
        }
        catch(QueryException $e){
            return redirect()->back()->withErrors(['error' => "Gagal."]);
        } 
    }

    public function getData(){
        $skpdid = Sentinel::getUser()->instansi_id;
        $users = Incident::join('users', 'users.id', '=', 'incidents.user_id')
        ->select([
        'incidents.id',
        'stat',
        'incidents.created_at',
        'users.nama'
        ])
        ->where('instansi_id', $skpdid)
        ->orderBy('created_at', 'DESC');
        
        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            if($user->stat == '1'){
                return '<a href="" data-bs-toggle="modal" data-bs-target="#cancle" id="bcancel" class="btn btn-outline btn-danger" data-id="'.$user->id.'">Batal</a>';
            }else {
                return '';
            }
        })
        ->editColumn('status', function($stat) {
            if($stat->stat == '1'){
                return '<span class="badge bg-primary">Menunggu</span>';
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

    public function cancel(Request $request){
        $id = $request->idcancel;                 
        $unit = Incident::where('id', $id)->update([
            'stat'=>"4"
        ]);
        try{
            return redirect()
            ->back()
            ->withSuccess(sprintf('Laporan Anda Telah Dibatalkan')); 
        }
        catch(QueryException $e){
            return redirect()->back()->with(['error' => "Gagal."]);
        } 
    }
}
