<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
	protected $table='perfils';
    protected $primaryKey='perfil_id';
    protected $fillable=['nome'];


    public function usuarios(){
    	return $this->hasMany('App\User','user_id');
    }
}
