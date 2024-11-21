<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvaliadorIdToTrabalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabalhos', function (Blueprint $table) {
            $table->unsignedBigInteger('avaliador_id')->nullable()->after('id');

            // Se você quiser adicionar uma chave estrangeira
            $table->foreign('avaliador_id')->references('id')->on('avaliadores')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabalhos', function (Blueprint $table) {
            $table->dropForeign(['avaliador_id']);
            $table->dropColumn('avaliador_id');
        });
    }
}