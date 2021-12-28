<?php

namespace App\Http\Controllers;

use App\Unit_kerja;
use App\User;
use Illuminate\Http\Request;
use App\Pengajuan_se;
use App\Instansi;
use Sentinel;
use Yajra\Datatables\Datatables;
use function foo\func;

class adminSertifikatController extends Controller
{
    public function index()
    {
        $instansi = Instansi::pluck('nama_ins', 'id');
        return view('admin.sertifikat', compact('instansi'));
    }

    public function aprove(Request $request)
    {
        $id = $request->idaprove;
        $unit = Pengajuan_se::where('id', $id)->update([
            'stat' => "2"
        ]);
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
        $unit = Pengajuan_se::where('id', $id)->update([
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
        $pengajuan = Pengajuan_se::where('stat', '<', '5')->get();
        $pengajuan->map(function ($row) {
            $user = User::where('id', $row->user_id)->first();
            $instansi = Instansi::where('id', $user->instansi_id)->first();
            $unit_kerja = Unit_kerja::where('id', $user->unit_kerja_id)->first();
            $row->nama_ins = $instansi->nama_ins ?? '-';
            $row->unit_kerja = $unit_kerja->nama_unker;
        });

        return Datatables::of($pengajuan)

            ->addColumn('action', function ($user) {
                if ($user->stat == '1') {
                    return '<a href="" data-bs-toggle="modal" data-bs-target="#aproved" id="baproved" class="btn btn-outline-success" data-id="' . $user->id . '" data-email="' . $user->email . '">aprove</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#denied" id="bdenied" class="btn btn-outline-danger" data-id="' . $user->id . '" data-email="' . $user->email . '">Denied</a>';
                } else if ($user->stat == 4) {
                    return "<a href='#' class='btn-reason' data-reason='$user->alasan_penolakan'>Lihat Alasan Penolakan</a>";
                }
                // else if ($user->stat == 2){
                //     return '<a href="" data-toggle="modal" data-target="#published" id="bpublished" class="btn btn-round btn-success btn-xs" data-id="'.$user->id.'" data-email="'.$user->email.'">publish</a>';
                // }
                else {
                    return '';
                }
            })
            ->addColumn('unit_kerja', function ($user) {
                return $user->unit_kerja;
            })
            ->editColumn('status', function ($stat) {
                if ($stat->stat == '1') {
                    return '<span class="badge bg-primary">Baru</span>';
                } elseif ($stat->stat == '2') {
                    return '<span class="badge bg-success">Di Setujui</span>';
                } elseif ($stat->stat == '3') {
                    return '<span class="badge bg-warning">Batal</span>';
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

    public function getDataPublished()
    {
        $pengajuan = Pengajuan_se::where('stat', '>=', '5')->get();
        $pengajuan->map(function ($row) {
            $user = User::where('id', $row->user_id)->first();
            $instansi = Instansi::where('id', $user->instansi_id)->first();
            $unit_kerja = Unit_kerja::where('id', $user->unit_kerja_id)->first();
            $row->nama_ins = $instansi->nama_ins ?? '-';
            $row->unit_kerja = $unit_kerja->nama_unker;
        });

        return Datatables::of($pengajuan)

            ->addColumn('unit_kerja', function ($user) {
                return $user->unit_kerja;
            })
            ->editColumn('status', function ($stat) {
                if ($stat->stat == '5') {
                    return '<span class="badge bg-info">Telah Terbit</span>';
                } else {
                    return '<span class="badge bg-danger">Dicabut</span>';
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

    public function p12()
    {
        $instansi = Instansi::pluck('nama_ins', 'id');
        return view('admin.p12', compact('instansi'));
    }
}
