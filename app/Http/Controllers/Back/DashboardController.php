<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\galeri_foto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            "title" => "dashboard",
            "dtImg" => galeri_foto::all()
        ];
        return view('back/dashboard',$data);
    }
}
