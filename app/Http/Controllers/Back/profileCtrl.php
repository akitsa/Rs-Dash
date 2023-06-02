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
        return view ('back.profile.form',$data);

    }

    function save (Request $req) {
         //dd($req->all());
        $req->validate(
            [
            "nm_perusahaan" => "required",
            "alamat" => "required",
            "telp" => "required | numeric",
            "email" => "required"
            ],
            [
                "nm_perusahaan.required" => "Nama Harus di isi",
                "alamat.required"        => "alamat harus di isi",
                "telp.required"          => "no telp harus di isi",
                "telp.numeric" => "no telp harus angka",
                "email.required"         => "email harus di isi",
            ]
        );

       try{
        // proses save
            profile::updateorcreate(
                [
                    "id" => $req -> input('id_Per')
                ],
                [
                    "nm_perusahaan" => $req ->input('nm_perusahaan'),
                    "alamat" => $req ->input('alamat'),
                    "telp" => $req ->input('telp'),
                    "email" => $req ->input('email'),
                ]
                );
            //notif
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
            return redirect (url("profile"))->with($notif);

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

