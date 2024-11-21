<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabalho extends Model
{
    use HasFactory;

    protected $fillable = [
        'responsavel_id',
        'titulo',
        'descricao',
        'modelo_avaliativo',
        'arquivo',
        'avaliador_id',
        'status',
    ];

    public function responsavel()
    {
        return $this->belongsTo(Aluno::class, 'responsavel_id');
    }

    public function avaliador()
    {
        return $this->belongsTo(Avaliador::class, 'avaliador_id');
    }

    public function avaliacao()
    {
        return $this->hasOne(Avaliacao::class, 'trabalho_id');
    }

    public function membros()
    {
        return $this->belongsToMany(Aluno::class, 'trabalho_membro', 'trabalho_id', 'aluno_id');
    }
}