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
        'unidade_saude_id',
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

    /**
     * Relacionamento: Um usuário pertence a uma unidade de saúde
     */
    public function unidadeSaude()
    {
        return $this->belongsTo(UnidadesSaude::class, 'unidade_saude_id');
    }

    
    public function encaminhamentos()
    {
        return $this->hasMany(Encaminhamento::class, 'usuario_id');
    }
}
