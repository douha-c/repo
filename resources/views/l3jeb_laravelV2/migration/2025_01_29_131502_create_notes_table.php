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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->integer('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreignId('stagiaire_id')->constrained();
            $table->decimal('note', 5, 2); // e.g., 18.50
            // $table->timestamps();
            
            $table->unique(['module_id', 'stagiaire_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
