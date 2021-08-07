<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('noticias', function (Blueprint $table){
            $table->id();
            $table->string('titulo', 250);
            $table->text('conteudo');
            $table->string('imagem', 126);
            $table->char('status', 1) 
                ->comment('A - Ativo / I - Inativo')
                ->default('A');
            $table->date('data_publicacao');
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
        //
    }
}
