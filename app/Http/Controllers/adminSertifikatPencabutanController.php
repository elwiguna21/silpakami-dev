<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pencabutan_se;
use App\Pengajuan_se;
use App\Instansi;
use Sentinel;
use Yajra\Datatables\Datatables;

class adminSertifikatPencabutanController extends Controller
{
    public function index()
    {
        $instansi = Instansi::pluck('nama_ins', 'id');
        return view('admin.sertifikatpencabutan', compact('instansi'));
    }

    public function aprove(Request $request)
    {
        $id = $request->idaprove;
        $unit = Pencabutan_se::where('id', $id)->update([
            'stat' => "2"
        ]);

        $pencabutan_ses = Pencabutan_se::where('id', $id)->first();
        if ($pencabutan_ses) {
            $pengajuan_ses = Pengajuan_se::where('nip', $pencabutan_ses->nip)->first();
            if ($pengajuan_ses != null) {
                if ($pengajuan_ses->stat == '5') {
                    Pengajuan_se::where('nip', $pencabutan_ses->nip)->update([
                        'stat' => '6'
                    ]);
                }
            }
        }

        try {
            return redirect()
                ->back()
                ->withSuccess(sprintf('Pengajuan Telah Disetujui'));
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }

    public function denied(Request $request)
    {
        $id = $request->iddenied;
        $unit = Pencabutan_se::where('id', $id)->update([
            'stat' => "4",
            'alasan_penolakan' => $request->get('alasan_penolakan')
        ]);
        try {
            return redirect()
                ->back()
                ->withSuccess(sprintf('Pengajuan Telah Ditolak'));
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }

    public function getData()
    {
        //$skpdid = Sentinel::getUser()->instansi_id;
        $users = Pencabutan_se::join('users', 'users.id', '=', 'pencabutan_ses.user_id')
            ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
            ->select([
                'path',
                'pencabutan_ses.id',
                'stat',
                'nama_pemohon',
                'pencabutan_ses.created_at',
                'users.nama',
                'instansis.nama_ins',
                'users.email', 'alasan_penolakan'
            ])->orderBy('created_at', 'DESC');

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                if ($user->stat == '1') {
                    return '<a href="" data-bs-toggle="modal" data-bs-target="#aproved" id="baproved" class="btn btn-outline-success" data-id="' . $user->id . '" data-email="' . $user->email . '">aprove</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#denied" id="bdenied" class="btn btn-outline-danger" data-id="' . $user->id . '" data-email="' . $user->email . '">Denied</a>';
                } else if ($user->stat == 4) {
                    return "<a href='#' class='btn-reason' data-reason='$user->alasan_penolakan'>Lihat Alasan Penolakan</a>";
                } else {
                    return '';
                }
            })
            ->editColumn('status', function ($stat) {
                if ($stat->stat == '1') {
                    return '<span class="badge bg-primary">Baru</span>';
                } elseif ($stat->stat == '2') {
                    return '<span class="badge bg-success">Di Setujui</span>';
                } elseif ($stat->stat == '3') {
                    return '<span class="badge bg-warning">Batal</span>';
                } else {
                    return '<span class="badge bg-danger">Tolak</span>';
                }
            })
            ->rawColumns(['id', 'status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }
}
