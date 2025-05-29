<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $examIds = DB::table('exams')->pluck('id')->toArray();
        $studentIds = DB::table('users')->where('role', 'student')->pluck('id')->toArray();

        foreach ($examIds as $examId) {
            // Mỗi exam có 5 học sinh ngẫu nhiên thi
            $randomStudents = array_rand(array_flip($studentIds), 5);

            foreach ((array)$randomStudents as $studentId) {
                DB::table('exam_results')->insert([
                    'exam_id' => $examId,
                    'student_id' => $studentId,
                    'score' => rand(50, 100), // điểm ngẫu nhiên từ 50 đến 100
                    'feedback' => 'Good performance.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
