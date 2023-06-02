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
use App\Http\Controllers\front\HomePostController;

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
Route::get('/',[HomePostController::class,'index']);

   // back end area
Route::group(["middleware"=>"auth"],function(){
Route::get('/admin',[DashboardController::class,'index']);


// page
        // kategori news
Route::group(["middleware"=>"RoleAdmin"],function(){   
      Route::get("kategorinews",[KatNewsCtrl::class,'index']);
      Route::get("kategorinews/form/{id_kat?}",[KatNewsCtrl::class,'form']);
      Route::get("kategorinews/delete/{id_kat}",[KatNewsCtrl::class,"delete"]);
      Route::post("kategorinews/save",[KatNewsCtrl::class,'save']);
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
Route::get("galeri_foto/form/{id_Img?}",[galeri_ImgCtrl::class,'form']);
Route::get("galeri_foto/delete/{id_Img}",[galeri_ImgCtrl::class,'delete']);
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
route::get("profile/form/{id_prof?}",[profileCtrl::class,'form']);
route::get("profile/form/{id_prof}",[profileCtrl::class,'delete']);
route::post("profile/save",[profileCtrl::class,'save']);
});

  // Auth Logout hanya bisa di akses jika sudah login
  Route::get("auth/logout",[authCtrl::class,"logout"])->name("signout"); // Dengan nama route   

});
// auth

Route::get("auth/login",[authCtrl::class,"login"])->name("login"); // Dengan nama route
Route::post("auth/login",[authCtrl::class,"cek_login"]);
Route::get("auth/register",[authCtrl::class,"registrasi"])->name("signup"); // Dengan nama route
Route::post("auth/register",[authCtrl::class,"save_registrasi"]);