<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table = 'transporte';

    protected $fillable = [
        'motorista',
        'placa_veiculo',
    ];
}
