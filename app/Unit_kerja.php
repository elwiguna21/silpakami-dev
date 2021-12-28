<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit_kerja extends Model
{
    protected $fillable = [
        'nama_unker',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    public function getAll(){
        $res = false;
    	try {
    		$res = Unit_kerja::orderBy('created_at', 'DESC')->get();

    	} catch (Exception $e) {
    		die($e->getMessage());
    	}

        return $res;
    }

    public function getById($id)
    {
        try {
            return Unit_kerja::where('id', $id)
                ->first();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insert(array $data)
    {
        try {
            return Unit_kerja::create($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(array $data)
    {
        try {
            return Unit_kerja::where('id', $data['id'])
                ->update($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
