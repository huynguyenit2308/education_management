<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '0123456789',
            'address' => '123 Admin Street',
            'birthday' => '1980-01-01',
            'gender' => 'male',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach (range(1, 5) as $i) {
            DB::table('users')->insert([
                'name' => 'Teacher ' . $i,
                'email' => "teacher$i@example.com",
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'phone' => '098765432' . $i,
                'address' => "Teacher $i Street",
                'birthday' => '1985-05-1' . $i,
                'gender' => $i % 2 === 0 ? 'female' : 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(1, 20) as $i) {
            DB::table('users')->insert([
                'name' => 'Student ' . $i,
                'email' => "student$i@example.com",
                'password' => Hash::make('password'),
                'role' => 'student',
                'phone' => '091234567' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'address' => "Student $i Street",
                'birthday' => '2000-07-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'gender' => $i % 3 === 0 ? 'other' : ($i % 2 === 0 ? 'female' : 'male'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
