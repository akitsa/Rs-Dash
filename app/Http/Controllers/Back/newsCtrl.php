<?php

namespace App\Http\Controllers\back;

use PDOException;
use App\Models\back\news;
use Illuminate\Support\Str;
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
        "title" => "News Form",
        "dtKat" => kategorinews::All(),
        "rsNews" => news::where("id",$req->id_news)->first()
    ];
    return view('back/news/form',$data);
    }

    function save (Request $req) {
        // create or update
        //dd($req->all());
        $req->validate(
            [
                //"news_kd" => "required|max:5",
                "id_kat_news" => "required",
                "title" => "required",
                "tooltip" => "required",
                "url" => "required",
                "desc" => "required",
                "status" => "required",
                "foto"   => "mimes:jpg,jpeg,png|max:3000"
            ],
            [
                //"news_kd.required" => "kode news harus di isi",
                //"news_kd.max" => "maximal 5 digit",
                "id_kat_news.required" =>  "kategori harus di pilih",
                "title.required" => "judul harus di isi",
                "tooltip.required" => "tooltip harus di isi",
                "url.required" => "link harus di isi",
                "desc.required" => "deskripsi harus di isi",
                "status.required" => "status harus di pilih",
                "foto.mimes" => "Foto harus .jpg, .jpeg atau png !",
                "foto.max" => "foto maximal 3000mb",

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
            //save
            news::updateOrCreate(
                [
                    "id" => $req->input("id_news")
                ],
                [
                    //"news_kd" => $req->input("news_kd"),
                    "id_kat_news" =>$req->input("id_kat_news"),
                    "title" =>$req->input("title"),
                    "tooltip" =>Str::slug($req->title,'-'),
                    "url" =>$req->input("url"),
                    "desc" =>$req->input("desc"),
                    "status"=>$req->input("status"),
                    "foto"=>$foto,
                ]
            );
            //notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan !"
            ];
            
           
        } catch(PDOException $e){
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$e->getMessage()
            ];
        }
        return redirect (url("news"))->with($notif);
    }

    function delete($id){
        // delete data
        try{
            // save
            news::where("id",$id)->delete();

            // notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Dihapus !"
            ];
        }catch(PDOException $e){   
            $notif = [
                "type" => "danger",
                "text" => "Data Gagal Dihapus !".$e->getMessage()
            ];
        }
        return redirect(url('news'))->with($notif);
    }

    
}
