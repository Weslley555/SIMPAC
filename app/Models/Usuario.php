<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios'; // Nome da tabela

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'matricula', 'email', 'senha', 'tipo_usuario'];

    // Desativar timestamps automáticos, se a tabela não os possuir
    public $timestamps = false;

    // Defina a senha como um campo oculto
    protected $hidden = ['senha'];
}
