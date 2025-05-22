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
            $table->string('tag_name')->nullable();
            $table->string('name')->nullable();
            $table->string('flag_image')->nullable();
            $table->string('flag_name')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('team')->nullable();
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
