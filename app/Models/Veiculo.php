<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
     protected $fillable = [
        'placa',
        'renavam',
        'marca',
        'modelo',
        'ano',
        'cor',
        'status',
        'chassi',
        'combustivel',
        'observacoes',
    ];
}
