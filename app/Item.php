<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   protected $primaryKey='item_id';
   protected $fillable=['nome','qty','subtotal','estado','pedido_id'];

	public function pedido(){
		return $this->belongsTo('App\Pedido');
	}
}
