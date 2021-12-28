<?php

namespace App\Http\Controllers;

use App\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Unit_kerja;
use Sentinel;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Helpers\HTMLHelper;
use App\Helpers\DataHelper;

class adminUnitKerjaController extends Controller
{
    public function __construct()
    {
        $this->_unit_kerja = new Unit_kerja;
    }

    public function index(){
        return view('admin.unit_kerja.index');
    }

    public function getData()
    {
        $unit_kerjas = $this->_unit_kerja->getAll();

        return Datatables::of($unit_kerjas)
            ->addColumn('action', function($row) {
                return HTMLHelper::renderEditDeleteLink($row->id);
            })
             ->rawColumns(['id', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function post(Request $request){
        if($request->id == null){
            try{
                $insert = $this->_unit_kerja->insert(DataHelper::_normalizeParams($request->all(), true));

                return redirect('/admin/unit-kerja')
                        ->withSuccess(sprintf('%s Success', $request->nama_gol));
            }
            catch(QueryException $e){
               return redirect()->back()->with(['error' => "Gagal / Sudah Pernah didaftarkan."]);
            }
        }else{
            try{
                $update = $this->_unit_kerja->edit(DataHelper::_normalizeParams($request->all(), false, true));

                if ($update){
                    return redirect('/admin/unit-kerja')->withSuccess(sprintf('Success'));
                }
            }
            catch(QueryException $e){
            return redirect()->back()->with(['error' => "gagal."]);
            }
        }

    }

    public function jsonGetById($id)
    {
        $result = $this->_unit_kerja->getById($id);

        if ($result) {
            return json_encode($result);
        }
    }

    public function delete(Request $request){
        //return $request->all();
        try{
            $delete = Unit_kerja::where('id', $request->idd)->delete();
            return redirect('/admin/unit-kerja')
                   ->withSuccess(sprintf('Success'));
        }
        catch(QueryException $e){
           return redirect()->back()->with(['error' => "gagal."]);
        }
    }

    public function sync() {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://simpeg.sumedangkab.go.id/api/public/pegawai?key=050610');
        $response = (string) $request->getBody();

        $response = json_decode($response);
        $collection = new Collection($response);
        $uniqueItems = $collection->unique('unitkerja');

        $data = [];
        $key = 0;
        foreach($uniqueItems as $d) {
            $data[$key] = $d->unitkerja;
            $key++;
        }
        sort($data);

        Unit_kerja::truncate();
        $userId = Sentinel::getUser()->id;
        foreach($data as $d) {
            if($d != null) {
                $golongan = new Unit_kerja;
                $golongan->nama_unker = $d;
                $golongan->created_at = date('Y-m-d H:i:s');
                $golongan->created_by = $userId;
                $golongan->updated_at = date('Y-m-d H:i:s');
                $golongan->updated_by = $userId;
                $golongan->save();
            }
        }


        $this->syncInstansi();
        return redirect()->back();
    }


    /**
     * Perubahan instansi ke unit kerja memerlukan migrasi
     * tapi karena unit kerja dan instansi id dan namanya sama , maka tidak pelru
     * hanya sync saja table instansi mengikuti unit kerja
     */
    function syncInstansi(){
        $unitKerjas= Unit_kerja::all();
        $unitKerjas->map(function ($unitKerja){
            $instansi = Instansi::where('id',$unitKerja->id)->first();
            if($instansi == null){
                $instansi = new Instansi();
            }
            $instansi->nama_ins = $unitKerja->nama_unker;
            $instansi->save();
        });
    }
}
