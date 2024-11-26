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
        Schema::create('kepribadians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->references('id')->on('kategori_kepribadians')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sub_indikator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepribadians');
    }
};
