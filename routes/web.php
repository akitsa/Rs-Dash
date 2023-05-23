<?php


use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\back\galeriCtrl;
use App\Http\Controllers\back\authCtrl;
use App\Http\Controllers\back\newsCtrl;
use App\Http\Controllers\back\KatNewsCtrl;
use App\Http\Controllers\back\profileCtrl;
use App\Http\Controllers\back\galeri_ImgCtrl;
use App\Http\Controllers\back\galeri_vidCtrl;

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
// Route::get('/', function () {
//     return view('back.layouts.template');
// });

   // back end area
route::group(["middleware"=>"auth"],function(){
route::get('/admin',function (){
    return view('back.Layouts.template');
});
            
        // kategori news
Route::get("kategorinews",[KatNewsCtrl::class,'index']);
Route::get("kategorinews/form/{id_Kat?}",[KatNewsCtrl::class,'form']);
Route::get("delete/delete{id_Kat}",[KatNewsCtrl::class,'delete']);
Route::post("kategorinews/save",[KatNewsCtrl::class,'save']);

        // news
route::get("news",[newsCtrl::class,'index']);
route::get("news/form/{id_news?}",[newsCtrl::class,'form']);
route::get("news/delete/{id_news}",[newsCtrl::class,'delete']);
route::post("news/save",[newsCtrl::class,'save']);

// galerifoto
route::get("galeri_foto",[galeri_ImgCtrl::class,'index']);
Route::get("galeri_foto/form/{id_Img?}",[galeri_ImgCtrl::class,'form']);
Route::get("galeri_foto/delete/{id_Img}",[galeri_ImgCtrl::class,'delete']);
Route::post("galeri_foto/save",[galeri_ImgCtrl::class,'save']);

// galeri video
route::get("galeri_video",[galeri_vidCtrl::class,'index']);
route::get("galeri_video/form/{id_vid?}",[galeri_vidCtrl::class,'form']);
Route::get("galeri_video/delete/{id_vid}",[galeri_vidCtrl::class,'delete']);
Route::post("galeri_video/save",[galeri_vidCtrl::class,'save']);

//profile
route::get("profile",[profileCtrl::class,'index']);
route::get("profile/form/{id_prof?}",[profileCtrl::class,'form']);
route::get("profile/form/{id_prof}",[profileCtrl::class,'delete']);
route::post("profile/save",[profileCtrl::class,'save']);

  // Auth Logout hanya bisa di akses jika sudah login
  Route::get("auth/logout",[authCtrl::class,"logout"])->name("signout"); // Dengan nama route   

});
// auth

Route::get("auth/login",[authCtrl::class,"login"])->name("login"); // Dengan nama route
Route::post("auth/login",[authCtrl::class,"cek_login"]);
Route::get("auth/register",[authCtrl::class,"registrasi"])->name("signup"); // Dengan nama route
Route::post("auth/register",[authCtrl::class,"save_registrasi"]);