<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function DisplayEvent(){
      $events=Event::with("user")->get();
      return view("student.homePage",["events"=>$events]);
    }
     public function DisplayEventByUser($id){
       $reservation=Reservation::with('event')->where("user_id",$id)->get();
       return view("student.ReservationPage",["reservations"=>$reservation]);
    }
    public function CreateEvent(Request $request){

    }
    public function CreateEventPage(){
        return view()
    }
    public function deleteEvent($id){
        $event=Event::findOrFail($id);
        $event->delete();
        return to_route("dachbordAdmin");
    }
    public function UpdateEvent(){

    }
}
