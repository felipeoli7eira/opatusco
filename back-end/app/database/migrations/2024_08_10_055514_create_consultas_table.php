<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data');
            $table->enum('periodo', ['am', 'pm']);
            $table->string('sintomas');

            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('pet_id');

            $table->foreign('medico_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('users');
            $table->foreign('pet_id')->references('id')->on('pets');

            $table->enum('status', ['solicitada', 'agendada', 'finalizada'])->default('solicitada');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
