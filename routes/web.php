<?php



//use App\Http\Controllers\back\galeriCtrl;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\authCtrl;
use App\Http\Controllers\back\DashboardController;
use App\Http\Controllers\back\newsCtrl;
use App\Http\Controllers\back\KatNewsCtrl;
use App\Http\Controllers\back\profileCtrl;
use App\Http\Controllers\back\galeri_ImgCtrl;
use App\Http\Controllers\back\galeri_vidCtrl;
use App\Http\Controllers\back\LayananController;
use App\Http\Controllers\back\PagesController;
use App\Http\Controllers\front\HomePostController;
use App\Http\Controllers\front\LayananPostController;
use App\Http\Controllers\front\NewsPostController;

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


// front end area 
Route::get('/',[HomePostController::class,'index']);

// berita
Route::get('berita',[NewsPostController::class,'index']);
Route::get('berita/{slug}.html',[NewsPostController::class,'single'])->name("single_news");

// layanan
Route::get('ugd',[LayananPostController::class,'index1']);
Route::get('rawatjalan',[LayananPostController::class,'index2']);
Route::get('rawatinap',[LayananPostController::class,'index3']);

// profil
//Route::get('profil',[])


   // back end area
Route::group(["middleware"=>"auth"],function(){
Route::get('/admin',[DashboardController::class,'index']);



  // kategori news
Route::group(["middleware"=>"RoleAdmin"],function(){   
      Route::get("kategorinews",[KatNewsCtrl::class,'index']);
      Route::get("kategorinews/form/{id_kat?}",[KatNewsCtrl::class,'create']);
      Route::get("kategorinews/delete/{id_kat}",[KatNewsCtrl::class,"destroy"]);
      Route::post("kategorinews/save",[KatNewsCtrl::class,'store']);
});

// route news
Route::group(["middleware"=>"RoleAdmin"],function(){ 
route::get("news",[newsCtrl::class,'index']); 
route::get("news/form/{id_news?}",[newsCtrl::class,'form']);
route::get("news/delete/{id_news}",[newsCtrl::class,'delete']);
route::post("news/save",[newsCtrl::class,'save']);
});

// route foto
route::group(["middleware"=>"RoleAdmin"],function(){
route::get("galeri_foto",[galeri_ImgCtrl::class,'index']);
Route::get("galeri_foto/form/{id_img?}",[galeri_ImgCtrl::class,'form']);
Route::get("galeri_foto/delete/{id_img}",[galeri_ImgCtrl::class,'delete']);
Route::post("galeri_foto/save",[galeri_ImgCtrl::class,'save']);
});

// galeri video
route::group(["middleware"=>"RoleAdmin"],function(){
route::get("galeri_video",[galeri_vidCtrl::class,'index']);
route::get("galeri_video/form/{id_vid?}",[galeri_vidCtrl::class,'form']);
Route::get("galeri_video/delete/{id_vid}",[galeri_vidCtrl::class,'delete']);
Route::post("galeri_video/save",[galeri_vidCtrl::class,'save']);
});

//profile
route::group(["middleware"=>"RoleAdmin"],function(){
route::get("profile",[profileCtrl::class,'index']);
route::get("profile/form/{id_per?}",[profileCtrl::class,'form']);
route::get("profile/delete/{id_per}",[profileCtrl::class,'delete']);
route::post("profile/save",[profileCtrl::class,'save']);
});

// layanan
route::group(["middleware"=>"RoleAdmin"],function(){
route::get("layanan",[LayananController::class,'index']);
route::get("layanan/form/{id_lay?}",[LayananController::class,'form']);
route::get("layanan/delete/{id_lay}",[LayananController::class,'delete']);
route::post("layanan/save",[LayananController::class,'save']);
});

// pages 
route::group(["middleware"=>"RoleAdmin"],function(){
  route::get("pages",[PagesController::class,'index']);
  route::get("pages/form/{id_pag?}",[PagesController::class,'form']);
  route::get("pages/delete/{id_pag}",[PagesController::class,'delete']);
  route::post("pages/save",[PagesController::class,'save']);
  });


  // Auth Logout hanya bisa di akses jika sudah login
  Route::get("auth/logout",[authCtrl::class,"logout"])->name("signout"); // Dengan nama route   

});
// auth

Route::get("auth/login",[authCtrl::class,"login"])->name("login"); // Dengan nama route
Route::post("auth/login",[authCtrl::class,"cek_login"]);
Route::get("auth/register",[authCtrl::class,"registrasi"])->name("signup"); // Dengan nama route
Route::post("auth/register",[authCtrl::class,"save_registrasi"]);