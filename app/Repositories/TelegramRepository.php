<?php


namespace App\Repositories;


use App\Telegram;
use App\TelegramConfig;

class TelegramRepository
{
    function save($input){
        $telegram = Telegram::where('id',$input->id)->first();
        if($telegram==null){
            $telegram = new Telegram();
        }
        $telegram->name = $input->name;
        $telegram->number = $input->number;
        $telegram->chat_id = $input->chat_id;
        $telegram->save();
    }
    function all($input = []){
        if(isset($input['search']) && $input['search']!=null){
            $search = $input['search'];
            $telegram = Telegram::where('name',"like","%$search%")
                ->orWhere('number',"like","%$search%")
                ->orWhere('chat_id',"like","%$search%")
                ->paginate(10)
                ->onEachSide(2);
        }else{
            $telegram = Telegram::orderBy('id','DESC')
                ->paginate(10)
                ->onEachSide(2);
        }
        return $telegram;
    }

    function updateConfig($request){
        if($request->get('id') == null){
            $config = TelegramConfig::create($request->all());
        }
        else{
            $config = TelegramConfig::all()->first();
            $config->bot_id = $request->get('bot_id');
            $config->token = $request->get('token');
            $config->save();
        }
    }

}
