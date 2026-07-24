<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function(){
     Route::get("/loginPage","showLoginPage")->name("loginPageS");
     Route::post("/loginPage","login")->name('loginLogic');
     Route::post("/logout","logout")->name("logout");
});
Route::controller(EventController::class)->group(function (){
    Route::get("/DisplayEvents","DisplayEvent")->name("displayEvent");
    Route::get("/myEvents/{id}","DisplayEventByUser")->name("myEvent");
    Route::delete("/deleteEvent/{id}","deleteEvent")->name('deleteE');
    Route::get("/createEvent","CreateEventPage")->name("displayForm");
    Route::post("/createEvent","CreateEvent")->name("createEvent");
    Route::get("/UpDateEvent/{id}","UpdateEventDisplay")->name("updateES");
    Route::put("/UpDateEvent/{id}","UpdateEvent")->name("updateE");
});
Route::controller(ReservationController::class)->group(function(){
    Route::post("/Reservation","ReservePlace")->name('reserve');
});
Route::controller(AdminController::class)->group(function(){
    Route::get("/dachbordAdmin","index")->name("dachbordAdmin");
});
