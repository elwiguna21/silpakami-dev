<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use App\Role;
use App\Role_user;
use Mail;
use App\Jabatan;
use App\Golongan;
use App\Unit_kerja;
use App\J_kelamin;
use App\Instansi;
use Illuminate\Database\QueryException;
use Yajra\Datatables\Datatables;
use App\Helpers\HTMLHelper;
use App\Helpers\DataHelper;
use function GuzzleHttp\Promise\all;


class registerController extends Controller
{
    public function __construct()
    {
        $this->_user = new User;
    }

    public function index()
    {
        $jabatan = Jabatan::pluck('nama_jab', 'id');
        $golongan = Golongan::pluck('nama_gol', 'id');
        $instansi = Instansi::pluck('nama_ins', 'id');
        $unit = Unit_kerja::pluck('nama_unker', 'id');
        $role = Role::pluck('name', 'id');
        $jk = J_kelamin::pluck('name', 'id');
        // return $jk;
        return view('admin.register', compact(['jabatan', 'golongan', 'instansi', 'unit', 'jk', 'role']));
    }

    public function getData()
    {
        $users = $this->_user->allUsers();

        return Datatables::of($users)
            ->addColumn('action', function ($row) {
                return HTMLHelper::renderEditDeleteLink($row->id);
            })
            ->rawColumns(['id', 'action'])
            ->addIndexColumn()
            // ->removeColumn('password')
            ->make(true);
    }

    public function jsonGetById($id)
    {
        $result = $this->_user->getDetailUser($id);

        if ($result) {
            return json_encode($result);
        }
    }

    public function postRegister(Request $request)
    {
        if ($request->id == null) {
            try {
                $roles = $request->role;
                $input =   $request->all();
                $input['instansi_id'] = $request->get('unit_kerja_id');

                $user = Sentinel::registerAndActivate($input);
                $role = Sentinel::findRoleById($roles);
                // $attach = $role->users()->attach($user);
                $user->roles()->attach($role);

                return redirect('/admin/register')
                    ->withSuccess(sprintf('%s Success', $request->nama));
            } catch (QueryException $e) {
                return redirect()->back()->with(['error' => "Gagal / Sudah Pernah didaftarkan."]);
            }
        } else {
            try {
                $input = $request->all();

                // clean password
                if ($request->get('password') == null) {
                    unset($input['password']);
                }

                // Merge Instansi dan unit kerja
                $input['instansi_id'] = $request->get('unit_kerja_id');

                $update = $this->_user->edit(
                    DataHelper::_normalizeParams($input, false, true)
                );

                if ($update) {
                    return redirect('/admin/register')->withSuccess(sprintf('Success'));
                }
            } catch (QueryException $e) {
                return redirect()->back()->with(['error' => 'Gagal melakukan update']);
            }
        }
    }

    public function deleteRegister(Request $request)
    {
        //return $request->all();
        try {
            $delete = User::where('id', $request->idd)->delete();

            return redirect('/admin/register')
                ->withSuccess(sprintf('Success'));
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "gagal."]);
        }
    }
}
