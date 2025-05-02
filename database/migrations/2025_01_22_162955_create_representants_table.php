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
        Schema::create('representants', function (Blueprint $table) {
            $table->id('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('grade');
            $table->unsignedBigInteger('module_id')->nullable();
            $table->foreign('module_id')->references('id')->on('module');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representants');
    }
};
