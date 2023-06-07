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
        Schema::create('types_chambres', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->unique();
            $table->string('code')->unique();
            $table->longText('description')->nullable();
            $table->integer('min');
            $table->integer('max');
            $table->integer('enfants');
            $table->integer('adultes');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('prixpersup')->nullable();
            $table->integer('prixlitsup')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types_chambres');
    }
};
