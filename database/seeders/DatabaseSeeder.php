<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::create([
        'name' => 'salah',
        'lastName' => 'Tabit',
        'email' => 'admin@bde.com',
        'password' => Hash::make('password123'),
        'role_id' => 1,
    ]);

    User::create([
        'name' => 'kahlil',
        'lastName' => 'tabit',
        'email' => 'student@bde.com',
        'password' => Hash::make('student123'),
        'role_id' => 2,
    ]);
    }
}
