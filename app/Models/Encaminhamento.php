<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encaminhamento extends Model
{
    use HasFactory;

    protected $table = 'encaminhamentos';

    protected $fillable = [
        'paciente_id',
        'unidade_id',
        'especialidade',
        'nivel_urgencia',
        'observacoes',
        'status'
    ];

    public function paciente()
    {
        return $this->belongsTo(paciente::class, 'paciente_id');
    }

    public function unidade()
    {
        return $this->belongsTo(UnidadesSaude::class, 'unidade_id');
    }
}
