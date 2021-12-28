<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
        'nama_jab',
        'tingkatan',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    public function getAll(){
        $res = false;
    	try {
    		$res = Jabatan::orderBy('created_at', 'DESC')->get();

    	} catch (Exception $e) {
    		die($e->getMessage());
    	}

        return $res;
    }

    public function getById($id)
    {
        try {
            return Jabatan::where('id', $id)
                ->first();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insert(array $data)
    {
        try {
            return Jabatan::create($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(array $data)
    {
        try {
            return Jabatan::where('id', $data['id'])
                ->update($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
