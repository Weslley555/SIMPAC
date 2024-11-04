<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliador extends Model
{
    use HasFactory;
    
    protected $table = 'avaliadores';

    protected $fillable = ['nome', 'email', 'senha', 'area_de_atuacao']; // Adicionando senha e area_de_atuacao
}
