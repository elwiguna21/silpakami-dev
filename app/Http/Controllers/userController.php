<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Sentinel;
use App\Incident;
use App\Pengajuan_se;
use App\Pencabutan_se;
use App\Perubahan_se;
use App\Jamming;
use App\Email;
use App\Pentest;

class userController extends Controller
{
    public function index()
    {
        $user = Sentinel::getUser()->id;

        $month = $now = Carbon::now()->month;

        $date = Carbon::today()->toDateString();
        $pengajuanDay = Pengajuan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->where('user_id', $user)
            ->first();
        $pencabutanDay = Pencabutan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->where('user_id', $user)
            ->first();
        $perubahanDay = Perubahan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->first();
        $jammingDay = Jamming::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->where('user_id', $user)
            ->first();
        $insidenDay = Incident::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->where('user_id', $user)
            ->first();
        $emailDay = Email::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->where('user_id', $user)
            ->first();
        $pentestDay = Pentest::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->where('user_id', $user)
            ->first();

        $pengajuanMonth = Pengajuan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->where('user_id', $user)
            ->first();
        $pencabutanMonth = Pencabutan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->first();
        $perubahanMonth = Perubahan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->where('user_id', $user)
            ->first();
        $jammingMonth = Jamming::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->where('user_id', $user)
            ->first();
        $insidenMonth = Incident::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->where('user_id', $user)
            ->first();
        $emailMonth = Email::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->where('user_id', $user)
            ->first();
        $pentestMonth = Pentest::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->where('user_id', $user)
            ->first();

        $pengajuanAll = Pengajuan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where('user_id', $user)
            ->first();
        $pencabutanAll = Pencabutan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where('user_id', $user)
            ->first();
        $perubahanAll = Perubahan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where('user_id', $user)
            ->first();
        $jammingAll = Jamming::select(DB::raw('COUNT(id) as jumlah'))
            ->where('user_id', $user)
            ->first();
        $insidenAll = Incident::select(DB::raw('COUNT(id) as jumlah'))
            ->where('user_id', $user)
            ->first();
        $emailAll = Email::select(DB::raw('COUNT(id) as jumlah'))
        ->where('user_id', $user)
            ->first();
        $pentestAll = Pentest::select(DB::raw('COUNT(id) as jumlah'))
        ->where('user_id', $user)
            ->first();

        return view('user.home', compact([
            'pengajuanDay', 'pencabutanDay', 'perubahanDay', 'jammingDay', 'insidenDay', 'emailDay', 'pentestDay',
            'pengajuanAll', 'pencabutanAll', 'perubahanAll', 'jammingAll', 'insidenAll','emailAll', 'pentestAll',
            'pengajuanMonth', 'pencabutanMonth', 'perubahanMonth', 'jammingMonth', 'insidenMonth', 'emailMonth','pentestMonth'
        ]));
    }
}
