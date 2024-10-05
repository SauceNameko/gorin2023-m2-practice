<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserConttoller;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/admin", [LoginController::class, "login"])->name("login");
Route::post("/admin", [LoginController::class, "check"])->name("check");
Route::middleware("permission")->group(function () {
    Route::get("/admin/logout", [LoginController::class, "logout"])->name("logout");
    Route::get("/admin/user/", [UserConttoller::class, "index"])->name("dashboard");
    Route::get("/admin/user/create", [UserConttoller::class, "create"])->name("user_create");
    Route::post("/admin/user/store", [UserConttoller::class, "store"])->name("user_store");
    Route::get("/admin/user/edit/{id}", [UserConttoller::class, "edit"])->name("user_edit");
    Route::post("/admin/user/update/{id}", [UserConttoller::class, "update"])->name("user_update");
    Route::get("/admin/user/destroy/{id}", [UserConttoller::class, "destroy"])->name("user_destroy");
});
