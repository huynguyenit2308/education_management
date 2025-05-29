<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentIds = DB::table('users')->where('role', 'student')->pluck('id')->toArray();
        $courseIds = DB::table('courses')->pluck('id')->toArray();

        foreach ($studentIds as $studentId) {
            // Mỗi học sinh đăng ký 2 khóa học ngẫu nhiên
            $randomCourses = array_rand(array_flip($courseIds), 2);

            foreach ((array) $randomCourses as $courseId) {
                DB::table('enrollments')->insert([
                    'user_id' => $studentId,
                    'course_id' => $courseId,
                    'enrolled_at' => now(),
                    'status' => 'enrolled',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
