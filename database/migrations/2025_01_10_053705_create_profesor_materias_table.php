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
        Schema::create('profesor_materias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idProfesor");
            $table->unsignedBigInteger("idMateria");
            $table->foreign("idProfesor")->references("id")->on("profesors");
            $table->foreign("idMateria")->references("id")->on("materias");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_materias');
    }
};
