<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use Sentinel;
use Yajra\Datatables\Datatables;

class emailController extends Controller
{
    public function index()
    {
        return view('user.email');
    }

    public function insertpengajuan(Request $request)
    {

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
                $image->move(public_path() . '/doc/email/', $name);
                $insert = new Email;
                $insert->user_id = $id;
                $insert->nama_pemohon = $request->nama_pemohon;
                $insert->nip = $request->nip;
                $insert->path = "/doc/email/" . $name;
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
        $users = Email::join('users', 'users.id', '=', 'emails.user_id')
            ->select([
                'path',
                'emails.id',
                'stat',
                'nama_pemohon',
                'emails.created_at',
                'users.nama',
                'alasan_penolakan'
            ])
            ->where('instansi_id', $skpdid)
            ->orderBy('created_at', 'DESC');

        return Datatables::of($users)
            ->editColumn('status', function ($stat) {
                if ($stat->stat == '1') {
                    return '<span class="badge bg-primary">Menunggu Persetujuan</span>';
                } elseif ($stat->stat == '2') {
                    return '<span class="badge bg-success">Menunggu di Proses</span>';
                } elseif ($stat->stat == '3') {
                    return '<span class="badge bg-warning">Dibatalkan</span>';
                } elseif ($stat->stat == '4') {
                    return '<span class="badge bg-danger">Tolak</span>';
                } else {
                    return '<span class="badge bg-info">Telah Terbit</span>';
                }
            })
            ->rawColumns(['id', 'status'])
            ->addIndexColumn()
            ->make(true);
    }
}
