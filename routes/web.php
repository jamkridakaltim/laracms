<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Manager\HomeController;

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

Route::get('/', [ WebController::class, 'index' ]);

Route::prefix('sitemanager')->group(function() {

    Route::get('/', [ AuthController::class, 'showFormLogin'])->name('login');
    Route::get('/login', [ AuthController::class, 'showFormLogin'])->name('login');
    Route::post('/login', [ AuthController::class, 'login']);
    Route::get('/register', [ AuthController::class, 'showFormRegister'])->name('register');
    Route::post('/register', [ AuthController::class, 'register']);

    Route::middleware(['auth'])->group(function() {

        Route::get('/', [ HomeController::class, 'index'])->name('sitemanager.index');
        Route::get('/home', function(){
            return redirect()->route('sitemanager.index');
        });
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    });

});
