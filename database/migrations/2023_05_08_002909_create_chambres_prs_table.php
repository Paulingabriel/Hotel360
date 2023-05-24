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
        Schema::create('chambres_prs', function (Blueprint $table) {
            $table->id();
            $table->double('prixsieste');
            $table->double('prixheure');
            $table->double('prixnuitee');
            $table->foreignId('types_chambre_id')->constrained('types_chambres')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres_prs');
    }
};
