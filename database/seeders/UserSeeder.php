<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'       => 'Admin User',
                'refer_id'   => 'REF001',
                'refered_by' => null,
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make('11111111'), // 🔒 encrypted password
                'phone'      => '01312361494',
                'wphone' => '01800000000',
                'father_name' => 'Mr. Rahman',
                'mother_name' => 'Mrs. Rahman',
                'birth_certificate_no' => '19990000001',
                'present_address' => 'Dhaka, Bangladesh',
                'permanent_address' => 'Dhaka, Bangladesh',
                'division' => 'Dhaka',
                'district' => 'Dhaka',
                'thana' => 'Tejgaon',
                'ward' => 'Ward-5',
                'central' => 'Central Office',
                'photo' => 'admin_photo.jpg',
                'nid' => '1234567890',
                'signature' => 'admin_signature.png',
                'count' => 1,
                'role_id' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User',
                'refer_id' => 'REF002',
                'refered_by' => 'REF001',
                'email' => 'user@example.com',
                'password' => Hash::make('11111111'),
                'phone' => '01900000000',
                'wphone' => '01600000000',
                'father_name' => 'Mr. Karim',
                'mother_name' => 'Mrs. Karim',
                'birth_certificate_no' => '19990000002',
                'present_address' => 'Chittagong, Bangladesh',
                'permanent_address' => 'Chittagong, Bangladesh',
                'division' => 'Chittagong',
                'district' => 'Chittagong',
                'thana' => 'Kotwali',
                'ward' => 'Ward-7',
                'central' => 'Regional Office',
                'photo' => 'user_photo.jpg',
                'nid' => '9876543210',
                'signature' => 'user_signature.png',
                'count' => 0,
                'role_id' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
