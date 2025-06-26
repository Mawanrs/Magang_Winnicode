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
        Schema::create('pembalaps', function (Blueprint $table) {
            $table->id();
            $table->string('rider_number');
            $table->string('rider_name');
            $table->string('team');
            $table->string('flag_image')->nullable();  
            $table->string('avatar_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembalaps');
    }
};
