<?php

namespace App\Http\Controllers;

use App\Repositories\TelegramRepository;
use App\SiteCheckLog;
use App\Telegram;
use App\TelegramConfig;
use App\Validations\TelegramValidations;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    //
    function index(Request $request){
        $telegrams = (new TelegramRepository())->all($request->all());
        $search = $request->get('search');
        return view('telegram.table',compact('telegrams','search'));
    }
    function addform(Request $request){
        return view('telegram.addform');
    }
    function editform($id){
        $telegram = Telegram::where('id',$id)->first();
        return view('telegram.editform',compact('telegram'));
    }
    function delete(Request $request){
        Telegram::find($request->id)->delete();
        return redirect(route('telegrams'));
    }
    function update(Request $request){

        $validate = (new TelegramValidations())->update($request);
        $redirect = $request->get('redirect');
        $id = $request->get('id');
        if($validate->fails()){
            return redirect(route($redirect,['id'=>$id]))
                ->withErrors($validate->errors())
                ->withInput($request->input());
        }
        (new TelegramRepository())->save((object)$request->all());
        return redirect(route($redirect,['id'=>$id]))
            ->with('status','Berhasil menambah data');
    }


    function configPage(){
        $config = TelegramConfig::all()->first();
        return view('telegram.config',compact('config'));
    }
    function configUpdate(Request $request){
        (new TelegramRepository())->updateConfig($request);
        return redirect(route('telegram.config.page'));
    }
}
