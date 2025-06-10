<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        Student::factory(20)->create();
=======
        Student::factory(10)->create();
>>>>>>> eb03e6a0018e1423252c151cf8834bc4e681a600
    }
}
