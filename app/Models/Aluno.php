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

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }
}
