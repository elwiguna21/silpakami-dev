<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Sentinel;
use App\User;

class NameViewComposer {

    public function compose(View $view) {
    	if (Sentinel::check()){
            $users = Sentinel::getUser();
            $id = $users->id;
            $us= User::select('nama', 'id')
            ->where('users.id', '=', $id)
            ->first();
    
            $view->with('name', $us);
        }           
        else {
            $users = 'error';
            $view->with('name', $users);
        }
    }
}