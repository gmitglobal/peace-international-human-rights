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
        Schema::create('activites', function (Blueprint $table) {
            $table->id();

            // 🔗 Foreign key to users table
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // 🖼️ Content fields
            $table->string('post_image')->nullable();
            $table->string('title')->nullable();
            $table->text('paragraph')->nullable();
            $table->date('date')->nullable(); // use date type instead of string

            // ⚙️ Optional settings
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
