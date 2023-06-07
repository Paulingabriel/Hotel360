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
        Schema::create('salles_ps', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('types_salle_id')->constrained('types_salles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('salle_id')->constrained('salles')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date1');
            $table->date('date2');
            $table->double('prix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salle_ps');
    }
};
