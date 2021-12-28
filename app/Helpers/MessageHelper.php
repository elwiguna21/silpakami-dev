<?php

namespace App\Helpers;

class MessageHelper
{

    public static function getCustomValidation()
    {
        return [
            'required' => ':attribute wajib diisi.',
            'unique' => ':attribute sudah digunakan.',
            'numeric' => ':attribute harus tipe numerik.',
            'email' => ':attribute bukan email yang valid.',
            'max' => 'nilai :attribute harus lebih kecil atau sama dengan :size',
            'min' => 'nilai :attribute harus lebih besar atau sama dengan :size',
            'url' => ':attribute bukan alamat URL yang valid.',
        ];
    }

    public static function getCloseResponse($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Pengaduan berhasil ditutup.'];
        } else {
            return ['status' => 'danger', 'msg' => 'Pengaduan gagal ditutup. (error: ' . $result . ')'];
        }
    }

    public static function getResolveResponse($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Pengaduan berhasil diselesaikan.'];
        } else {
            return ['status' => 'danger', 'msg' => 'Pengaduan gagal diselesaikan. (error: ' . $result . ')'];
        }
    }

    public static function getLoginResponse($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Login berhasil.'];
        } else {
            return ['status' => 'danger', 'msg' => 'Login gagal. (error: ' . $result . ')'];
        }
    }

    public static function getInsertResponse($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Input data berhasil.'];
        } else {
            return ['status' => 'danger', 'msg' => 'Input data gagal. (error: ' . $result . ')'];
        }
    }

    public static function getRegisterRespon($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Data Berhasil Teregistrasi, SMS Akan dikirim atau Cek Email Anda Untuk Aktivasi Akun Anda, <a href="/lapor"><u>Kembali Kelogin</u></a>'];
        } else {
            return ['status' => 'danger', 'msg' => 'Registrasi gagal. (error: ' . $result . ')'];
        }
    }

    public static function getActiveRespon($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Akun Berhasil Aktiv Silahkan Login'];
        } else {
            return ['status' => 'danger', 'msg' => 'Konfirmasi gagal. (error: ' . $result . ')'];
        }
    }

    public static function getSendLaporan($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Laporan Anda Berhasil Terkirim'];
        } else {
            return ['status' => 'danger', 'msg' => 'Laporan Anda Gagal Terkirim. (error: ' . $result . ')'];
        }
    }

    public static function getSendThread($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Pesan Anda Berhasil Terkirim'];
        } else {
            return ['status' => 'danger', 'msg' => 'Pesan Anda Gagal Terkirim. (error: ' . $result . ')'];
        }
    }

    public static function getUpdateResponse($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Ubah data berhasil.'];
        } else {
            return ['status' => 'danger', 'msg' => 'Ubah data gagal. (error: ' . $result . ')'];
        }
    }

    public static function getDeleteResponse($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Hapus data berhasil.'];
        } else {
            return ['status' => 'danger', 'msg' => 'Hapus data gagal. (error: ' . $result . ')'];
        }
    }

    public static function getPublishResponse($result)
    {
        if ($result >= 1) {
            return ['status' => 'success', 'msg' => 'Data berhasil dipublikasi.'];
        } else {
            return ['status' => 'danger', 'msg' => 'Data gagal dipublikasi. (error: ' . $result . ')'];
        }
    }

    public static function getNotFoundResponse()
    {
        return ['status' => 'danger', 'msg' => 'Data tidak ditemukan.'];
    }

    public static function getRegisteredUser($checkIfNonaktif)
    {
        return ['status' => 'danger', 'msg' => $checkIfNonaktif. ' Anda Telah Digunakan. <a href="/lapor"><u>Kembali Kelogin</u></a>'];
    }

}