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
        Schema::create('detail_kepribadians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kepribadian')->references('id')->on('kepribadians')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_rapor')->references('id')->on('rapors')->onDelete('cascade')->onUpdate('cascade');
            $table->char('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kepribadians');
    }
};
