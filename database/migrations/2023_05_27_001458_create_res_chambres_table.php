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
            $table->dateTime('dateres')->nullable();
            $table->integer('occ')->nullable();
            $table->date('datedebut')->nullable();
            $table->date('datefin')->nullable();
            $table->string('option');
            $table->foreignId('hotel_id')->nullable()->constrained('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('chambre_id')->nullable()->constrained('chambres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('client_id')->nullable()->constrained('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('adultes')->nullable();
            $table->integer('enfants')->nullable();
            $table->string('payement')->nullable();
            $table->integer('chambres_pr_id')->nullable();
            $table->integer('total')->nullable();
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
