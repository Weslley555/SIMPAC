<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // ID do usuário
            $table->string('nome'); // Nome completo
            $table->string('matricula')->nullable(); // Matrícula (opcional para alguns tipos de usuário)
            $table->string('email')->unique(); // Email único
            $table->string('senha'); // Senha
            $table->string('tipo'); // Tipo de usuário (aluno, avaliador, administrador)
            $table->string('identificacao')->nullable(); // Número de identificação (opcional)
            $table->timestamps(); // Timestamps de criação e atualização
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
