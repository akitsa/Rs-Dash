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
        
        $req->validate(
            [
                // validasi
               
                "title" => "Required",
                "desc" => "Required",
                "status" => "Required",
                "foto"   => "mimes:jpg,jpeg,png|max:5000"

            ],
            [
             
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
            $result = $req->file("foto")->move(public_path('back/uploads/galeri/images'), $fileName);
            $foto = asset("back/uploads/galeri/images/".$fileName);
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
                    "id_gal_img"=>$req->input('id_gal_img'),
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
            

        }catch(Exception $e){
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$e->getMessage()
            ];
        }
        return redirect('galeri_foto')->with($notif);

    }

    function delete($id) {
        try{
            // save
            galeri_foto::where("id",$id)->delete();

            // notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Dihapus !"
            ];
        }catch(Exception $e){   
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$e->getMessage()
            ];
        }
        return redirect(url('galeri_foto'))->with($notif);
    }
}

