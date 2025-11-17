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
            $table->string('especialidade')->after('nivel_urgencia')->nullable();
            $table->string('telefone')->after('especialidade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('encaminhamentos', function (Blueprint $table) {
            $table->dropColumn('especialidade');
            $table->dropColumn('telefone');
        });
    }
};
