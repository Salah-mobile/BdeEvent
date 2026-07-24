<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        "reserved_at",
        "user_id",
        "event_id"
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
