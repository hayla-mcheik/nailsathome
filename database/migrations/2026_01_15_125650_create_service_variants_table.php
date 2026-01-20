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
        Schema::create('service_variants', function (Blueprint $table) {
            $table->id();
                $table->foreignId('service_id')->constrained()->cascadeOnDelete();
    $table->string('title')->nullable(); // e.g. "Short Hair", "Medium", "Full Body"
    $table->integer('duration')->nullable(); // minutes
    $table->decimal('price', 8, 2)->nullable();
    $table->decimal('price_secondary', 8, 2)->nullable(); // for M/L pricing
    $table->string('unit')->nullable(); // per nail, per finger, per session
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_variants');
    }
};
