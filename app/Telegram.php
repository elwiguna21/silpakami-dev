<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telegram extends Model
{
    function sites(){
        return $this->hasMany(Site::class,'telegram_id','id');
    }
}
