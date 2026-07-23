<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
