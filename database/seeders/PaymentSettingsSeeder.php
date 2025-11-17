<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_settings')->insert([
            [
                'bkash' => '017XXXXXXXX',
                'nagad' => '018XXXXXXXX',
                'rocket' => '019XXXXXXXX',
                'upai' => '017XXXXXXXX',

                'bank_name' => 'Dutch-Bangla Bank',
                'branch_name' => 'Mirpur Branch',
                'account_holder_name' => 'Faisal A. Salam',
                'account_number' => '123456789012',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
