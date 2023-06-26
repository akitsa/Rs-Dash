<?php

namespace App\Http\Controllers\back;

use Exception;
use App\Models\back\pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PagesController extends Controller
{
    public function index(){
        $data = [ 
            "title" => "data pages",
            "dtPages" => pages::all(),
        ];
        return view ('back/pages/data',$data);
    }
    public function form(Request $req) {
        $data = [
            "title" => "form pages",
            "dtPages" => pages::where("id",$req->id_pag)->first()
        ];
        return view ('back/pages/form',$data);
    }

    public function save(Request $req) {
        
        // validasi
        $req->validate(
            [
                "title" => "required",
                "konten" => "required",
            ],
            [
                "title.required" => "judul harus di isi",
                "konten.required" => "deskripsi harus di isi"
            ]
        );

        // proses save
        try{
            pages::updateOrCreate(
                [
                    "id" => $req->input("idpag")
                ],
                [
                    "title" => $req->input("title"),
                    "slug" => $req->input("slug") ? $req->input("slug") : SlugService::createSlug(pages::class,"slug",$req->input("title")),
                    "konten" => $req->input("kontent"),
                    "status" => $req->input("status"),
                ]
            );
            // notif 
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan",
            ];

        }catch(Exception $e){
            $notif = [ 
                "type" => "danger",
                "text" => "data gagal di simpan".$e->getMessage() 
            ];
        }
        return redirect (url('pages'))->with($notif);
    }

    public function delete($id){
        try{
            pages::where("id",$id)->delete();
            //notif 
            $notif = [
                "type" => "success", 
                "text" => "data berhasil di hapus"
            ];
        }catch(Exception $e){
            $notif = [
                "type" => "danger",
                "text" => "data gagal di simpan"
            ];           
        }
        return redirect(url('pages'))->with($notif);
    }
}
