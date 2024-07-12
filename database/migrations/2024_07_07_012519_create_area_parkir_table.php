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
        Schema::create('area_parkir', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 30);
            $table->integer('kapasitas');
            $table->string('keterangan', 45);
            $table->unsignedBigInteger('kampus_id');
            
            $table->foreign('kampus_id')->references('id')->on('kampus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_parkir');
    }
};
