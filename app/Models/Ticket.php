<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket_code',
        'code_qr'
    ];
    public function reservations(){
        return $this->belongsTo(Reservation::class);
    }
}
