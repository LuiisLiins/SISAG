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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique()->nullable();;
            $table->string('cpf', 14)->unique();
            $table->string('rg', 20)->nullable();
            $table->string('sexo', 20)->nullable();
            $table->string('cartao_sus', 20)->nullable();
            $table->string('estado_civil', 30)->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('senha');
            $table->enum('tipo', ['paciente', 'agente', 'admin']);
            $table->string('telefone', 20)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->text('endereco')->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cep', 10)->nullable();
            $table->timestamps();

            //pode ter varios encaminhamentos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
