<?php

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NickController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WheelController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [IndexController::class, 'home']);
Route::get('/dich-vu', [IndexController::class, 'dichvu'])->name('dichvu'); // tất cả dịch vụ về game
Route::get('/dich-vu/{slug}', [IndexController::class, 'dichvucon'])->name('dichvucon'); // dịch vụ con thuộc dịch vụ
Route::get('/danh-muc-game/{slug}', [IndexController::class, 'danhmuc_game'])->name('danhmucgame'); // tất cả danh mục về game
Route::get('/accgame/{slug}', [IndexController::class, 'acc'])->name('danhmuccon');
Route::get('/acc/{ms}', [IndexController::class, 'detail_acc'])->name('acc');
Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');
Route::get('/post/{slug}', [IndexController::class, 'blogs_detail'])->name('blogs_detail');
Route::get('/video-highlight', [IndexController::class, 'video_highlight'])->name('video-highlight');
Route::post('/show_video', [IndexController::class, 'show_video'])->name('show_video');
Route::get('/nap-the', [IndexController::class, 'napthe'])->name('napthe');
//timkiem
Route::post('/tim-kiem', [IndexController::class, 'search']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// category
Route::resource('/category', CategoryController::class);
//accessories
Route::resource('/accessories', AccessoriesController::class);
// Slider
Route::resource('/slider', SliderController::class);
// Blog
Route::resource('/blog', BlogController::class);
//Video
Route::resource('/video', VideoController::class);
//nick
Route::resource('/nick', NickController::class);
//gallery
Route::resource('/gallery', GalleryController::class);
//wheel
Route::resource('/wheel', WheelController::class);


Route::post('/choose_category', [NickController::class, 'choose_category'])->name('choose_category');