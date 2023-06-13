<?php

namespace App\Http\Controllers\back;

use PDOException;
use Illuminate\Http\Request;
use App\Models\back\galeri_video;
use App\Http\Controllers\Controller;

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
            "rsVid" => galeri_video::where("id", $req->id_vid)->first()
        ];
        return view ('back.galeri_video.form',$data);
    }

    function save (Request $req) {
        // create or update
         //dd($req->all());
        $req->validate(
            [
              
                "title" => "Required",
                "desc" => "Required",
                "status" => "Required",
                "video"   => "mimes:mp4,mov,ogg,3gp"
            ],
            [
               
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
            $video = $req->input("old_video");
        }
         // proses simpan
        try{
            galeri_video::updateOrCreate(
                [
                    "id" => $req->input('id_vid')
                ],
                [                  
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
            

        }catch(PDOException $e){
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
        }catch(PDOException $e){   
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$e->getMessage()
            ];
        }
        return redirect(url('galeri_foto'))->with($notif);
    }
}

