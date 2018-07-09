<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PadrinhoCrianca extends Model
{
	protected $table='padrinho_criancas';
    protected $primaryKey='padrinho_criancas_id';
      protected $fillable = [
        'padrinho_id',
        'crianca_id',
    ];

    public function padrinho(){
	return $this->belongsTo('App\Padrinho', 'padrinho_id');
    }


	public function crianca(){
		return $this->belongsTo('App\Crianca', 'crianca_id');
	}

}
