<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Certifique-se de importar essa classe
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins'; // Nome da tabela no banco de dados
    protected $fillable = ['nome', 'email', 'senha']; // Campos que podem ser preenchidos
    protected $hidden = ['senha']; // Ocultar senha ao serializar o modelo

    // Renomear o atributo senha para password
    public function setPasswordAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }
}
