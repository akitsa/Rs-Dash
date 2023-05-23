<?php

namespace App\Http\Controllers\back;

use App\Models\back\profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class profileCtrl extends Controller
{
    function index () {
        $data = [
            "title" => "data profile",
            "dtPer" => profile::All()
        ];
        return view ('back.profile.data',$data);
    }

    function form (Request $req) {
        $data = [
            "title" => "form profile",
            "rsPer" => profile::where("id",$req->id_Per)->first()
        ];
        return view ('back.profil.form',$data);

    }

    function save (Request $req) {
        
        $req->validate(
            [

            ],
            [

            ]
        );

        //profile::updateOrCreate

    }

    function delete ($id) {
           // delete data
           try{
            // save
            profile::where("id",$id)->delete();

            // notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan !"
            ];
        }catch(Exception $e){   
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$e->getMessage()
            ];
        }
        return redirect(url('news'))->with($notif);
    }
 }

