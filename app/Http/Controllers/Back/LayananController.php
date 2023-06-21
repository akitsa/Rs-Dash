<?php

namespace App\Http\Controllers\back;

use Exception;
use App\Models\back\layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LayananController extends Controller
{
    public function index(){
    $data = [
        "title" => "data layanan",
        "dtPel" => layanan::all()
    ];  
    return view ('back/pelayanan/data',$data);
  }
  
    public function form(Request $req){
        $data = [
            "title" => "form layanan",
            "rsPel" => layanan::where("id",$req->id_pel)->first()
        ];
        return view ('back/pelayanan/form',$data);
    }

    public function save(Request $req){
        

        //save data
        $req->validate(
            [
                "title" => "required",
                "konten" => "required"
            ],
            [
                "title.required" => "judul harus di isi",
                "konten.required" => "konten harus di isi",
            ]
        );

        try{
            layanan::updateOrCreate(
                [
                    "id" => $req->input("id_pel")
                ],
                [
                    "title" => $req->input("title"),
                    "slug" => $req->input("slug") ? $req->input("slug") : SlugService::createSlug(layanan::class,"slug",$req->input("title")),
                    "konten" => $req->input("konten"),
                    "status" => $req->input("status")
                ]
            );
            //notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan !"
            ];
            
        }catch(Exception $e){
            $notif = [
                "type" => "danger",
                "text" => "Data gagal di simpan".$e->getMessage()
            ];
        }
        return redirect(url('layanan'))->with($notif);

    }

    public function delete($id){
        try{
            // delete
            layanan::where("id",$id)->delete();
            
            $notif = [
                "type" => "success",
                "text" => "Data berhasil di hapus"
            ];
        }catch(Exception $e){
            $notif = [
                "type" => "warning",
                "text" => "Data gagal di hapus".$e->getMessage()
            ];
        }
        return redirect (url('layanan'))->with($notif);

    }
}
