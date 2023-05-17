<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\newsCtrl;
//use App\Http\Controllers\back\galeriCtrl;
use App\Http\Controllers\back\KatNewsCtrl;
use App\Http\Controllers\back\galeri_ImgCtrl;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// front end next game 
Route::get('/', function () {
    return view('back.layouts.template');
});
            // back end area
        // kategori news
Route::get("kategorinews",[KatNewsCtrl::class,'index']);
Route::get("kategorinews/form/{id_Kat?}",[KatNewsCtrl::class,'form']);
//Route::get("delete");
Route::post("kategorinews/save",[KatNewsCtrl::class,'save']);

        // news
route::get("news",[newsCtrl::class,'index']);
route::get("news/form/{id_news?}",[newsCtrl::class,'form']);
route::get("news/delete/{id_news}",[newsCtrl::class,'delete']);
route::post("news/save",[newsCtrl::class,'save']);

// galeri
route::get("galeri_foto",[galeri_ImgCtrl::class,'index']);
Route::get("galeri_foto/form/{id_Img?}",[galeri_ImgCtrl::class,'form']);
Route::post("galeri_foto/save",[galeri_ImgCtrl::class,'save']);