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
        Schema::table('transporte', function (Blueprint $table) {
            $table->time('horario_saida')->nullable()->after('placa_veiculo');
            $table->date('data_saida')->nullable()->after('horario_saida');
            $table->string('tipo_veiculo')->nullable()->after('data_saida');
            $table->text('observacoes')->nullable()->after('tipo_veiculo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transporte', function (Blueprint $table) {
            $table->dropColumn(['horario_saida', 'data_saida', 'tipo_veiculo', 'observacoes']);
        });
    }
};
