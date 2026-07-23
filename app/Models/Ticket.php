<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function reservations(){
        return $this->belongsTo(Reservation::class);
    }
}
