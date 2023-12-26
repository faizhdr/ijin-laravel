<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DMController;
use App\Http\Controllers\PPLController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\SantriController;



// Route::get('/', function () {
//     return view('pages.santri.form');
// });

use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTransferController;

Route::get('/',[LayoutController::class, 'index'])->middleware('auth');
Route::get('/home',[LayoutController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function(){

    Route::group(['middleware' => ['direktur']], function(){

        Route::resource('posts', PostController::class);
    
        Route::get('/whatsapp', [WhatsappController::class, 'index']);

        Route::get('/filter', [PostController::class, 'filter']);

        Route::get('/filterppl', [PPLController::class, 'filter']);

        Route::get('/filterdm', [DMController::class, 'filter']);

        Route::resource('admin', AdminController::class);

        Route::resource('ppl_class', PPLController::class);

        Route::resource('dm_class', DMController::class);

        //Dashboard
        Route::resource('main', DashboardController::class);
    });

    Route::group(['middleware' => ['dosen']], function(){
        Route::resource('posts', PostController::class);

        Route::resource('ppl_class', PPLController::class);

        Route::resource('dm_class', DMController::class);

        Route::get('/filterppl', [PPLController::class, 'filter']);

        Route::get('/filterdm', [DMController::class, 'filter']);

    });

    Route::group(['middleware' => ['santri']], function(){


        Route::get('/show', [SantriController::class, 'show']);

        Route::get('/form', [SantriController::class, 'create']);

    });

    Route::group(['middleware' => ['user-access']], function(){

    });
});

// Route::middleware(['auth'])->group(function () {

//     Route::get('/', [SantriController::class, 'index']);

//     Route::get('/show', [SantriController::class, 'show']);

//     Route::get('/form', [SantriController::class, 'create']);

//     Route::resource('posts', PostController::class);
    
//     Route::get('/whatsapp', [WhatsappController::class, 'index']);

//     Route::get('/filter', [PostController::class, 'filter']);

//     Route::get('/filterppl', [PPLController::class, 'filter']);

//     Route::get('/filterdm', [DMController::class, 'filter']);

//     Route::resource('admin', AdminController::class);

//     Route::resource('ppl_class', PPLController::class);

//     Route::resource('dm_class', DMController::class);

//     //Dashboard
//     Route::resource('main', DashboardController::class);
// });
