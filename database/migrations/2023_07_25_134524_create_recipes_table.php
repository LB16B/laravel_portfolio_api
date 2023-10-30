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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('time')->nullable();
            $table->integer('price')->nullable();
            $table->string('filename')->nullable();
            $table->foreignId('category_age_id')->default(1)->constrained()->cascadeOnDelete()->after('id');
            $table->foreignId('category_food_id')->default(1)->constrained()->cascadeOnDelete()->after('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
