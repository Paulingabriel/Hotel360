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
        Schema::create('chambres_ps', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('types_chambre_id')->constrained('types_chambres')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date1');
            $table->date('date2');
            $table->double('prixsieste');
            $table->double('prixheure');
            $table->double('prixnuitee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres_ps');
    }
};
