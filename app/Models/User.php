<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios'; // Nome da tabela no banco de dados

    protected $fillable = [
        'nome',
        'matricula',
        'email',
        'senha',
        'tipo_usuario',
        'identificacao', // Adicione outros campos se necessário
    ];

    protected $hidden = [
        'senha', // Certifique-se de que o campo senha está oculto
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacionamento: Um usuário tem um perfil de aluno
    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
