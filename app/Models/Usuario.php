<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'rg',
        'sexo',
        'cartao_sus',
        'estado_civil',
        'tipo',
        'senha',
        'telefone',
        'data_nascimento',
        'endereco',
        'cidade',
        'uf',
        'cep',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];
}
