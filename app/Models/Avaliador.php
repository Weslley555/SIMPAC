<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliador extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'matricula', 'email', 'senha']; // Campos que podem ser preenchidos
}
