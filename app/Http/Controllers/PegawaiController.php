<?php

namespace App\Http\Controllers;

use App\Pegawai;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //

    protected $key = '050610';
    function download(){
        $client = new Client();
        $url = "http://simpeg.sumedangkab.go.id/api/public/pegawai?key=".$this->key;
        $request = $client->request('GET',$url);

        if($request->getStatusCode()==200){
            $contents = $request->getBody()->getContents();
            sleep(1);
            return  $this->sync(json_decode($contents,true));
        }
    }
    function sync($contents){
        foreach($contents as $content){
            $pegawai = Pegawai::where('nip',$content['nip'])->first();
            if($pegawai == null){
                Pegawai::create($content);
            }
            else{
                $pegawai->update($content);
            }
        }
        return new JsonResponse('done',200);
    }

    function search(Request $request){
        $search= $request->get('search');
        $pegawai = Pegawai::where('nama_lengkap',"like","%$search%")->get();
        $pegawai->map(function ($p){
            $p->text = $p->nama_lengkap;
            $p->id = $p->nip;
            return $p;
        });
        return new JsonResponse($pegawai,200);
    }
}
