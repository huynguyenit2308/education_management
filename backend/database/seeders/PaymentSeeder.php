<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentIds = DB::table('users')->where('role', 'student')->pluck('id')->toArray();
        $courseIds = DB::table('courses')->pluck('id')->toArray();
        $methods = ['cash', 'momo', 'vnpay'];
        $statuses = ['success', 'failed', 'pending'];

        foreach ($studentIds as $studentId) {
            // Mỗi student thanh toán 1-2 khóa học ngẫu nhiên
            $randomCourses = (array) array_rand(array_flip($courseIds), rand(1, 2));

            foreach ($randomCourses as $courseId) {
                DB::table('payments')->insert([
                    'student_id' => $studentId,
                    'course_id' => $courseId,
                    'amount' => rand(100, 500) * 1000, // ví dụ: 100k - 500k
                    'method' => $methods[array_rand($methods)],
                    'status' => $statuses[array_rand($statuses)],
                    'transaction_date' => now()->subDays(rand(0, 30)),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
