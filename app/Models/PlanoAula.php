<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoAula extends Model
{
    use HasFactory;
     protected $fillable = ['titulo']; // libera o título para mass assignment

    // relacionamento com itens (se tiver)
    public function itens()
    {
        return $this->hasMany(ItensAula::class);
    }
}
