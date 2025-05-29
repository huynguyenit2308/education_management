<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Tạo 20 tin nhắn ngẫu nhiên giữa các user
        for ($i = 0; $i < 20; $i++) {
            // Chọn ngẫu nhiên sender và receiver khác nhau
            do {
                $senderId = $userIds[array_rand($userIds)];
                $receiverId = $userIds[array_rand($userIds)];
            } while ($senderId === $receiverId);

            DB::table('messages')->insert([
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,
                'message' => "Sample message $i from user $senderId to user $receiverId.",
                'sent_at' => now()->subMinutes(rand(1, 1000)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
