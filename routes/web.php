<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PPLController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\DMController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



// Route::get('/', function () {
//     return view('pages.santri.form');
// });

use App\Http\Controllers\DataTransferController;

Route::middleware(['auth'])->group(function () {

    Route::get('/', [SantriController::class, 'index']);

    Route::get('/show', [SantriController::class, 'show']);

    Route::get('/form', [SantriController::class, 'create']);

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

require __DIR__ . '/auth.php';
