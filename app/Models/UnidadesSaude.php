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
        'email',
    ];

    /**
     * Relacionamento: Uma unidade de saúde pode ter vários usuários
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'unidade_saude_id');
    }
}
