<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Padrinho;
use App\Categoria;
use Session;

class FrontEndController extends Controller
{
      public function create()
    {
       return view('frontend.create')->with('categorias', Categoria::all());
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'=>'required|max:100',
            'sexo'=>'required|max:10',
            'idade'=>'required',
            'profissao'=>'required',
            'telefone'=>'required',
            'email' => 'required|string|email|max:255|unique:padrinhos',
            'categoria_id'=>'required'
        ]);


        Padrinho::create([
            'nome'=>$request->nome,
            'sexo'=>$request->sexo,
            'idade'=>$request->idade,
            'profissao'=>$request->profissao,
            'telefone'=>$request->telefone,
            'email'=>$request->email,
            'categoria_id'=>$request->categoria_id
        ]);

        Session::flash('sucesso','Obrigado por se registar Aguarde pelo nosso contacto!');

        return  redirect('/');
    }

}
