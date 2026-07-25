<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function DisplayEvent(){
      $events=Event::with("user")->get();
      return view("student.homePage",["events"=>$events]);
    }
     public function DisplayTicketByUser($id){
      $Tickets = Ticket::whereHas('reservation', function ($q) use($id) {
            $q->where('user_id', $id);
        })->get();
       return view("student.TicketPage",["tickets"=>$Tickets]);
    }
    public function CreateEvent(Request $request){
        $request->validate([
            "title"=>"required",
            "place"=>"required",
            "date"=>"required",
            "heure"=>"required",
            "price"=>"required",
            "places_limite"=>"required",
            "description"=>"required",
        ]);
        Event::create([
            "title"=>$request->title,
            "place"=>$request->place,
            "date"=>$request->date,
            "heure"=>$request->heure,
            "price"=>$request->price,
            "places_limite"=>$request->places_limite,
            "description"=>$request->description,
            "created_by"=>auth()->user()->id,
        ]);
        return to_route("dachbordAdmin");
    }
    public function CreateEventPage(){
        return view("admin.EventForm");
    }

    public function deleteEvent($id){
        $event=Event::findOrFail($id);
        $event->delete();
        return to_route("dachbordAdmin");
    }
    public function UpdateEvent(Request $request,$id){
        $request->validate([
            "title"=>"required",
            "place"=>"required",
            "date"=>"required",
            "heure"=>"required",
            "price"=>"required",
            "description"=>"required",
        ]);
        $event=Event::findOrFail($id);
        $event->update([
            "title"=>$request->title,
            "place"=>$request->place,
            "date"=>$request->date,
            "heure"=>$request->heure,
            "price"=>$request->price,
            "description"=>$request->description,
        ]);
        return to_route("dachbordAdmin");
    }
    public function UpdateEventDisplay($id){
       $event=Event::where("id",$id)->first();
       return view("admin.EventForm",["event"=>$event]);
    }
}
