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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();

            // 🔗 Foreign key to users table
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // 🖼️ Content fields
            $table->date('date')->nullable(); // use date type instead of string
            $table->string('title')->nullable();
            $table->string('amount')->nullable();
            $table->text('description')->nullable();
            $table->string('post_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
