<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;
class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::create([
            'name' => 'A',
            'teacher_name' => 'Emilly'
        ]);

        Classroom::create([
            'name' => 'B',
            'teacher_name' => 'Emilly'
        ]);
        Classroom::create([
            'name' => 'C',
            'teacher_name' => 'Isebella'
        ]);
    }
}
