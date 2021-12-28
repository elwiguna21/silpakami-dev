<?php

use Illuminate\Database\Seeder;

class UserInstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->map(function ($user){
            if ($user->instansi_id == 0 ) {
                $user->instansi_id = $user->unit_kerja_id;
                $user->save();
            }
        });
    }
}
