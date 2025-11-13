<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('my_roles')->insert([
            ['name' => 'Admin', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Member', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Area Manager', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
