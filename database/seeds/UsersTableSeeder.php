<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $perfil1=App\Perfil::create([
        'nome'=>'admin'
       ]);

       $perfil2=App\Perfil::create([
        'nome'=>'simple'
       ]);

       


       App\User::create([
       		'name'=>'Dionisio',
       		'email'=>'macamo@gmail.com',
          'perfil_id'=>$perfil1->perfil_id,
       		'password'=>bcrypt('password')
       	]);


       App\User::create([
          'name'=>'Marta',
          'email'=>'marta@gmail.com',
          'perfil_id'=>$perfil2->perfil_id,
          'password'=>bcrypt('password')
        ]);

    }
}
