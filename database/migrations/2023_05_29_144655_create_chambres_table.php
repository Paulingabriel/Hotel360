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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->integer('num');
            $table->boolean('active');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('res_chambre_id')->nullable()->constrained('res_chambres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('types_chambre_id')->constrained('types_chambres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('etage_id')->constrained('etages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};
