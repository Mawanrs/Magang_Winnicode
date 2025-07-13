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
        Schema::create('hasil_balapans', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('grand_prix');
            $table->year('tahun');
            $table->string('type')->default('Grands Prix');
            $table->string('sesi');
            $table->string('pembalap');
            $table->string('tim');
            $table->integer('posisi');
            $table->string('event')->nullable();
            $table->string('waktu_gap')->nullable();
            $table->boolean('diklasifikasikan')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_balapans');
    }
};
