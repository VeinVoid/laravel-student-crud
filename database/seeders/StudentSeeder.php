<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Kelas;
use App\Models\Province;
use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::factory(10)->create();
        City::factory(10)->create();
        School::factory(10)->create();
        Kelas::factory(10)->create();
        Student::factory(10)->create();
    }
}
