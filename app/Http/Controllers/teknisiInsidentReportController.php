<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Screenshoot;
use Sentinel;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class teknisiInsidentReportController extends Controller
{
    public function insert($id)
    {
        $incident = Incident::join('users', 'users.id', '=', 'incidents.user_id')
            ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
            ->where('incidents.id', $id)
            ->first();
        $images = Screenshoot::where('incident_id', $id)->get();
        $teknisi = $this->getTeknisi();
        return view('teknisi.laporan_input', compact(['teknisi','incident', 'images', 'id']));
    }

    public function show($id)
    {
        $incident = Incident::join('users', 'users.id', '=', 'incidents.user_id')
            ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
            ->where('incidents.id', $id)
            ->first();
        $images = Screenshoot::where('incident_id', $id)->get();
        $teknisi = $this->getTeknisi();
        return view('teknisi.laporan_detail', compact(['teknisi','incident', 'images', 'id']));
    }

    public function store(Request $request)
    {
        $now = Carbon::parse($request->tgl_ditangani)->format('Y-m-d');
        //return $now;
        $id = $request->idlaporan;
        $handler_id = Sentinel::getUser()->id;

        try {
            $lap = Incident::where('id', $id)->update([
                'stat' => "3",
                'handler_id' => $handler_id,
                'jenis_insiden' => $request->jenis_insiden,
                'cakupan_insiden' => $request->cakupan_insiden,
                'jumlah_sistem' => $request->jumlah_sistem,
                'jumlah_pengguna' => $request->jumlah_pengguna,
                'pihak_ketiga' => $request->pihak_ketiga,
                'dampak_insiden' => $request->dampak_insiden,
                'sensitivita_informasi' => $request->sensitivita_informasi,
                'data_enkripsi' => $request->data_enkripsi,
                'besar_data' => $request->besar_data,
                'sumber_serangan' => $request->sumber_serangan,
                'tujuan_serangan' => $request->tujuan_serangan,
                'ip_sistem' => $request->ip_sistem,
                'domain_sistem' => $request->domain_sistem,
                'fungsi' => $request->fungsi,
                'so' => $request->so,
                'patching_level' => $request->patching_level,
                'security_sistem' => $request->security_sistem,
                'lokasi' => $request->lokasi,
                'level_hak_akses' => $request->level_hak_akses,
                'tindakan_identifikasi' => $request->tindakan_identifikasi,
                'tindakan_pemulihan' => $request->tindakan_pemulihan,
                'tindakan_pencegahan' => $request->tindakan_pencegahan,
                'tgl_ditangani' => $now
            ]);

            return redirect('teknisi/incident-handling')
                ->withSuccess(sprintf('Incident Selesai dan Laporan Berhasil Dibuat'));
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Gagal."]);
        }
    }

    public function getTeknisi()
    {
        $slug = Sentinel::getUser()->roles()->first()->slug; // mencari role user
        if ($slug == 'teknisi_aplikasi') {
            $teknisi = 'TEKNISI APLIKASI';
        } else {
            $teknisi = 'TEKNISI JARINGAN';
        }
        return $teknisi;
    }
}
