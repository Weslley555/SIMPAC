<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    // Defina as propriedades do modelo, como fillable ou guarded, conforme necessário.
    protected $fillable = ['name', 'email', 'created_at']; // Exemplo
}
