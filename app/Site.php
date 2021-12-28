<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    function telegram()
    {
        return $this->hasOne(Telegram::class,'id','telegram_id');
    }
}
