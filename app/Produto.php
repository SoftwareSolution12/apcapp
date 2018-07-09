<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	protected $table='produtos';
    protected $primaryKey='produto_id';
    protected $fillable=['nome','imagem','categoria_id','preco','descricao'];

    //relacionamento inverso
    public function categoria(){
    	return $this->belongsTo('App\Categoria','categoria_id');
    }

    //metodo para retornar caminho absoluto de uma imagem usando acessor
    public function  getImagemAttributes($imagem){
        return asset($imagem);
    }
}
