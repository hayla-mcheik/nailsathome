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
        Schema::create('hair_at_homes', function (Blueprint $table) {
            $table->id();
            $table->string('category_group'); // e.g., 'Blow Dry', 'Hair Cut', 'Hair Colour'
        $table->string('service_name');
        $table->string('duration')->nullable();
        $table->string('price_standard')->nullable(); // For general prices
        $table->string('price_majirel')->nullable();  // Specific to hair color
        $table->string('price_inoa')->nullable();     // Specific to hair color
        $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hair_at_homes');
    }
};
