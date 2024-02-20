<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Models\Extracurriculars;
use App\Http\Controllers\ExtracurricularsController;
use App\Models\Kelas;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello', function() {
    return "Hello World!";
});

Route::get('/', function() {
    return view('home', [
        "title" => "home",
    ]);
})->name("home");

Route::get('/about', function() {
    return view('about', [
        "title" => "about",
        "foto" => "images/profile.jpg"
    ]);
});

Route::get('/extracurricular', [ExtracurricularsController::class, 'index']);

Route::group(["prefix" => "/student"], function() {
    Route::get('/all', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/filter/{kelas_id}', [StudentsController::class, 'filter'])->name('filter');
    // Route::get('/create', [StudentsController::class, 'create']);
    // Route::post('/add', [StudentsController::class, 'store']);
    // Route::delete('/delete/{student}', [StudentsController::class, 'destroy']);
    // Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    // Route::post('update/{student}', [StudentsController::class, 'update']);
});

Route::group(["prefix" => "kelas"], function() {
    Route::get('/all', [KelasController::class, 'index']);
    // Route::get('/create', [KelasController::class, 'create']);
    // Route::post('/add', [KelasController::class, 'store']);
    // Route::delete('/delete/{kelas}', [KelasController::class, 'destroy']);
    // Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    // Route::post('update/{kelas}', [KelasController::class, 'update']);
});

Route::get("/login", [AuthController::class, 'login'])->name("login")->middleware("guest");
Route::post("/login", [AuthController::class, 'auth']);
Route::post("/logout", [AuthController::class, 'logout']);
Route::get("/register", [AuthController::class, 'register'])->middleware("guest");
Route::post("/register", [AuthController::class, 'store']);

Route::group(["prefix" => "/dashboard"], function() {
    Route::get("/", [DashboardController::class, 'index'])->middleware("auth");

    Route::group(["prefix" => "/student"], function() {
        Route::get('/all', [DashboardController::class, 'student'])->middleware("auth");
        Route::get('/detail/{student}', [StudentsController::class, 'show'])->middleware("auth");
        Route::get('/create', [StudentsController::class, 'create'])->middleware("auth");
        Route::post('/add', [StudentsController::class, 'store'])->middleware("auth");
        Route::delete('/delete/{student}', [StudentsController::class, 'destroy'])->middleware("auth");
        Route::get('/edit/{student}', [StudentsController::class, 'edit'])->middleware("auth"); 
        Route::post('update/{student}', [StudentsController::class, 'update'])->middleware("auth");
        Route::get('/filter/{kelas_id}', [DashboardController::class, 'filter'])->name('filter_students');
    });

    Route::group(["prefix" => "kelas"], function() {
        Route::get('/all', [DashboardController::class, 'kelas'])->middleware("auth");
        Route::get('/create', [KelasController::class, 'create'])->middleware("auth");
        Route::post('/add', [KelasController::class, 'store'])->middleware("auth");
        Route::delete('/delete/{kelas}', [KelasController::class, 'destroy'])->middleware("auth");
        Route::get('/edit/{kelas}', [KelasController::class, 'edit'])->middleware("auth");
        Route::post('update/{kelas}', [KelasController::class, 'update'])->middleware("auth");
    });
    
    // Route::get('/about', function() {
    //     return view('about', [
    //         "title" => "about",
    //         "foto" => "images/profile.jpg"
    //     ]);
    // })->middleware("auth");
});