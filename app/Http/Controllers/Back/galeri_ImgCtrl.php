<?php

namespace App\Http\Controllers\back;
use App\Models\back\galeri_foto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class galeri_ImgCtrl extends Controller
{
    function index() {
        // response list data
        $data = [
            "title" => "Galeri Image",
            "dtImg" => galeri_foto::All()
        ];
        return view('back.galeri_foto.data',$data);
    }

    function form(Request $req) {
        $data = [
            "title" => "Kategori News Form",
            "rsImg" => galeri_foto::where("id",$req->id_Img)->first()
        ];
   
        return view ('back.galeri_foto.form',$data);
    }

    
    function save(Request $req) {
        // create update
        dd($req);
        $req->validate(
            [
                // validasi
                "kd_img" => "Required |max:5",
                "title" => "Required",
                "desc" => "Required",
                "status" => "Required",
                "foto"   => "mimes:jpg,jpeg,png|max:5000"

            ],
            [
                "kd_img.Required" => "Maaf kode ada",
                "kd_img.max" => "maximal 5 huruf",
                "title.Required" => "title harus di isi",
                "desc.Required" => "Required",
                "status" => "Required",
                "foto.mimes" => "Foto harus .jpg, .jpeg atau png !",
                "foto.max" => "Foto maximal ukuran 1 gb !",
            ]
        );
        

        // proses upload
        if($req->file("foto")){
            $fileName = time().'.'.$req->file("foto")->extension();
            $result = $req->file("foto")->move(public_path('back/uploads/galeri'), $fileName);
            $foto = asset("back/uploads/galeri/".$fileName);
        } else {
            $foto = $req->input("old_foto");
        }

        // proses simpan
        try{
            galeri_foto::updateOrCreate(
                [
                    "id" => $req->input('id_Img')
                ],
                [
                    "title" => $req->input('title'),
                    "desc" => $req->input('desc'),
                    "status" => $req->input('status'),
                    "foto" => $foto,
                ]
            
            );

             // Notif
             $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan !"
            ];
            return view('galeri_foto')->with($notif);

        }catch(Exception $e){
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$e->getMessage()
            ];
            return view ('galeri_foto')->with($notif);
        }

    }

    function delete($id) {

    }
}
