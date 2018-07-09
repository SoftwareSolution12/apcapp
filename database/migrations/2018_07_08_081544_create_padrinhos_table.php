<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padrinhos', function (Blueprint $table) {
            $table->increments('padrinho_id');
            $table->string('nome');
            $table->string('sexo');
            $table->integer('idade');
            $table->string('profissao');
            $table->string('telefone');
            $table->string('email');

            $table->unsignedInteger('categoria_id'); 
            $table->foreign('categoria_id')->references('categoria_id')->on('categorias');
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
        Schema::dropIfExists('padrinhos');
    }
}
