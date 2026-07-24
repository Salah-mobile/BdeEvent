<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function(){
     Route::get("/loginPage","showLoginPage")->name("loginPageS");
     Route::post("/loginPage","login")->name('loginLogic');
});
Route::controller(EventController::class)->group(function (){
    Route::get("/DisplayEvents","DisplayEvent")->name("displayEvent");
    Route::get("/myEvents/{id}","DisplayEventByUser")->name("myEvent");
});
Route::controller(ReservationController::class)->group(function(){
    Route::post("/Reservation","ReservePlace")->name('reserve');
});
