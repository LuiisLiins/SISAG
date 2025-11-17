<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    protected $table = 'medicos_especialidades';

    protected $fillable = [
        'nome',
        'especialidade',
        
    ];

    public function encaminhamentos()
    {
        return $this->hasMany(Encaminhamento::class, 'especialidade_id');
    }
}
