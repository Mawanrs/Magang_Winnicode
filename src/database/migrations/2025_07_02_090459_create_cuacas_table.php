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
        Schema::create('cuacas', function (Blueprint $table) {
            $table->id();
            $table->string('cuaca');           
            $table->string('suhu_udara');      
            $table->string('kondisi_lintasan');
            $table->string('kelembapan');                
            $table->string('suhu_tanah');     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuacas');
    }
};
