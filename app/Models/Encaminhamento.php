<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encaminhamento extends Model
{
    use HasFactory;

    protected $table = 'encaminhamentos';

    protected $fillable = [
        'usuario_id',
        'unidade_id',
        'especialidade_id',
        'dt_solicitacao',
        'dt_agendamento',
        'nivel_urgencia',
        'observacoes',
        'status'
    ];

    public function usuarioa()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function unidade()
    {
        return $this->belongsTo(UnidadesSaude::class, 'unidade_id');
    }

    public function especialidade()
    {
        return $this->belongsTo(Especialidades::class,'especialidade_id');
    }
}
