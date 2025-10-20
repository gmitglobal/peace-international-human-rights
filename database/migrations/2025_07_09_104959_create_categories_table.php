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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    ## Main heading or text
            $table->string('slug')->unique();          ## Main heading or text
            $table->string('image')->nullable();       ## Path to main WebP image (required)
            $table->string('thumb_image')->nullable(); ## Path to thumbnail WebP image
            $table->boolean('status')->default(1);     ## Show/hide slider
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
