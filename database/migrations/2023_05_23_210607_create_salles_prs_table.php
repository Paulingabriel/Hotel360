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
        Schema::create('salles_prs', function (Blueprint $table) {
            $table->id();
            $table->double('prix');
            $table->foreignId('types_salle_id')->constrained('types_salles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('salle_id')->constrained('salles')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salle_prs');
    }
};
