<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'matriculation', 'user_id']; // Adicionando user_id

    // Relacionamento: Cada aluno pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
