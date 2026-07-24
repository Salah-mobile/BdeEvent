<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function ReservePlace(Request $request){
    $reserve=Reservation::where("user_id",auth()->id())->where("event_id",$request->event_id)->first();
    if(!$reserve){
        Reservation::create([
            "user_id"=>auth()->id(),
            "event_id"=>$request->event_id,
            "reserved_at"=>now(),
        ]);
        return to_route("displayEvent");
    }else{
        $reserve->delete();
        return to_route("displayEvent");
    }
    }
}
