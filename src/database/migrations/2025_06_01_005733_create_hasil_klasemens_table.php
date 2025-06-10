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
        Schema::create('hasil_klasemens', function (Blueprint $table) {
            $table->id();
            $table->integer('position');
            $table->integer('points');
            $table->string('avatar_url')->nullable();
            $table->string('rider_number');
            $table->string('rider_name');
            $table->string('country_code', 2);
            $table->string('team');
            $table->string('gap_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_klasemens');
    }
};
