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
        Schema::create('encaminhamento', function (Blueprint $table) {
            $table->id();
            //adicionar data
            //status
            $table->timestamps();
            //ids das unidades de destino e de origem
            //possui uma especialidade
            //possui uma unidade de saude de origem e uma de destino
            //pode ou nao pode ter trasnporte
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encaminhamento');
    }
};
