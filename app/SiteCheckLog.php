<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteCheckLog extends Model
{
    //

    function site(){
        return $this->hasOne(Site::class,'id','web_id');
    }
}
