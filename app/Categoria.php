<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table='categorias';
    protected $primaryKey='categoria_id';
    protected $fillable=['nome'];

    public function padrinhos(){
    	return	$this->hasMany('App\Padrinho','padrinho_id');
    }
}
