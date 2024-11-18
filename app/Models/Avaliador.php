<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Avaliador extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'avaliadores';

    protected $fillable = [
        'nome', 'email', 'senha', 'area_de_atuacao',
    ];

    protected $hidden = [
        'senha',
    ];
}