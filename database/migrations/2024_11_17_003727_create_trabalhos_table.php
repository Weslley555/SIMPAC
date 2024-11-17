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
        // Criação da tabela 'trabalhos'
        Schema::create('trabalhos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('responsavel_id')->constrained('alunos')->onDelete('cascade');  // Responsável
            $table->string('titulo');
            $table->text('descricao');
            $table->string('modelo_avaliativo');  // Novo campo
            $table->string('arquivo')->nullable();
            $table->timestamps();
        });

        // Criação da tabela de membros do trabalho (relacionamento N:N)
        Schema::create('membro_trabalho', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trabalho_id')->constrained('trabalhos')->onDelete('cascade');
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabalhos');
        Schema::dropIfExists('membro_trabalho');
    }
};
