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
        Schema::create('event__entitites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEvent');
            $table->enum('tip',['sponsor','speaker','partener']);
            $table->string('nume');
            $table->timestamps();
            $table->foreign('idEvent')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event__entitites');
    }
};
