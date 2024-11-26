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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_classroom')->references('id')->on('classrooms')->onDelete('cascade')->onUpdate('cascade');
            $table->string("nomor_induk");
            $table->string("nama");
            $table->string("nama_wali");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("alamat");
            $table->integer("tahun_masuk");
            $table->string("foto");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
