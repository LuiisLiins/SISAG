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
        Schema::table('encaminhamentos', function (Blueprint $table) {
            $table->time('horario')->nullable()->after('dt_agendamento');
            $table->string('endereco')->nullable()->after('horario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('encaminhamentos', function (Blueprint $table) {
            $table->dropColumn('horario');
            $table->dropColumn('endereco');
        });
    }
};
