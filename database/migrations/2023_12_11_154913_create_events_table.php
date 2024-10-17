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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->dateTime('data_ora');
            $table->text('descriere');
            $table->string('locatie');
            $table->integer('nr_bilete');
            $table->text('agenda');
            $table->string('afis');
            $table->string('contact');
            $table->string('speaker');
            $table->string('parteneri');
            $table->string('sponsori');
            $table->integer('pret');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
