<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('vuehome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vuehome', [App\Http\Controllers\HomeController::class, 'vue_content'])->name('vuehome');


Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/create-post', [PostController::class, 'createPost'])->name('create-post');
Route::post('save-post', [PostController::class, "savePost"]);
Route::get('postlist', [PostController::class, "vue_list"]);
Route::get('ckeditor/upload',[PostController::class,'store'])->name('ckeditor.upload');

