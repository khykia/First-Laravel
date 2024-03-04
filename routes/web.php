<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Models\Kelas;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "nama" => "Rizkia Khosy Amalia W.",
        "kelas" => "11 PPLG 2",
        "foto" => "images/foto_saya.jpeg"
    ]);
});

Route::group(["prefix"=>"/student"], function() {
    Route::get('/all', [StudentsController::class, 'index'])->name('student.all');
});

Route::group(["prefix"=>"/kelas"], function() {
    Route::get('/all', [KelasController::class, 'index'])->name('kelas.all');
});

Route::group(["prefix" => "/login"], function(){
    Route::get('/index', [AuthController::class,'login'])->name('login.index'); //view
    Route::post('/add', [AuthController::class,'loginStore']); // add data
});

Route::group(["prefix" => "/register"], function(){
    Route::get('/index', [AuthController::class,'register'])->name('register.index'); //view
    Route::post('/add', [AuthController::class,'registerStore']); // add data
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(["prefix" => "/dashboard"], function(){
    Route::group(["prefix" => "/all"], function(){
        Route::get('/all', [DashboardController::class,'all'])->name('dashboard.all.all'); //view
    });
    Route::group(["prefix" => "/student"], function(){
        Route::get('/all', [DashboardController::class,'student'])->name('dashboard.student.all'); //view
        Route::get('/detail/{student}', [DashboardController::class,'studentShow']); //detail
        Route::get('/create', [DashboardController::class,'studentCreate']); //create data
        Route::post('/add', [DashboardController::class,'studentStore']); // add data
        Route::delete('/delete/{student}', [DashboardController::class,'studentDestory']); // delete data
        Route::get('/edit/{student}', [DashboardController::class,'studentEdit']); // provide form edit
        Route::post('/update/{student}', [DashboardController::class,'studentUpdate']); // edit data
    });
    Route::group(["prefix" => "/kelas"], function(){
        Route::get('/all', [DashboardController::class,'kelas'])->name('dashboard.kelas.all'); //view
        Route::get('/detail/{kelas}', [DashboardController::class,'kelasShow']); //detail
        Route::get('/create', [DashboardController::class,'kelasCreate']); //create data
        Route::post('/add', [DashboardController::class,'kelasStore']); // add data
        Route::delete('/delete/{kelas}', [DashboardController::class,'kelasDestory']); // delete data
        Route::get('/edit/{kelas}', [DashboardController::class,'kelasEdit']); // provide form edit
        Route::post('/update/{kelas}', [DashboardController::class,'kelasUpdate']); // edit data
    });
});