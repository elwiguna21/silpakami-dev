<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nip',
        'nama_lengkap',
        'temlahir',
        'tgllahir',
        'tmtpang',
        'jenis_jabatan',
        'nama_jabatan',
        'kelamin',
        'agama',
        'pendidikan',
        'gol',
        'pangkat',
        'nama_dudukpeg',
        'kodeunitkerja',
        'unitkerja',
        'jenispek',
        'kode',
        'tkt',
        'kdpang',
        'pinid',
        'tpp',
        'grade',
        'kdu',
    ];

    public $incrementing = false;
}
