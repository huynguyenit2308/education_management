<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseIds = DB::table('courses')->pluck('id')->toArray();
        $subjectIds = DB::table('subjects')->pluck('id')->toArray();
        $teacherIds = DB::table('users')->where('role', 'teacher')->pluck('id')->toArray();
        $daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

        foreach ($courseIds as $courseId) {
            foreach ($subjectIds as $subjectId) {
                DB::table('schedules')->insert([
                    'course_id' => $courseId,
                    'subject_id' => $subjectId,
                    'teacher_id' => $teacherIds[array_rand($teacherIds)],
                    'day_of_week' => $daysOfWeek[array_rand($daysOfWeek)],
                    'start_time' => '08:00:00',
                    'end_time' => '10:00:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
