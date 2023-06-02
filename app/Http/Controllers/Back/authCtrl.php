<?php

namespace App\Http\Controllers\back;

use PDOException;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authCtrl extends Controller
{
    function login(){
       
        return view('back.auth.login');
        
    }

    // cek login 
    function cek_login(Request $req){
        // validasi
        $req->validate(
            [
                // "name" => "required",
                "email" => "required",
                "password" => "required"
            ],
            [
                // "name.required" => "Maaf Nama Harus Disi",
                "email.required"=> "maaf email harus di isi",
                "password.required" => "password harus di isi"
            ]
        );

        // cek login
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
            $req->session()->regenerate();
            return redirect('/admin');// dasboard
        }
        // jika salah login
        $mess = [
            "type" => "danger",
            "text" => "maaf username atau password salah"
        ];
        return back()->with($mess);
    }

    // registrasi
    function registrasi(){
        return view('back.auth.register');
    }

    // save regis
    function save_registrasi(Request $req){
        //dd($req->all);
        $req->validate(
            [
                "name" => "required",
                "email" => "required",
                "password" => "required|min:5"
            ],
            [
                "name.required" => "username harus di isi",
                "email.required" => "email harus di isi",
                "password.required" => "password harus di isi",
                "password.min" => "password minimal 5 digit"
            ]
        );
        try{
            User::create([
                "name" => $req->name,
                "email" => $req ->email,
                "password" => Hash::make($req->password),
                "level" => "User",
                
            ]);
            $mess = [
                "type" => "succes",
                "text"=> "Registrasi Berhasil Dilakukan"
            ];
        }catch(PDOException $e) {
            $mess = [
                "type" => "danger",
                "text" => "Registrasi Gagal".$e->getMessage()
              ];    
        }
        return redirect ("auth/login")->with($mess);
    }
        // logout
        function logout(Request $req) {
            Auth::logout();
            $req->session()->invalidate();
            $req->session()->regenerateToken();
            return redirect('auth/login');
        }
}
