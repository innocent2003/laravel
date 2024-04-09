<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[DataController::class,'index'])->name('upload.form');
// Route::post('/upload',[DataController::class,'index'])->name('upload.media');
Route::get('/add1',[DataController::class,'createView']);
Route::post('/add',[DataController::class,'create'])->name('addMedia');
Route::get("/login",[UserController::class,'login']);
Route::get("/register",[UserController::class,'register']);
Route::post("/login",[UserController::class,'loginUser'])->name('login-user');
Route::post("/register-user",[UserController::class,'registerUser'])->name('register-user');
Route::get("/comment/{id}",[DataController::class,'find']);
Route::post("/postComment",[CommentController::class,'create']);
