<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Aluno extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'email',
        'matricula',
        'senha',
    ];

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function trabalhos()
    {
        return $this->belongsToMany(Trabalho::class, 'trabalho_membro', 'aluno_id', 'trabalho_id');
    }

}
