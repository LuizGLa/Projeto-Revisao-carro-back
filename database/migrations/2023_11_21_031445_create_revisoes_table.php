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
        Schema::create('revisoes', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('descricao');
            $table->decimal('valor', 8, 2);
            $table->unsignedBigInteger('carro_id');
            $table->foreign('carro_id')->references('id')->on('carros');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisaos');
    }
};
