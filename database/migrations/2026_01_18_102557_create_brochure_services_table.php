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
        Schema::create('brochure_services', function (Blueprint $table) {
            $table->id();
            $table->string('category_type'); // 'nails', 'massage', 'waxing', 'hair'
        $table->string('theme_color');   // 'dark', 'grey', 'orange', 'gold'
        $table->string('side_title');    // 'Gorgeous Nails', 'What You Knead?'
        $table->string('section_title'); // 'Technicals', 'Massage Therapy'
        $table->string('title');         // 'Acrylic Full Set'
        $table->text('description')->nullable();
        $table->string('duration')->nullable();
        $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brochure_services');
    }
};
