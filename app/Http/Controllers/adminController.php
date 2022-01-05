<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Incident;
use App\Pengajuan_se;
use App\Pencabutan_se;
use App\Perubahan_se;
use App\Jamming;
use App\Email;
use App\Pentest;
use App\Log;

class adminController extends Controller
{
    public function index()
    {
        $month = $now = Carbon::now()->month;

        $date = Carbon::today()->toDateString();
        $pengajuanDay = Pengajuan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->first();
        $pencabutanDay = Pencabutan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->first();
        $perubahanDay = Perubahan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->first();
        $jammingDay = Jamming::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->first();
        $insidenDay = Incident::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->first();
        $emailDay = Email::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->first();
        $pentestDay = Pentest::select(DB::raw('COUNT(id) as jumlah'))
            ->where(DB::raw('date (created_at)'), $date)
            ->first();

        $pengajuanMonth = Pengajuan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->first();
        $pencabutanMonth = Pencabutan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->first();
        $perubahanMonth = Perubahan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->first();
        $jammingMonth = Jamming::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->first();
        $insidenMonth = Incident::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->first();
        $emailMonth = Email::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->first();
        $pentestMonth = Pentest::select(DB::raw('COUNT(id) as jumlah'))
            ->whereMonth('created_at', $month)
            ->first();

        $pengajuanAll = Pengajuan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->first();
        $pencabutanAll = Pencabutan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->first();
        $perubahanAll = Perubahan_se::select(DB::raw('COUNT(id) as jumlah'))
            ->first();
        $jammingAll = Jamming::select(DB::raw('COUNT(id) as jumlah'))
            ->first();
        $insidenAll = Incident::select(DB::raw('COUNT(id) as jumlah'))
            ->first();
        $emailAll = Email::select(DB::raw('COUNT(id) as jumlah'))
            ->first();
        $pentestAll = Pentest::select(DB::raw('COUNT(id) as jumlah'))
            ->first();

        $logs = DB::table('users')
            ->join('logs', 'users.id', '=', 'logs.user_id')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->select('users.nama', 'roles.name', 'logs.activity', 'logs.created_at')
            ->where('roles.id', '=', '1')
            ->where('logs.status', '=', '1')
            ->orderby('logs.created_at', 'desc')
            ->limit(10)
            ->get();

        $logs_user = DB::table('users')
            ->join('logs', 'users.id', '=', 'logs.user_id')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->select('users.nama', 'roles.name', 'logs.activity', 'logs.created_at')
            ->where('roles.id', '=', '2')
            ->where('logs.status', '=', '1')
            ->orderby('logs.created_at', 'desc')
            ->limit(10)
            ->get();

            $logs_ta = DB::table('users')
            ->join('logs', 'users.id', '=', 'logs.user_id')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->select('users.nama', 'roles.name', 'logs.activity', 'logs.created_at')
            ->where('roles.id', '=', '3')
            ->where('logs.status', '=', '1')
            ->orderby('logs.created_at', 'desc')
            ->limit(10)
            ->get();

            $logs_tj = DB::table('users')
            ->join('logs', 'users.id', '=', 'logs.user_id')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->select('users.nama', 'roles.name', 'logs.activity', 'logs.created_at')
            ->where('roles.id', '=', '4')
            ->where('logs.status', '=', '1')
            ->orderby('logs.created_at', 'desc')
            ->limit(10)
            ->get();

            
        $logs_error = DB::table('users')
        ->join('logs', 'users.id', '=', 'logs.user_id')
        ->join('role_users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.nama', 'roles.name', 'logs.activity', 'logs.created_at', 'logs.description')
        ->where('roles.id', '=', '1')
        ->where('logs.status', '=', '0')
        ->orderby('logs.created_at', 'desc')
        ->limit(10)
        ->get();

    $logs_user_error = DB::table('users')
        ->join('logs', 'users.id', '=', 'logs.user_id')
        ->join('role_users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.nama', 'roles.name', 'logs.activity', 'logs.created_at', 'logs.description')
        ->where('roles.id', '=', '2')
        ->where('logs.status', '=', '0')
        ->orderby('logs.created_at', 'desc')
        ->limit(10)
        ->get();

        $logs_ta_error = DB::table('users')
        ->join('logs', 'users.id', '=', 'logs.user_id')
        ->join('role_users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.nama', 'roles.name', 'logs.activity', 'logs.created_at', 'logs.description')
        ->where('roles.id', '=', '3')
        ->where('logs.status', '=', '0')
        ->orderby('logs.created_at', 'desc')
        ->limit(10)
        ->get();

        $logs_tj_error = DB::table('users')
        ->join('logs', 'users.id', '=', 'logs.user_id')
        ->join('role_users', 'users.id', '=', 'role_users.user_id')
        ->join('roles', 'roles.id', '=', 'role_users.role_id')
        ->select('users.nama', 'roles.name', 'logs.activity', 'logs.created_at', 'logs.description')
        ->where('roles.id', '=', '4')
        ->where('logs.status', '=', '0')
        ->orderby('logs.created_at', 'desc')
        ->limit(10)
        ->get();


        $anonymous = DB::table('logs')
        ->select('logs.activity', 'logs.created_at', 'logs.description')
        ->where('logs.user_id', '=', '0')
        ->orderby('logs.created_at', 'desc')
        ->limit(10)
        ->get();

        return view('admin.index', compact([
            'pengajuanDay', 'pencabutanDay', 'perubahanDay', 'jammingDay', 'insidenDay', 'emailDay', 'pentestDay',
            'pengajuanAll', 'pencabutanAll', 'perubahanAll', 'jammingAll', 'insidenAll', 'emailAll', 'pentestAll',
            'pengajuanMonth', 'pencabutanMonth', 'perubahanMonth', 'jammingMonth', 'insidenMonth', 'emailMonth', 'pentestMonth',
            'logs', 'logs_user', 'logs_ta', 'logs_tj', 'logs_error', 'logs_user_error', 'logs_ta_error', 'logs_tj_error', 'anonymous' 

        ]));
    }
}
