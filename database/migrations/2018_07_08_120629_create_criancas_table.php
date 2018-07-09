<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criancas', function (Blueprint $table) {
            $table->increments('crianca_id');
            $table->string('nome');
            $table->char('sexo', 1);
            $table->integer('idade');
            $table->string('naturalidade');
            $table->double('peso');
            $table->double('altura');
            $table->string('foto')->nullable();
            $table->string('doenca')->nullable();
            $table->string('grau_necessidade');
            $table->boolean('estado');
            $table->longText('descricao');
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
        Schema::dropIfExists('criancas');
    }
}
