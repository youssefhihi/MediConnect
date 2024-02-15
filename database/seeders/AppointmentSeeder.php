<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
    $bookingTimes = [
        '8:00',
        '9:00',
        '10:00',
        '11:00',
        '2:00',
        '3:00',
        '4:00',
        '5:00',
    ];

    
    foreach ($bookingTimes as $time) {
        DB::table('appointments')->insert([
            'booking_time' => $time,
            'date' => now(),
            'doctor_id' => 1,
            'status' => 0,
        ]);
    }
    }
 }
