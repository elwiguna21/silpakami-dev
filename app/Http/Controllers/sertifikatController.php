<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajuan_se;
use Sentinel;
use Yajra\Datatables\Datatables;

class sertifikatController extends Controller
{
    public function index()
    {
        return view('user.sertifikat');
    }

    public function insertpengajuan(Request $request)
    {
        // return $request->all();
        $validator = $this->validate($request, [
            'nama_pemohon' => 'required',
            'nip' => 'required',
            'files.*' => 'required|mimes:pdf' //,
            //'ktp.*' => 'required|mimes:jpg,jpeg,png',
        ]);

        $id = Sentinel::getUser()->id;

        try {
            if ($request->hasfile('files')) {
                // if ($request->hasfile('ktp')) {
                //     $imagektp = $request->file('ktp');
                //     $namektp = md5(time() . rand()) . '.' . $imagektp->extension();
                //     $imagektp->move(public_path() . '/doc/ktp/', $namektp);
                // }
                $image = $request->file('files');
                $name = md5(time() . rand()) . '.' . $image->extension();
                $image->move(public_path() . '/doc/pendaftaran/', $name);
                $insert = new Pengajuan_se;
                $insert->user_id = $id;
                $insert->nama_pemohon = $request->nama_pemohon;
                $insert->nip = $request->nip;
                $insert->path = "/doc/pendaftaran/" . $name;
                // $insert->ktp_path = "/doc/ktp/" . $namektp;
                $insert->stat = "1";

                $insert->save();
                return redirect()
                    ->back()
                    ->withSuccess(sprintf('Terimakasih %s pengajuan berhasil terkirim, kami akan segera menghubungi anda', $request->nama));
            }
            return redirect()
                ->back()
                ->with(['error' => "Pengajuan Gagal."]);
            // }
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Pengajuan Gagal."]);
        }
    }

    public function getDataPengajaun()
    {
        $skpdid = Sentinel::getUser()->instansi_id;
        $users = Pengajuan_se::join('users', 'users.id', '=', 'pengajuan_ses.user_id')
            ->select([
                'path',
                'pengajuan_ses.id',
                'stat',
                'nama_pemohon',
                'pengajuan_ses.created_at',
                'users.nama',
                'alasan_penolakan'
            ])
            ->where('instansi_id', $skpdid)
            ->orderBy('created_at', 'DESC');

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                // Remark by Hendri 11/11/2021
                // if ($user->stat == '1') {
                //     return '<a href="" data-toggle="modal" data-target="#input" id="brea" class="btn btn-warning" data-id="' . $user->id . '">Input Realisasi</a>';
                // } else {
                //     return '<a href="/admin/realisasi/det/' . $user->id . '" id="breadetail" class="btn btn-danger" >Edit Realisasi</a>';
                // } End Remark
                if ($user->stat == '2') {
                    return '<a href="" data-bs-toggle="modal" data-bs-target="#published" id="bpublished" class="btn btn-outline-success" data-id="' . $user->id . '" data-email="' . $user->email . '">publish</a>';
                } else {
                    return '';
                }
            })
            ->editColumn('status', function ($stat) {
                if ($stat->stat == '1') {
                    return '<span class="badge bg-primary">Menunggu Persetujuan</span>';
                } elseif ($stat->stat == '2') {
                    return '<span class="badge bg-success">Disetujui</span>';
                } elseif ($stat->stat == '3') {
                    return '<span class="badge bg-warning">Dibatalkan</span>';
                } elseif ($stat->stat == '4') {
                    return '<span class="badge bg-danger">Tolak</span>';
                } else {
                    return '<span class="badge bg-info">Telah Terbit</span>';
                }
            })
            ->rawColumns(['id', 'status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function published(Request $request)
    {
        $id = $request->idpublished;
        $unit = Pengajuan_se::where('id', $id)->update([
            'stat' => "5",
        ]);
        try {
            return redirect()
                ->back()
                ->withSuccess(sprintf('Pengajuan Telah Terbit!'));
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }
}
