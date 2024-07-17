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
        Schema::create('kabags', function (Blueprint $table) {
            $table->unsignedBigInteger('departemen_id')->nullable();
            $table->foreign('departemen_id')->references('id')->on('departemens');
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->Integer('aktif')->default(1);
            $table->timestamps();
        });
        Schema::dropIfExists('hrds');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabags');
    }
};
