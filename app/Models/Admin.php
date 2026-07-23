<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    public function events(){
        return $this->hasMany(User::class);
    }
}
