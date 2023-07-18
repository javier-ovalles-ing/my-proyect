<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;


Route::view('/','welcome')->name('home');
Route::view('/contact','contact')->name('contact');
Route::view('/about','about')->name('about');
/* 

Route::get('/blog',[PostController::class,'index'])->name('post.index');
Route::get('/blog/create',[PostController::class,'create'])->name('post.create');
Route::post('/blog',[PostController::class,'storage'])->name('post.storage');
Route::get('/blog/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/blog/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::patch('/blog/{post}',[PostController::class,'update'])->name('post.update');
Route::Delete('/blog/{post}',[PostController::class,'destroy'])->name('post.destroy');



Route::view('url','ruta.plantilla.blade.php'); */


Route::resource('blog', PostController::class,[
    'names' => 'post',
    'parameters' => ['blog'=>'post']
]);

Route::view('/login','auth.login')->name('login');

Route::view('/register','auth.register')->name('register');

Route::post('/register',[RegisteredUserController::class,'store']);

Route::post('/login',[AuthenticatedSessionController::class,'store']);

Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');