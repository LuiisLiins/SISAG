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
        Schema::create('encaminhamentos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade');
        $table->foreignId('unidade_id')->constrained('unidades_saude');
        $table->string('especialidade_id');
        $table->date('dt_solicitacao');
        $table->date('dt_agendamento');
        $table->enum('nivel_urgencia', ['eletivo', 'prioritario', 'urgente', 'emergente']);
        $table->text('observacoes')->nullable();
        $table->enum('status', ['Pendente', 'Concluído', 'Perdido'])->default('Pendente');
        $table->timestamps();
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
