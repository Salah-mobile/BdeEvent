<?php

namespace App;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;

class ReservationChecker
{

    public function __construct()
    {
        //
    }
    public function PeutReserver(Event $event,User $student){
        $reservation=Reservation::has("event")->where("event_id",$event->id)
        ->where("user_id",$student->id)->first();
        if(!$reservation){
            $event=FindOrFail($event);
            if($event->places_limite >= 1){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
