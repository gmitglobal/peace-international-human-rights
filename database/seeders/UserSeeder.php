<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // User 1
            [
                'name' => 'Faisal Salam',
                'refer_id' => '1000',
                'refered_by' => null,
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('11111111'),

                'phone' => '01312361494',
                'wphone' => '01822222222',
                'father_name' => 'Mr. Father',
                'mother_name' => 'Mrs. Mother',
                'birth_certificate_no' => '0123456789',

                'present_address' => 'Halishahar, Chattogram',
                'permanent_address' => 'Chattogram, Bangladesh',
                'division' => 'Chattogram',
                'district' => 'Chattogram',
                'thana' => 'Halishahar',
                'ward' => '5',
                'central' => 'East Zone',

                'photo' => 'photos/default.png',
                'nid' => '987654321',
                'signature' => 'signatures/default.png',
                'count' => 0,
                'role_id' => 1,
                'membership' => 'Member',
                'membership_amount' => 500,
                'status' => 1,

                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // User 2
            [
                'name' => 'Rahim Uddin',
                'refer_id' => '1001',
                'refered_by' => '1000',
                'email' => 'rahim@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('rahim12345'),

                'phone' => '01999999999',
                'wphone' => '01633333333',
                'father_name' => 'Mr. Karim',
                'mother_name' => 'Mrs. Fatema',
                'birth_certificate_no' => '987654321',

                'present_address' => 'Agrabad, Chattogram',
                'permanent_address' => 'Cumilla, Bangladesh',
                'division' => 'Chattogram',
                'district' => 'Cumilla',
                'thana' => 'Kotwali',
                'ward' => '12',
                'central' => 'South Zone',

                'photo' => 'photos/default2.png',
                'nid' => '1122334455',
                'signature' => 'signatures/default2.png',
                'count' => 5,
                'role_id' => 2,
                'membership' => 'Life Member',
                'membership_amount' => 300,
                'status' => 1,

                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
