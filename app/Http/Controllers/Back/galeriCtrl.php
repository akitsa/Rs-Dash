<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class galeriCtrl extends Controller
{
    function index() {
        // response list data
        $data = [
            "title" => "data galeri",
            "dtGal" => galeri::All()
        ];
        return view("back/galeri/data",$data);
    }

    function form (Request $req) {
        $data = [
            "title" => "galeri form",
            //"dtKat" => kategorinews::All(),
            "rsNews" => galeri::where("id",$req->id_Gal)->first()
        ];
        return view('back/galeri/form',$data);
    }

    function save (Request $req){
        // validasi
        $req -> validate(
            [
                
            ],
            [

            ]
        );
    }

    function delete($id) {
        
    }
}
