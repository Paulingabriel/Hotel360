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
        Schema::create('res_chambres', function (Blueprint $table) {
            $table->id();
            $table->date('dateres')->nullable();
            $table->integer('occ')->nullable();
            $table->date('datedebut')->nullable();
            $table->date('datefin')->nullable();
            $table->string('option');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('adultes')->nullable();
            $table->integer('enfants')->nullable();
            $table->string('payement')->nullable();
            $table->integer('chambres_pr_id')->nullable();
            $table->integer('chambres_ps_id')->nullable();
            $table->string('client_id');
            $table->string('chambre_id');
            $table->string('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('res_chambres');
    }
};
