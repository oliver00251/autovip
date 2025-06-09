<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'codigo_filial',
        'cpf',
        'nome',
        'permissao',
        'email',
    ];
}
