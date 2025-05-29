<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseIds = DB::table('courses')->pluck('id')->toArray();

        foreach ($courseIds as $courseId) {
            foreach (range(1, 3) as $i) {
                DB::table('subjects')->insert([
                    'name' => "Subject $i for Course $courseId",
                    'description' => "Description for subject $i in course $courseId",
                    'course_id' => $courseId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
