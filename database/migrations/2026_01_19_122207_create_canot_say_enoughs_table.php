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
        Schema::create('canot_say_enoughs', function (Blueprint $table) {
            $table->id();
                    $table->string('title');        // e.g., "The Classic Scrub"
    $table->string('subtitle');     // e.g., "Pamper Your Hands"
    $table->text('description');
    $table->string('duration');     // e.g., "45 mins"
    $table->decimal('price', 8, 2); // e.g., 130
    $table->string('image')->nullable();
    $table->boolean('advance_booking')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canot_say_enoughs');
    }
};
