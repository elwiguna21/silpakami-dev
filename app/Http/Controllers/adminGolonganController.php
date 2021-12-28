<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Golongan;
use Sentinel;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Helpers\HTMLHelper;
use App\Helpers\DataHelper;

class adminGolonganController extends Controller
{
    public function __construct()
    {
        $this->_golongan = new Golongan;
    }

    public function index(){
        return view('admin.golongan.index');
    }

    public function getData()
    {
        $golongans = $this->_golongan->getAll();

        return Datatables::of($golongans)
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
                $insert = $this->_golongan->insert(DataHelper::_normalizeParams($request->all(), true));
    
                return redirect('/admin/golongan')
                        ->withSuccess(sprintf('%s Success', $request->nama_gol)); 
            }
            catch(QueryException $e){
               return redirect()->back()->with(['error' => "Gagal / Sudah Pernah didaftarkan."]);
            } 
        }else{
            try{
                $update = $this->_golongan->edit(DataHelper::_normalizeParams($request->all(), false, true));

                if ($update){
                    return redirect('/admin/golongan')->withSuccess(sprintf('Success'));
                } 
            }
            catch(QueryException $e){
            return redirect()->back()->with(['error' => "gagal."]);
            }
        }          
      
    }

    public function jsonGetById($id)
    {
        $result = $this->_golongan->getById($id);

        if ($result) {
            return json_encode($result);
        }
    }

    public function delete(Request $request){  
        //return $request->all();
        try{
            $delete = Golongan::where('id', $request->idd)->delete();  
            return redirect('/admin/golongan')
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
        $uniqueItems = $collection->unique('gol');

        $data = [];
        $key = 0;
        foreach($uniqueItems as $d) {
            $data[$key] = $d->gol;
            $key++;
        }
        sort($data);

        Golongan::truncate();
        $userId = Sentinel::getUser()->id;
        foreach($data as $d) {
            if($d != null) {
                $golongan = new Golongan;
                $golongan->nama_gol = strtoupper($d);
                $golongan->created_at = date('Y-m-d H:i:s');
                $golongan->created_by = $userId;
                $golongan->updated_at = date('Y-m-d H:i:s');
                $golongan->updated_by = $userId;
                $golongan->save();
            }
        }

        return redirect()->back();
    }
}
