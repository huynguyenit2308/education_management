<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacherIds = DB::table('users')->where('role', 'teacher')->pluck('id')->toArray();

        foreach (range(1, 5) as $i) {
            DB::table('courses')->insert([
                'title' => "Course Title $i",
                'description' => "This is the description for course $i.",
                'teacher_id' => $teacherIds[array_rand($teacherIds)],
                'start_date' => now()->addDays($i)->toDateString(),
                'end_date' => now()->addDays(30 + $i)->toDateString(),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
