<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Jabatan;
use App\ApiJabatan;
use Sentinel;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Helpers\HTMLHelper;
use App\Helpers\DataHelper;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class adminJabatanController extends Controller
{
    public function __construct()
    {
        $this->_jabatan = new Jabatan;
    }

    public function index()
    {
        return view('admin.jabatan.index');
    }

    public function getData()
    {
        $jabatans = $this->_jabatan->getAll();

        return Datatables::of($jabatans)
            ->addColumn('action', function ($row) {
                return HTMLHelper::renderEditDeleteLink($row->id);
            })
            ->rawColumns(['id', 'action'])
            ->addIndexColumn()
            ->make(true);
    }
    public function post(Request $request)
    {
        if ($request->id == null) {
            try {
                $insert = $this->_jabatan->insert(DataHelper::_normalizeParams($request->all(), true));

                return redirect('/admin/jabatan')
                    ->withSuccess(sprintf('%s Success', $request->nama_jab));
            } catch (QueryException $e) {
                return redirect()->back()->with(['error' => "Gagal / Sudah Pernah didaftarkan."]);
            }
        } else {
            try {
                $update = $this->_jabatan->edit(DataHelper::_normalizeParams($request->all(), false, true));

                if ($update) {
                    return redirect('/admin/jabatan')->withSuccess(sprintf('Success'));
                }
            } catch (QueryException $e) {
                return redirect()->back()->with(['error' => "gagal."]);
            }
        }
    }

    public function jsonGetById($id)
    {
        $result = $this->_jabatan->getById($id);

        if ($result) {
            return json_encode($result);
        }
    }

    public function delete(Request $request)
    {
        try {
            $delete = Jabatan::where('id', $request->idd)->delete();
            return redirect('/admin/jabatan')
                ->withSuccess(sprintf('Success'));
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "gagal."]);
        }
    }

    public function sync() {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://simpeg.sumedangkab.go.id/api/public/pegawai?key=050610');
        $response = (string) $request->getBody();

        $response = json_decode($response);
        $collection = new Collection($response);
        $uniqueItems = $collection->unique('nama_jabatan');

        $data = [];
        $key = 0;
        foreach($uniqueItems as $d) {
            $data[$key] = $d->nama_jabatan;
            $key++;
        }

        Jabatan::truncate();
        foreach($data as $d) {
            if($d != null) {
                $jabatan = new Jabatan;
                $jabatan->nama_jab = $d;
                $jabatan->created_by = Sentinel::getUser()->id;
                $jabatan->updated_by = Sentinel::getUser()->id;
                $jabatan->save();
            }
        }

        return redirect()->back();
    }
}
