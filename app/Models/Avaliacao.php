<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;
    protected $table = 'avaliacoes';

    protected $fillable = [
        'trabalho_id',
        'avaliador_id',
        'criterio1',
        'criterio2',
        'criterio3',
        'criterio4',
        'criterio5',
        'nota_final',
        'situacao',
    ];

    public function trabalho()
    {
        return $this->belongsTo(Trabalho::class);
    }

    public function avaliador()
    {
        return $this->belongsTo(Avaliador::class);
    }
}