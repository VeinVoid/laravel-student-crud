<?php

namespace Database\Seeders;

use App\Models\Kelas;
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
        School::factory(10)->create();
        Kelas::factory(10)->create();
        Student::factory(10)->create();
    }
}
