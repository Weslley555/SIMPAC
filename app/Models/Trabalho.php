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
    ];

    // Relacionamento com o responsável (Aluno)
    public function responsavel()
    {
        return $this->belongsTo(Aluno::class, 'responsavel_id');
    }

    // Relacionamento com membros (muitos-para-muitos)
    public function membros()
    {
        return $this->belongsToMany(Aluno::class, 'membro_trabalho', 'trabalho_id', 'aluno_id');
    }

    // Relacionamento com avaliadores
    public function avaliador()
    {
        return $this->belongsTo(Avaliador::class, 'avaliador_id'); // Assumindo que você tem um modelo Avaliador
    }
}
