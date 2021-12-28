<?php


namespace App\Validations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteValidations
{
    function update(Request $request){
        return Validator::make($request->all(),[
            'name'=>'string|required',
            'url'=>'url|required',
            'page_title'=>'string|required',
            'telegram_id.*'=>'numeric|required',
        ],[
            'active_url'=> ' Masukan url yang valid',
            'required'=> ' Tidak boleh kosong',
            'numeric'=> 'Harus berupa nomor',
            'string'=> 'Harus berupa text',
        ]);
    }
}
