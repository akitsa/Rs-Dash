<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananPostController extends Controller
{
    public function index1(){
      return view ('front/layanan/igd');
    }

    public function index2(){
        return view('front/layanan/jalan');
    }
}
