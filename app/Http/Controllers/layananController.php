<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamming;
use Sentinel;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class layananController extends Controller
{
    public function index()
    {
        return view('user.layanan');
    }

    function displaySchedule()
    {
        return view('user.jadwal');
    }
    function getSchedule()
    {
        $jammings = Jamming::where('stat', 3)->get();
        $arrEvents = collect([]);
        $jammings->map(function ($row) use ($arrEvents) {
            $array = [
                'title' => "$row->kegiatan - $row->lokasi_ruangan",
                'start' => (new Carbon($row->tgl_mulai))->format('Y-m-d'),
                'end' => (new Carbon($row->tgl_akhir))->format('Y-m-d'),
            ];
            $arrEvents->push($array);
        });
        return $arrEvents->toJson();
    }

    public function insert(Request $request)
    {

        $validator = $this->validate($request, [
            'files.*' => 'required|mimes:pdf',

        ]);
        $id = Sentinel::getUser()->id;
        if (!$this->checkingDate($request)) {
            return redirect()->back()->withErrors(['error' => "Tidak dapat membuat jadwal pada tanggal tersebut, karena sudah penuh. Silahkan pilih tanggal lain"]);
        }
        list($date1, $date2) = explode(' - ', $request->tgl);
        $tgl_mulai = Carbon::createFromFormat('m/d/Y g:i A', $date1, 'UTC')->toDateTimeString();
        $tgl_akhir = Carbon::createFromFormat('m/d/Y g:i A', $date2, 'UTC')->toDateTimeString();

        try {
            if ($request->hasfile('files')) {
                $file = $request->file('files');
                $name = md5(time() . rand()) . '.' . $file->extension();
                $file->move(public_path() . '/doc/layanan/', $name);
                $insert = new Jamming;
                $insert->user_id = $id;
                $insert->path = "/doc/layanan/" . $name;
                $insert->stat = "1";
                $insert->tgl_mulai = $tgl_mulai;
                $insert->tgl_akhir = $tgl_akhir;
                $insert->lokasi_ruangan = $request->lokasi;
                $insert->luas_ruangan = $request->luas;
                $insert->kegiatan = $request->kegiatan;

                $insert->save();
                return redirect()
                    ->back()
                    ->withSuccess(sprintf('Terimakasih %s pengajuan layanan jamming berhasil terkirim, kami akan segera menghubungi anda', $request->nama));
            }
            return redirect()->back()->with(['error' => "Gagal."]);
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }

    function checkingDate($request)
    {
        list($date1, $date2) = explode(' - ', $request->tgl);
        $tgl_mulai = Carbon::createFromFormat('m/d/Y g:i A', $date1, 'UTC')->format('Y-m-d');
        $tgl_akhir = Carbon::createFromFormat('m/d/Y g:i A', $date2, 'UTC')->format('Y-m-d');

        $jammings = Jamming::where('stat', 3)->whereBetween('tgl_mulai', [$tgl_mulai, $tgl_akhir])->get();
        if (count($jammings) > 0) {
            return false;
        }

        $jammings = Jamming::where('stat', 3)->whereBetween('tgl_akhir', [$tgl_mulai, $tgl_akhir])->get();
        if (count($jammings) > 0) {
            return false;
        }
        return true;
    }

    public function getData()
    {
        $skpdid = Sentinel::getUser()->instansi_id;
        $users = Jamming::join('users', 'users.id', '=', 'jammings.user_id')
            ->select([
                'path',
                'jammings.id',
                'stat',
                'jammings.created_at',
                'kegiatan',
                'users.nama', 'alasan_penolakan'
            ])
            ->where('instansi_id', $skpdid)
            ->orderBy('created_at', 'DESC');

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                if ($user->stat == '1') {
                    return '<a href="" data-bs-toggle="modal" data-bs-target="#cancle" id="bcancel" class="btn btn-outline-danger" data-id="' . $user->id . '">Batal</a>';
                } else {
                    return '';
                }
            })
            ->editColumn('status', function ($stat) {
                if ($stat->stat == '1') {
                    return '<span class="badge bg-primary">Menunggu</span>';
                } elseif ($stat->stat == '2') {
                    return '<span class="badge bg-success">Disetujui</span>';
                } elseif ($stat->stat == '3') {
                    return '<span class="badge bg-warning">Dibatalkan</span>';
                } elseif ($stat->stat == '4') {
                    return '<span class="badge bg-danger">Ditolak</span>';
                }
            })
            ->rawColumns(['id', 'status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function cancel(Request $request)
    {
        $id = $request->idcancel;
        $unit = Jamming::where('id', $id)->update([
            'stat' => "3"
        ]);
        try {
            return redirect()
                ->back()
                ->withSuccess(sprintf('Pengajuan Anda Telah Dibatalkan'));
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }
}
