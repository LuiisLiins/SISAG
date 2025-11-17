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
        Schema::table('usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_saude_id')->nullable()->after('tipo');
            $table->foreign('unidade_saude_id')
                  ->references('id')
                  ->on('unidades_saude')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropForeign(['unidade_saude_id']);
            $table->dropColumn('unidade_saude_id');
        });
    }
};
