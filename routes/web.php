<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\newsCtrl;
use App\Http\Controllers\back\KatNewsCtrl;

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

Route::post("kategorinews/save",[KatNewsCtrl::class,'save']);

        // news
route::get("news",[newsCtrl::class,'index']);
route::get("news/form/",[newsCtrl::class,'form']);
route::post("news/save",[newsCtrl::class,'save']);
