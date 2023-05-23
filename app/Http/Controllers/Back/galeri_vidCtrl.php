<?php

namespace App\Http\Controllers\back;

use App\Models\back\galeri_video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class galeri_vidCtrl extends Controller
{
    function index () {
        // response list data
        $data = [
            "title" => "Data Galeri Video",
            "dtVid" => galeri_video::All()
        ];
        return view ('back.galeri_video.data',$data);
    }

    function form (Request $req) {
        //form edit dan tambah data
        $data = [
            "title" => "Form Galeri Video",
            "rsVid" => galeri_video::where("id",$req->id_Vid)->first()
        ];
        return view ('back.galeri_video.form',$data);
    }

    function save (Request $req) {
        // create or update
         //dd($req->all());
        $req->validate(
            [
                "id_gal_vid" => "Required |max:5",
                "title" => "Required",
                "desc" => "Required",
                "status" => "Required",
                "video"   => "mimes:mp4,mov,ogg,3gp"
            ],
            [
                "id_gal_vid.Required" => "Maaf kode ada",
                "id_gal_vid.max" => "maximal 5 huruf",
                "title.Required" => "title harus di isi",
                "desc.Required" => "Required",
                "status" => "Required",
                "video.mimes" => "Video harus mp4, mov, ogg, 3gp !",
                // "video.max" => "Video maximal ukuran 5k !",
            ]
        );
        
         // proses upload
        if($req->file("video")){
            $fileName = time().'.'.$req->file("video")->extension();
            $result = $req->file("video")->move(public_path('back/uploads/galeri/video'), $fileName);
            $video = asset("back/uploads/galeri/video/".$fileName);
        } else {
            $video = $req->input("old_foto");
        }
         // proses simpan
        try{
            galeri_video::updateOrCreate(
                [
                    "id" => $req->input('id_Vid')
                ],
                [  
                    "id_gal_vid"=>$req->input('id_gal_video'),
                    "title" => $req->input('title'),
                    "desc" => $req->input('desc'),
                    "status" => $req->input('status'),
                    "video" => $video,
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
        return redirect('galeri_video')->with($notif);

    }

    function delete($id) {
        try{
            // save
            galeri_video::where("id",$id)->delete();

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
        return redirect(url('galeri_foto'))->with($notif);
    }
}

