<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjectIds = DB::table('subjects')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        foreach ($subjectIds as $subjectId) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('documents')->insert([
                    'title' => "Document $i for Subject $subjectId",
                    'subject_id' => $subjectId,
                    'file_path' => "documents/subject_{$subjectId}_doc{$i}.pdf",
                    'uploaded_by' => $userIds[array_rand($userIds)],
                    'uploaded_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
