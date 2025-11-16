<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    protected $fillable = [
        'encaminhamento_id',
        'data_hora',
        'medico',
        'especialidade', 
        'status'
    ];

    public function encaminhamento()
    {
        return $this->belongsTo(Encaminhamento::class, 'encaminhamento_id');
    }
}
