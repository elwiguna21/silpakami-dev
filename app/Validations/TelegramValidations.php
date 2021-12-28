<?php


namespace App\Validations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TelegramValidations
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator|object
     */
    function update(Request $request){
        return Validator::make($request->all(),[
            'name'=>'string|required',
            'number'=>'numeric|required',
            'chat_id'=>'string|required',
        ],[
            'required'=> ':attribute tidak boleh kosong',
            'numeric'=> ':attribute harus berupa nomor',
            'string'=> ':attribute harus berupa text',
        ]);

    }
}
