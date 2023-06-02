<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\back\galeri_foto;
use App\Models\back\galeri_video;
use Illuminate\Http\Request;

class HomePostController extends Controller
{
    public function index() {
        $data = [
          "dtImg" =>  galeri_foto::all(),
          //"dtVid" =>  galeri_video::all()
        ];
        return view('front/index',$data);
    }
}
