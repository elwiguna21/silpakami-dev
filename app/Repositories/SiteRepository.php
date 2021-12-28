<?php


namespace App\Repositories;


use App\Site;
use App\SiteCheckLog;
use App\Telegram;
use App\TelegramConfig;
use GuzzleHttp\Client;

class SiteRepository
{
    function all($input=[]){
        if(isset($input['search']) && $input['search']!=null){
            $search = $input['search'];
            $sites = Site::where('name',"like","%$search%")
            ->orWhere('page_title',"like","%$search%")
                ->orWhere('url',"like","%$search%")
                ->orderBy('id','DESC')
                ->paginate(10)
                ->onEachSide(2);
        }else{
            $sites = Site::orderBy('id','DESC')
                ->paginate(10)
                ->onEachSide(2);
        }

        $sites->map(function ($site){
            $site['telegram_label'] = $this->telegramLabel($site['telegram_id']);
            return $site;
        });
        return $sites;
    }
    function find($id){
        $sites = Site::where("id",$id)->first();
        $sites['telegram_label'] = $this->telegramLabel($sites['telegram_id']);
        $sites['telegram_ids'] =explode(',',$sites['telegram_id']);
        return $sites;
    }

    function telegramLabel($index){
        $explode = explode(',',$index);
        $name = array();
        foreach($explode as $i){
            array_push(
                $name,
                Telegram::where('id',$i)->first()->name ?? '-'
            );
        }
        return implode(',',$name);
    }
    function save($input){
        $site = Site::where('id',$input->id)->first();
        if($site==null){
            $site = new Site();
        }
        $site->name = $input->name;
        $site->url = $input->url;
        $site->page_title = $input->page_title;
        $site->telegram_id = implode(',',$input->telegram_id);
        $site->save();
    }

    function check($site){
        $client = new Client();
        try{
            $request = $client->get($site['url']);
            $contents = $request->getBody()->getContents();
            $this->createLogSuccess($request->getStatusCode(),$contents,$site);
            $this->checkTitle($contents,$site);

        }catch (\Exception $exception){
            $this->sendNotifError($site);
            $this->createLogError($exception,$site);
        }

    }

    function checkTitle($content,$site){
        if(strpos(strtolower($content),strtolower($site['page_title'])) == false){
            $this->sendNotifDeface($site);
        }
    }
    function sendNotifDeface($site){
        $client = new Client();
        $telegramConfig = TelegramConfig::all()->first();

        $telegramIds = explode(',',$site['telegram_id']);
        foreach($telegramIds as $telegramId){
            $telegram = Telegram::where('id',$telegramId)->first();
            $telegram->chat_id;

            $url = getenv('TELEGRAM_BASE_URL')."/bot".
                $telegramConfig->bot_id.":".
                $telegramConfig->token."/sendMessage?chat_id=".$telegram->chat_id.
                "&text= Website Tidak Sesuai  - ". $site['url'];
            try{
                $client->get($url);
            }catch(\Exception $exception){
              echo $exception->getMessage();
            }
        }

    }
    function sendNotifError($site){
        $client = new Client();
        $telegramConfig = TelegramConfig::all()->first();

        $telegramIds = explode(',',$site['telegram_id']);
        foreach($telegramIds as $telegramId){
            $telegram = Telegram::where('id',$telegramId)->first();
            $telegram->chat_id;

            $url = getenv('TELEGRAM_BASE_URL')."/bot".
                $telegramConfig->bot_id.":".
                $telegramConfig->token."/sendMessage?chat_id=".$telegram->chat_id.
                "&text= Website Tidak dapat diakses - ". $site['url'];
            try{
                $client->get($url);
            }catch(\Exception $exception){
               echo $exception->getMessage();
            }
        }

    }

    function createLogSuccess($status,$content,$site){
        $log = new SiteCheckLog();
        $log->code = (integer)$status;
        $log->site_id = $site['id'];
        $log->status = 'ok';
        $log->log =$content;
        $log->save();
    }

    function createLogError($exception,$site){
        $log = new SiteCheckLog();
        $log->site_id = $site['id'];
        $log->code = (int)$exception->getCode();
        $log->log = $exception->getMessage();
        $log->status = 'error';
        $log->save();
    }


    function allLog($input=[]){
        if(isset($input['search']) && $input['search']!=null){
            $search = $input['search'];
            $logs = SiteCheckLog::where('log',"like","%$search%")
                ->paginate(10)
                ->onEachSide(2);
        }else{
            $logs = SiteCheckLog::orderBy('id','DESC')
                ->paginate(10)
                ->onEachSide(2);
        }

        $logs->map(function ($log){
            $site = Site::find((int)$log->site_id);
            if($site!=null){
                $log->site = $site->first();
            }
            return $log;
        });

        return $logs;
    }

}
