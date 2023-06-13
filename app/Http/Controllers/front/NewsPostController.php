<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\back\kategorinews;
use App\Models\back\news;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public Function index (Request $request) {
        $data = [
            "dtKat" => kategorinews::all(),
            "dtNews" => news::all()
        ];
        return view('front/berita/berita',$data);
    }

    public function show (Request $id){

    }
}
