<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padrinho extends Model
{
    protected $table='padrinhos';
    protected $primaryKey='padrinho_id';
    protected $fillable=['nome','sexo','idade','profissao','telefone','email','categoria_id'];

    //relacionamento inverso
    public function categorias(){
    	return $this->belongsTo('App\Categoria','categoria_id');
    }

     public function criancas()
    {
    	return $this->belongsToMany('App\Crianca', 'padrinho_criancas', 'padrinho_id', 'crianca_id');
    } 

}
