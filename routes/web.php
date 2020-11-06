<?php

use App\Mail\ConfigMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|-----------------------------------    ---------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('confirmPage',function (){
   return view('confirmPage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/image-upload', [App\Http\Controllers\ImageUploadController::class, 'imageUpload'])->name('image');

Route::post('/image-upload', [App\Http\Controllers\ImageUploadController::class, 'imageUploadPost'])->name('image.upload.post');

Route::get('/email', function (){
    Mail::to('kamil.adamisin@gmail.com')->send(new ConfigMail());
});

Route::get('/gallery',[App\Http\Controllers\ImageUploadController::class, 'getImages'])->name('gallery');

Route::get('/myImages/{name}',[App\Http\Controllers\ImageUploadController::class, 'myImages']);

Route::get('/deleteImage/{id}/{name}',[App\Http\Controllers\ImageUploadController::class, 'delete']);

Route::get('/image/{imageID}',[App\Http\Controllers\ImageUploadController::class, 'showImage']);
