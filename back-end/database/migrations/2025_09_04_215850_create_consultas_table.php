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
        Schema::create('consultas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('encaminhamento_id')->constrained('encaminhamentos')->onDelete('cascade');
        $table->dateTime('data_hora');
        $table->string('medico');
        $table->string('especialidade');
        $table->enum('status', ['solicitado', 'confirmado', 'recusado', 'realizado', 'faltou'])->default('solicitado');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
