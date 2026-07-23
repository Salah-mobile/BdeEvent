<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function students(){
        return $this->belongsTo(Student::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
