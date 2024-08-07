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
        Schema::create('kelas_mapels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_classroom')->references('id')->on('classrooms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_mapel')->references('id')->on('mapels')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_mapels');
    }
};
