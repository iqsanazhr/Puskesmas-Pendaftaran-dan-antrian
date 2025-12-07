<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poly;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@puskesmas.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Polies
        $poliUmum = Poly::create(['name' => 'Poli Umum', 'description' => 'Layanan kesehatan umum']);
        $poliGigi = Poly::create(['name' => 'Poli Gigi', 'description' => 'Layanan kesehatan gigi']);
        $poliKIA = Poly::create(['name' => 'Poli KIA', 'description' => 'Kesehatan Ibu dan Anak']);

        // Create Doctors (Users + Doctor Profile)
        $doc1 = User::create([
            'name' => 'Dr. Budi Santoso',
            'email' => 'budi@puskesmas.com',
            'password' => Hash::make('password'),
            'role' => 'doctor',
        ]);
        Doctor::create(['user_id' => $doc1->id, 'poly_id' => $poliUmum->id, 'specialization' => 'Umum']);

        $doc2 = User::create([
            'name' => 'Dr. Siti Aminah',
            'email' => 'siti@puskesmas.com',
            'password' => Hash::make('password'),
            'role' => 'doctor',
        ]);
        Doctor::create(['user_id' => $doc2->id, 'poly_id' => $poliGigi->id, 'specialization' => 'Gigi']);

        // Create Schedules
        Schedule::create(['doctor_id' => 1, 'day' => 'Senin', 'start_time' => '08:00', 'end_time' => '14:00']);
        Schedule::create(['doctor_id' => 2, 'day' => 'Senin', 'start_time' => '08:00', 'end_time' => '14:00']);
    }
}
