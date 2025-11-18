<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('name');
            $table->string('mobile');

            // Payment Type
            $table->string('payment_type')->nullable();

            // Amount
            $table->string('real_amount')->nullable();
            $table->string('cal_amount')->nullable();

            // Mobile Banking
            $table->string('payment_account')->nullable();
            $table->string('transaction_last4')->nullable();
            $table->date('pay_date')->nullable();

            // Card Payment
            $table->string('card_account_name')->nullable();
            $table->string('card_account_number')->nullable();
            $table->string('card_trx_id')->nullable();
            $table->string('card_bank_name')->nullable();
            $table->string('card_branch')->nullable();
            $table->date('card_pay_date')->nullable();

            // Address
            $table->foreignId('division_id')->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->constrained()->cascadeOnDelete();
            $table->foreignId('thana_id')->constrained()->cascadeOnDelete();

            // Proof
            $table->string('post_image')->nullable();

            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
