<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\New_;

class Log extends Model
{
    //

    public function post($id, $activity, $category, $description, $status)
    {

        try {
            $logs = new Log;
            $logs->user_id = $id;
            $logs->activity = $activity;
            $logs->category = $category;
            $logs->description = $description;
            $logs->status = $status;

            $logs->save();
        } catch (Exception $e) {
    		die($e->getMessage());
    	}
    }
}
