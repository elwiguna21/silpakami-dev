<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Sentinel;
use App\User;
use App\Log;
use Cartalyst\Sentinel\CheckPoints\ThrottlingException;
use Cartalyst\Sentinel\CheckPoints\NotActivatedException;

class LoginController extends Controller

{

    public function __construct()
    {
        $this->_log = new Log;
    }

    public function index()
    {
        return view('auth.loginNew');
    }

    public function postLogin(Request $request)
    {
        try {
            $rememberMe = false;
            if (isset($request->remember_me))
                $rememberMe = true;
            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                $slug = Sentinel::getUser()->roles()->first()->slug; // mencari role user
            } else {
                $slug = ''; // login bukan user
            }

            $id='';
            $activity='Login ke Aplikasi';
            $category='Login';
            $decription= 'Dengan username ' .$request->nip;

            if ($slug != '') {
                $id = Sentinel::getUser()->id;
            }else{
                $user= User::where('nip',$request->nip)->first();
                if($user!=null){
                    $id = $user->id;
                }else{
                    $id = 0;
                }

            }

            if ($slug == 'admin') {
                $this->_log->post($id, $activity,  $category, $decription, 1);
                return redirect('/admin');
            } elseif ($slug == 'user') {
                $this->_log->post($id, $activity,  $category, $decription, 1);
                return redirect('/user');
            } elseif ($slug == 'teknisi_aplikasi' or $slug == 'teknisi_jaringan') {
                $this->_log->post($id, $activity,  $category, $decription, 1);
                return redirect('/teknisi');
            } elseif ($slug == '') {
                if($id != 0){
                    $decription = 'Username ' .$request->nip .' password salah';
                }else{
                    $decription = 'Username ' .$request->nip .' tidak terdaftar, dengan IP ADDRESS :' .$_SERVER['REMOTE_ADDR'];
                }
                $this->_log->post($id, $activity,  $category, $decription, 0);
                return redirect()->back()->with(['error' => 'nip atau password salah.']);
            } else {
                if($id != 0){
                    $decription = 'Username ' .$request->nip .' password salah';
                }else{
                    $decription = 'Username ' .$request->nip .' tidak terdaftar, dengan IP ADDRESS :' .$_SERVER['REMOTE_ADDR'];
                }
                $this->_log->post($id, $activity,  $category, $decription, 0);
                return redirect()->back()->with(['error' => 'nip atau password salah.']);
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You are banned for $delay seconds."]);
        } catch (NotActivatedException $e) {
            return redirect()->back()->with(['error' => "You are acount is not activated."]);
        }
    }
    public function logout()
    {
        Sentinel::logout();
        return redirect('/');
    }

    public function gantipassword(Request $request)
    {
        try {
            $this->validate($request, [
                'password' => 'required',
                'password2' => 'required_with:password|same:password'
            ]);
            $password = Hash::make($request['password']);

            $request->user()->update([
                'password' => $password,
            ]);
            Sentinel::logout();
            return redirect('/')->with(['success' => 'Password Berhasil Dirubah. Silahkan Login Ulang Menggunakan Password Baru']);
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => "Gagal."]);
        }
    }
}
