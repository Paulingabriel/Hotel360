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
        Schema::create('res_salles', function (Blueprint $table) {
            $table->id();
            $table->date('dateres')->nullable();
            $table->date('datedebut');
            $table->date('datefin');
            $table->foreignId('hotel_id')->nullable()->constrained('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->string('payement')->nullable();
            $table->integer('salles_pr_id')->nullable();
            $table->integer('salles_ps_id')->nullable();
            $table->string('client_id');
            $table->string('salle_id');
            $table->string('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('res_salles');
    }
};
