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
        Schema::create('rapors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_santri')->references('id')->on('santris')->onDelete('cascade')->onUpdate('cascade');
            $table->enum("semester", ["1", "2"]);
            $table->string("tahun_ajaran");
            $table->double("jumlah_nilai")->default(0);
            $table->double("rata_rata_nilai")->default(0);
            $table->integer("peringkat")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapors');
    }
};
