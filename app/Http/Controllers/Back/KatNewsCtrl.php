<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Models\back\kategorinews;
use App\Http\Controllers\Controller;

class KatNewsCtrl extends Controller
{
    function index () {
        // response list data
        $data = [
            "title" => "Kategori News",
            "dtKat" => kategorinews::All()
        ];
        return view ("back/kategorinews/data",$data);
    }

    function form (Request $req) {
        // menambah atau menghapus data
        $data = [
            "title" => "Kategori News Form",
            "rsKat" => kategorinews::where("id",$req->id_Kat)->first()
        ];
        return view('back/kategorinews/form',$data);

    }

    function save (Request $req) {
        // create or update
        $req->validate(
            [
                "nm_kat" => "required|max:30",
                "status_kat" => "required"
            ],
            [
                "nm_kat.required"=>"Wajib Di isi",
                // "nm_kat.unique"=>"Maaf category sudah ada",
                "nm_kat.max"=> "Maximal 30 karakter",
                "status_kat.required" => "wajib di pilih"

            ]
        );
        try {
            // save
            kategorinews::updateorCreate(
                [
                    "id" => $req->input("id_kat")
                ],
                [
                    "nm_kat" => $req->input("nm_kat"),
                    "status_kat" => $req->input('status_kat')

                ]
            );
            // notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan"
            ];
        } catch (Exception $err) {
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$err->getmessage()
            ];
        }
        return redirect (url("kategorinews"))->with($notif);
    }
        
   }

    function delete($id) {

    }

