<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjectIds = DB::table('subjects')->pluck('id')->toArray();

        foreach ($subjectIds as $subjectId) {
            foreach (range(1, 2) as $i) {
                DB::table('exams')->insert([
                    'subject_id' => $subjectId,
                    'title' => "Exam $i for Subject $subjectId",
                    'date' => now()->addDays($i)->toDateTimeString(),
                    'duration' => 90, // 90 phút
                    'max_score' => 100,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
