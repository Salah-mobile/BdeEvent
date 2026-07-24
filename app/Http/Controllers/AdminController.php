<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $events = Event::where("created_by", auth()->id())->get();
        $totalReservations = 0;
        foreach ($events as $event) {
            $totalReservations += Reservation::where("event_id", $event->id)->count();
        }
        return view("admin.dachbordA",["events"=>$events,"totalReservations"=>$totalReservations,"totalEvents"=>count($events)]);
    }
}
