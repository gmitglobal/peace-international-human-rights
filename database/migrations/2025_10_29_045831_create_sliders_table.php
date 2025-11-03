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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();

            // 🌄 Background image
            $table->string('background_image')->nullable();

            // 🖼️ Logo image (optional)
            $table->string('logo_image')->nullable();

            // 📝 Main text content
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();

            // 🎯 Button 1
            $table->string('button1_text')->nullable();
            $table->string('button1_link')->nullable();

            // 🎯 Button 2
            $table->string('button2_text')->nullable();
            $table->string('button2_link')->nullable();

            // ⚙️ Optional settings
            $table->integer('status')->default(1);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
