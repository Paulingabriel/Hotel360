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
        Schema::create('salles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('num');
            $table->foreignId('hotel_id')->nullable()->constrained('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('res_salle_id')->nullable()->constrained('res_salles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('types_salle_id')->constrained('types_salles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('etage_id')->constrained('etages')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salles');
    }
};
