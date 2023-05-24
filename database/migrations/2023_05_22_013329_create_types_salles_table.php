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
        Schema::create('types_salles', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->unique();
            $table->string('code')->unique();
            $table->integer('min');
            $table->integer('max');
            $table->string('image');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types_salles');
    }
};