<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $fillable = [
        'nama_gol',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    public function getAll(){
        $res = false;
    	try {
    		$res = Golongan::orderBy('created_at', 'DESC')->get();

    	} catch (Exception $e) {
    		die($e->getMessage());
    	}

        return $res;
    }

    public function getById($id)
    {
        try {
            return Golongan::where('id', $id)
                ->first();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insert(array $data)
    {
        try {
            return Golongan::create($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(array $data)
    {
        try {
            return Golongan::where('id', $data['id'])
                ->update($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
