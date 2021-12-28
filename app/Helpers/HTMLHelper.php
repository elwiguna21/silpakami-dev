<?php

namespace App\Helpers;

use App\Helpers\StringHelper;

class HTMLHelper
{

    public static function renderIsiAduan($text, $length=100)
    {
        return StringHelper::getSynopsis($text, $length) . ' ...';
    }

    public static function setTextColorStatus($status, $text)
    {
        $color = $status ? '#000' : '#f00';

        return '<span style="color: ' . $color . '">' . $text . '</span>';
    }

    public static function renderEditLink($id)
    {
        return '<a href="#" onclick="showEditModal(' . $id . ')" class="btn btn-outline-primary">Ubah</a>';
    }

    public static function renderDeleteLink($id)
    {
        return '<a href="#" onclick="showDeleteModal(' . $id . ')" class="btn btn-outline-danger">Hapus</a>';
    }

    public static function renderEditDeleteLink($id)
    {
        return '<a href="#" onclick="showEditModal(' . $id . ')" class="btn btn-outline-primary">Ubah</a>' .
            '&nbsp;' .
            '<a href="#" onclick="showDeleteModal(' . $id . ')" class="btn btn-outline-danger">Hapus</a>';
    }

}