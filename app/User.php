<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    protected $primaryKey='user_id';

    protected $fillable = [
        'name', 'email', 'password','perfil_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil(){
        return $this->belongsTo('App\Perfil','perfil_id');
    }
}
