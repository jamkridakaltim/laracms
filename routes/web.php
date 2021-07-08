<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Manager\HomeController;
use App\Http\Controllers\Manager\MenuController;
use App\Http\Controllers\Manager\PageController;
use App\Http\Controllers\Manager\PollingController;
use App\Http\Controllers\Manager\UploadController as FileController;
use App\Http\Controllers\Manager\PostController;
use App\Http\Controllers\Manager\SettingController;
use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\Manager\LinkController;
use App\Http\Controllers\Manager\PostCategoryController;
use App\Http\Controllers\Manager\Gallery\FotoController;
use App\Http\Controllers\Manager\Gallery\VideoController;

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

Route::get('/', [ WebController::class, 'index' ])->name('beranda');

Route::get('beranda', function(){
    return redirect()->route('beranda');
});

Route::get('/post/{post}', [ WebController::class, 'post' ]);
Route::get('/page/{page}', [ WebController::class, 'page' ]);

Route::get('/galeri/foto', [WebController::class, 'foto_page']);
Route::get('/galeri/foto/{foto}', [WebController::class, 'foto_show']);
Route::get('/galeri/video', [WebController::class, 'video_page']);
Route::get('/galeri/video/{video}', [WebController::class, 'video_show']);
Route::get('/contact-us', [WebController::class, 'contact_page']);
Route::post('/contact-us', [WebController::class, 'contact_send'])->name('contact_send');

Route::get('/polling/{polling}', [ WebController::class, 'page_polling' ])->name('polling');
Route::post('/polling', [ WebController::class, 'vote_polling' ])->name('vote-polling');

Route::prefix('sitemanager')->group(function() {

    Route::get('/', [ AuthController::class, 'showFormLogin'])->name('login');
    Route::get('/login', [ AuthController::class, 'showFormLogin'])->name('login');
    Route::post('/login', [ AuthController::class, 'login']);
    Route::get('/register', [ AuthController::class, 'showFormRegister'])->name('register');
    Route::post('/register', [ AuthController::class, 'register']);

    Route::middleware(['auth'])->name('sitemanager.')->group(function() {

        Route::get('/', [ HomeController::class, 'index'])->name('index');
        Route::get('/home', function(){
            return redirect()->route('sitemanager.index');
        });

        Route::resource('menu' ,MenuController::class);
        Route::resource('page' ,PageController::class);
        Route::resource('post' ,PostController::class);
        Route::resource('post-category' ,PostCategoryController::class);
        Route::resource('polling' ,PollingController::class);
        Route::resource('file' ,FileController::class);
        Route::resource('link' ,LinkController::class);
        Route::resource('setting' ,SettingController::class);
        Route::resource('user' ,UserController::class);
        Route::resource('gallery/foto' ,FotoController::class);
        Route::resource('gallery/video' ,VideoController::class);

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    });

});
