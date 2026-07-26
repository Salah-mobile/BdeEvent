<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;


Route::controller(LoginController::class)->middleware('guest')->group(function () {
    Route::get('/loginPage', 'showLoginPage')->name('loginPageS');
    Route::post('/loginPage', 'login')->name('loginLogic');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware('student')->group(function () {
        Route::controller(EventController::class)->group(function () {
            Route::get('/DisplayEvents', 'DisplayEvent')->name('displayEvent');
            Route::get('/myTickets/{id}', 'DisplayTicketByUser')->name('myTicket');
        });
        Route::controller(ReservationController::class)->group(function () {
            Route::post('/Reservation', 'ReservePlace')->name('reserve');
        });
    });
    Route::middleware('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dachbordAdmin', 'index')->name('dachbordAdmin');
        });
        Route::controller(EventController::class)->group(function () {
            Route::get('/createEvent', 'CreateEventPage')->name('displayForm');
            Route::post('/createEvent', 'CreateEvent')->name('createEvent');
            Route::get('/UpDateEvent/{id}', 'UpdateEventDisplay')->name('updateES');
            Route::put('/UpDateEvent/{id}', 'UpdateEvent')->name('updateE');
            Route::delete('/deleteEvent/{id}', 'deleteEvent')->name('deleteE');
        });
    });
});
