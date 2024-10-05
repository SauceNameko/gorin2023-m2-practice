<?php

use App\Http\Controllers\api\LoginConttoller;
use App\Http\Controllers\api\UserConttoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/admin_store", [UserConttoller::class, "store"])->name("api_store");
Route::post("/admin_check", [LoginConttoller::class, "check"])->name("api_check");
Route::get("/admin_logout", [LoginConttoller::class, "logout"])->name("api_logout");

Route::middleware("auth:sanctum")->group(function () {
    Route::get("/admin_index", [UserConttoller::class, "index"])->name("api_index");
    Route::post("/admin_update", [UserConttoller::class, "update"])->name("api_update");
    Route::get("/admin_destroy", [UserConttoller::class, "destroy"])->name("api_destroy");
});
