<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensAula extends Model
{
    use HasFactory;
    protected $table = 'itens_aula';  

    protected $fillable = [
        'plano_aula_id',
        'titulo',
        'descricao',
        'ordem',
    ];

    public function planoAula()
    {
        return $this->belongsTo(PlanoAula::class);
    }
}
