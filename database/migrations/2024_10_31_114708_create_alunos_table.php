<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('alunos', function (Blueprint $table) {
        $table->id();
        $table->string('nome'); // Alterar para 'nome'
        $table->string('email')->unique();
        $table->string('matricula')->unique();
        $table->string('senha'); // Adicione a coluna 'senha'
        $table->timestamps(); // Isso já cria as colunas created_at e updated_at
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
