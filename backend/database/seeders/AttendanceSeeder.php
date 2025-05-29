<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentIds = DB::table('users')->where('role', 'student')->pluck('id')->toArray();
        $subjectIds = DB::table('subjects')->pluck('id')->toArray();
        $statuses = ['present', 'absent', 'late'];

        foreach ($studentIds as $studentId) {
            foreach ($subjectIds as $subjectId) {
                DB::table('attendances')->insert([
                    'student_id' => $studentId,
                    'subject_id' => $subjectId,
                    'date' => now()->subDays(rand(1, 30))->toDateString(),
                    'status' => $statuses[array_rand($statuses)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
