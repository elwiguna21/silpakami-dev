<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cartalyst\Sentinel\Users\EloquentUser;
use DB;
use Illuminate\Support\Facades\Hash;

class User extends EloquentUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'nip',
        'nik',
        'golongan_id',
        'jabatan_id',
        'hp',
        'jenis_kelamin',
        'instansi_id',
        'unit_kerja_id',
        'password',
        'permission',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $loginNames = ['nip'];

    public static function byEmail($email){
        return static::whereEmail($email)->first();
    }

    public $primaryKey = 'id';

    // public function userid()
    // {
    //     return $this->belongsTo('App\Marketing', 'id');
    // }

    public function getAll(){
        $res = false;
    	try {
    		$res = User::join('role_users', 'users.id', '=', 'role_users.user_id')
                    ->join('roles', 'role_users.role_id', '=', 'roles.id')
                    ->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
                    ->join('unit_kerjas', 'users.unit_kerja_id', '=', 'unit_kerjas.id')
                    ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                    ->join('golongans', 'users.golongan_id', '=', 'golongans.id')
                    ->select(['nip','nik','nama','golongans.nama_gol AS golongan', 'golongans.id AS golonganid',
                            'roles.slug AS slug', 'users.id', 'roles.name', 'roles.id AS rolesid',
                            'jabatans.nama_jab AS jabatan', 'jabatans.id AS jabatanid', 'hp', 'jenis_kelamin',
                            'instansis.nama_ins AS instansi', 'instansis.id AS instansiid', 'unit_kerjas.nama_unker AS unit',
                            'unit_kerjas.id AS unitid', 'email', 'last_login'
                            ])
                    ->get();

    	} catch (Exception $e) {
    		die($e->getMessage());
    	}

        return $res;
    }
    public function allUsers(){
        $users = User::all();
        $users->map(function ($user){
            $golongan = Golongan::where('id',(int)$user->golongan_id)->first();
            $jabatan = Jabatan::where('id',(int)$user->jabatan_id)->first();
            $instansi = Instansi::where('id',(int)$user->instansi_id)->first();
            $unit = Unit_kerja::where('id',(int)$user->unit_kerja_id)->first();
            $roles = Role_user::where("user_id",(int)$user->id)->first();

            $user->golongan = $golongan->nama_gol ?? '-';
            $user->golonganid = $user->golongan_id;

            $user->jabatan = $jabatan->nama_jab ?? '-';
            $user->jabatanid = $user->jabatan_id;

            $user->instansi = $instansi->nama_ins ?? '-';
            $user->instansiid = $user->instansi_id;

            $user->unit = $unit->nama_unker ?? '-';
            $user->unitid = $user->unit_kerja_id;

            $user->rolesid= $roles->role_id;
            $user->slug= $roles->slug;

        });
        return $users;
    }
    function getDetailUser($id){
        $user= User::where('id',$id)->first();
        $golongan = Golongan::where('id',(int)$user->golongan_id)->first();
        $jabatan = Jabatan::where('id',(int)$user->jabatan_id)->first();
        $instansi = Instansi::where('id',(int)$user->instansi_id)->first();
        $unit = Unit_kerja::where('id',(int)$user->unit_kerja_id)->first();
        $roles = Role_user::where("user_id",(int)$user->id)->first();

        $user->golongan = $golongan->nama_gol ?? '-';
        $user->golonganid = $user->golongan_id;

        $user->jabatan = $jabatan->nama_jab ?? '-';
        $user->jabatanid = $user->jabatan_id;

        $user->instansi = $instansi->nama_ins ?? '-';
        $user->instansiid = $user->instansi_id;

        $user->unit = $unit->nama_unker ?? '-';
        $user->unitid = $user->unit_kerja_id;

        $user->rolesid= $roles->role_id;
        $user->slug= $roles->slug;
        return $user;
    }

    public function getById($id){
        $res = false;
    	try {
    		$res = User::join('role_users', 'users.id', '=', 'role_users.user_id')
                    ->join('roles', 'role_users.role_id', '=', 'roles.id')
                    ->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
                    ->join('unit_kerjas', 'users.unit_kerja_id', '=', 'unit_kerjas.id')
                    ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                    ->join('golongans', 'users.golongan_id', '=', 'golongans.id')
                    ->select(['nip','nik','nama','golongans.nama_gol AS golongan', 'golongans.id AS golonganid',
                            'roles.slug AS slug', 'users.id', 'roles.name', 'roles.id AS rolesid',
                            'jabatans.nama_jab AS jabatan', 'jabatans.id AS jabatanid', 'hp', 'jenis_kelamin',
                            'instansis.nama_ins AS instansi', 'instansis.id AS instansiid', 'unit_kerjas.nama_unker AS unit',
                            'unit_kerjas.id AS unitid', 'email', 'last_login'
                            ])
                    ->where('users.id', $id)
                    ->first();

    	} catch (Exception $e) {
    		die($e->getMessage());
    	}
        return $res;
    }

    public function edit(array $data){
    	try {
            DB::beginTransaction();
            //update user
            $basicData = ['nip'=>$data['nip'],
                'nik'=>$data['nik'],
                'nama'=>$data['nama'],
                'golongan_id'=>$data['golongan_id'],
                'jabatan_id'=>$data['jabatan_id'],
                'hp'=>$data['hp'],
                'jenis_kelamin'=>$data['jenis_kelamin'],
                'instansi_id'=>$data['instansi_id'] ?? 0,
                'unit_kerja_id'=>$data['unit_kerja_id'] ?? 0,
                'email'=>$data['email'],
                'updated_at'=>$data['updated_at'],
            ];


            if(isset($data['password']) && $data['password']!=null){
                $arrayUpdate =array_merge($basicData,['password'=>$data['password']]);
            }
            else{
                $arrayUpdate = $basicData;
            }

            User::where('id', $data['id'])
                    ->update($arrayUpdate);
            //update role
            Role_user::where('user_id', $data['id'])
                    ->update([ 'role_id'=>$data['role']]);

            DB::commit();

            return true;
    	} catch (Exception $e) {
    		die($e->getMessage());
    	}
    }
}
