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
        Schema::create('detail_mapels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mapel')->references('id')->on('mapels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_rapor')->references('id')->on('rapors')->onDelete('cascade')->onUpdate('cascade');
            $table->double("nilai")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_mapels');
    }
};
