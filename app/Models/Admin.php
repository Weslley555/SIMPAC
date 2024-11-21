<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;



class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'senha']; // Campos que podem ser preenchidos


    // Mutator para hashear a senha

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }

    public function username()
    {
        return 'email';  // Usando matrícula para login
    }
}
