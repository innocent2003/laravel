<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
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
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::get('/ListInfoProduct',[DataController::class,'index'])->name('upload.form');
// Route::post('/upload',[DataController::class,'index'])->name('upload.media');
Route::get('/add1',[DataController::class,'createView']);
Route::post('/add',[DataController::class,'create'])->name('addMedia');
Route::get("/login",[UserController::class,'login']);
Route::get("/register",[UserController::class,'register']);
Route::post("/login",[UserController::class,'loginUser'])->name('login-user');
Route::post("/register-user",[UserController::class,'registerUser'])->name('register-user');
Route::get("/comment/{id}",[DataController::class,'find']);
Route::post("/postComment",[CommentController::class,'create']);
Route::view("upload","upload");
Route::post('upload-advanced', [UploadController::class,'upload']);
Route::get("/cart/{id}",[CartController::class,'index']);
Route::post("/order",[CartController::class,'store']);
Route::get('/cartList',[CartController::class,'show']);

Route::view("AddData","AddData");
// Route::view("Approve","Admin.Approve");
Route::view("Comments","User.Comments");
// Route::view("ListInfoProduct","User.ListInfoProduct");
// Route::view("PageApprove","Admin.PageApprove");
// Route::view("PagePay","User.PagePay");
Route::view("Approve1","Approve");
Route::get('/PageApprove',[DataController::class,'Approve']);
Route::get('/Approve/{id}',[DataController::class,'Show']);
Route::put('/Approve/{id}/update-is-active', [DataController::class, 'update'])->name('data.updateIsActive');
Route::get('/', [DataController::class, 'ListProductInfo']);
Route::get("/PagePay/{id}",[DataController::class,'comment']);



