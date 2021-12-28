<?php

namespace App\Http\Controllers;

use App\Repositories\TelegramRepository;
use App\Site;
use App\SiteCheckLog;
use App\Validations\SiteValidations;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Repositories\SiteRepository;

class SiteController extends Controller
{
    function index(Request $request){
        $sites = (new SiteRepository())->all($request->all()) ?? [];
        $search = $request->get('search');
        return view('site.table',compact('sites','search'));
    }
    function addForm(){
        $telegrams = (new TelegramRepository())->all() ?? [];
        return view('site.addform',compact('telegrams'));
    }

    function editform($id){
        $telegrams = (new TelegramRepository())->all() ?? [];
        $site = (new SiteRepository())->find($id) ?? [] ;
        return view('site.editform',compact('telegrams','site'));
    }
    function update(Request $request){

        $validate = (new SiteValidations())->update($request);
        $redirect = $request->get('redirect');
        $id = $request->get('id');

        if($validate->fails()){
            return redirect(route($redirect,['id'=>$id]))
                ->withErrors($validate->errors())
                ->withInput($request->input());
        }
        (new SiteRepository())->save((object)$request->all());
        return redirect(route($redirect,['id'=>$id]))
            ->with('status','Berhasil menambah data');
    }
    function config(){

    }
    function logs(Request  $request){
        $search = $request->get('search');
        $logs =(new SiteRepository())->allLog($request->all()) ?? [];
        return view('site.log-table',compact('search','logs'));
    }
    function delete(Request $request){
        Site::find($request->id)->delete();
        return redirect(route('sites'));
    }

    function apiSiteList(Request $request){
        // Ini bisa di set nanti
        if(getenv('TOKEN') != $request->header('token')){
            return response()->json(['failed'],500);
        }
        $sites = Site::paginate(5);
        foreach($sites as $site){
            (new SiteRepository())->check($site);
        }
        return response()->json([],200);
    }

}
