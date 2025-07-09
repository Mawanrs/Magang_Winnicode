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
        Schema::create('klasemen_tims', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('pembalap');
            $table->string('tim');
            $table->integer('poin');
            $table->integer('posisi');
            $table->string('gap')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasemen_tims');
    }
};
