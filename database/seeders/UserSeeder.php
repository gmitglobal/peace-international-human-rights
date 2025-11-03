<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('11111111'), // Change later for security
            'phone' => '01312361494',
            'wphone' => '01800000000',
            'father_name' => 'Abdul Karim',
            'mother_name' => 'Rokeya Begum',
            'birth_certificate_no' => '1234567890',
            'present_address' => 'Dhanmondi, Dhaka',
            'permanent_address' => 'Chittagong',
            'division' => 'Dhaka',
            'district' => 'Dhaka',
            'thana' => 'Dhanmondi',
            'ward' => '5',
            'central' => 'Central Office',
            'photo' => 'photos/admin.jpg',
            'nid' => 'nid/admin_nid.jpg',
            'signature' => 'signatures/admin_sign.png',
            'role' => 'admin',
            'status' => 1,
        ]);

        // Create 5 random members
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Member {$i}",
                'email' => "member{$i}@example.com",
                'password' => Hash::make('123456'),
                'phone' => "0190000000{$i}",
                'wphone' => null,
                'father_name' => "Father {$i}",
                'mother_name' => "Mother {$i}",
                'birth_certificate_no' => Str::random(10),
                'present_address' => "Area {$i}, Dhaka",
                'permanent_address' => "Village {$i}, Bangladesh",
                'division' => 'Dhaka',
                'district' => 'Dhaka',
                'thana' => 'Tejgaon',
                'ward' => (string)rand(1, 10),
                'central' => 'Local Office',
                'photo' => "photos/member{$i}.jpg",
                'nid' => "nid/member{$i}.jpg",
                'signature' => "signatures/member{$i}.png",
                'role' => 'member',
                'status' => 1,
            ]);
        }
    }
}
