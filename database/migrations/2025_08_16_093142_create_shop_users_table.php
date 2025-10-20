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
        Schema::create('shop_users', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('role', ['manager', 'cashier', 'staff'])->default('staff');

            $table->string('image')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();

            $table->unique(['shop_id', 'user_id']); // no duplicate assignment
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_users');
    }
};
