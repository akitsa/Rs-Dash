<?php

namespace App\Http\Controllers\back;

use PDOException;
use Illuminate\Http\Request;
use App\Models\back\kategorinews;
use App\Http\Controllers\Controller;

use function PHPSTORM_META\map;

class KatNewsCtrl extends Controller
{
    public function index () {
        // response list data
        $data = [
            "title" => "Kategori News",
            "dtKat" => kategorinews::All()
        ];
        return view ("back/kategorinews/data",$data);
    }

    public function create (Request $request) {
        // menambah atau menghapus data
        $data = [
            "title" => "Kategori News Form",
            "rsKat" => kategorinews::where("id",$request->id_kat)->first()
        ];
        return view('back/kategorinews/form',$data);

    }

      public function store (Request $request) {
        // create or update
        //dd($request->all());
        $request->validate(
            [
                "nm_kat" => "required|max:30",
               //"desc" => "required",
                "foto"   => "mimes:jpg,jpeg,png",
                "status_kat" => "required"
            ],
            [
                "nm_kat.required"=> "Wajib Di isi",
                //"desc.required" => "Deskripsi Wajib Di isi",
                "foto.mimes" => "Foto harus .jpg, .jpeg atau png !", 
                "nm_kat.max"=> "Maximal 30 karakter",
                "status_kat.required" => "wajib di pilih"

            ]
        );
        // proses upload
        if($request->file("foto")){
            $fileName = time().'.'.$request->file("foto")->extension();
            $result = $request->file("foto")->move(public_path('back/uploads/kategorinews/images'), $fileName);
            $foto = asset("back/uploads/kategorinews/images/".$fileName);
        } else {
            $foto = $request->input("old_foto");
        }

        try {
            // save
            kategorinews::updateOrCreate(
                [
                    "id" => $request->input("id_kat")
                ],
                [
                    "nm_kat" => $request->input("nm_kat"),
                    "desc" => $request->input('desc'),
                    "foto" => $foto,
                    "status_kat" => $request->input('status_kat')

                ]
            );
            
            //notifikasi
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan"
            ];

        } catch (PDOException $err) {
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$err->getmessage()
            ];
        }
        return redirect (url("kategorinews"))->with($notif);
    }

        function destroy($id){
            try{
                kategorinews::where("id",$id)->delete();

                $notif = [
                    "type" => "success",
                    "text" => "data berhasil di hapus",
                ];
            } catch(PDOException $e){
                $notif = [
                    "type" => "danger",
                    "text" => "data gagal di hapus".$e->getMessage()
                ];
            }
            return redirect(url("kategorinews"))->with($notif);
        }
        
}

     



