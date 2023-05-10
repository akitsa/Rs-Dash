<?php

namespace App\Http\Controllers\back;

use App\Models\back\news;
use Illuminate\Http\Request;
use App\Models\back\kategorinews;
use App\Http\Controllers\Controller;

class newsCtrl extends Controller
{
    // handle view
    function index () {
        // respons list data
        $data = [
            "title" => "data news",
            "dtNews" => news::All()
        ];
        return view ('back/news/data',$data);
    }

    function form (Request $req) {
    // add data / edit data
    $data = [
        "title" => "Kategori News Form",
        "dtKat" => kategorinews::All(),
        "rsNews" => news::where("id",$req->id_News)->first()
    ];
    return view('back/news/form',$data);
    }

    function save (Request $req) {
        // create or update

        $req -> validate(
            [
                "news_kd" => "required|max:5",
                "id_kat_news" => "required",
                "title" => "required",
                "tooltip" => "required",
                "url" => "required",
                "desc" => "required",
                "status" => "required",
                "foto"   => "mimes:jpg,jpeg,png|max:3000"
            ],
            [
                "news_kd.required" => "kode news harus di isi",
                "id_kat_news" =>  "kategori harus di pilih",
                "title" => "judul harus di isi",
                "tooltip" => "tooltip harus di isi",
                "url" => "link harus di isi",
                "desc" => "deskripsi harus di isi",
                "status" => "status harus di pilih",
            ]
        );

        // proses upload 
        if($req->file("foto")){
            $fileName = time().'.'.$req->file("foto")->extension();
            $result = $req->file("foto")->move(public_path('back/uploads/news'), $fileName);
            $foto = asset("back/uploads/news/".$fileName);
        } else {
            $foto = $req->input("old_foto");
        }

        // proses simpan

        try {
            news::updateorcreate(
                [
                    "id" => $req->input("id_News")
                ],
                [
                    "news_kd" => $req->input("news_kd"),
                    "id_kat_news" =>$req->input("id_kat_news"),
                    "title" =>$req->input("title"),
                    "tooltip" =>$req->input("tooltip"),
                    "url" =>$req->input("url"),
                    "desc" =>$req->input("desc"),
                    "status"=>$req->input("status"),
                    "foto"=>$req->foto
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

    }

    function delete($id){
        // delete data
        try{
            // save
            news::where("id",$id)->delete();

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
    }
}
