<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('idade_mes');
            $table->integer('idade_ano');

            $table->unsignedBigInteger('pettipo_id');
            $table->unsignedBigInteger('cliente_id');

            $table->foreign('pettipo_id')->references('id')->on('pettipos');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
