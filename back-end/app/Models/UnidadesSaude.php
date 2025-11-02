<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadesSaude extends Model
{
    protected $table = 'unidades_saude';

    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
    ];
}
