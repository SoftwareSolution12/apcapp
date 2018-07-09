<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Padrinho;
use App\Categoria;
use Session;

class PadrinhoController extends Controller
{
     public function __construct(){

        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('admin.padrinhos.index')->with('padrinhos', Padrinho::all());
    }

  
    public function create()
    {
       return view('admin.padrinhos.create')->with('categorias', Categoria::all());
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

        Session::flash('sucesso','Padrinho Salvado com sucesso!');

        return  redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        return view('admin.padrinhos.edit')
              ->with('categorias', Categoria::all())
              ->with('padrinho',Padrinho::find($id));
    }

  
    public function update(Request $request, $id)
    {

        $padrinho=Padrinho::find($id);

        $this->validate($request,[
            'nome'=>'required|max:100',
            'sexo'=>'required|max:10',
            'idade'=>'required',
            'profissao'=>'required',
            'telefone'=>'required',
            'email' => 'required|string|email|max:255|',
            'categoria_id'=>'required'
        ]);

        $padrinho->nome=$request->nome;
        $padrinho->sexo=$request->sexo;
        $padrinho->idade=$request->idade;
        $padrinho->profissao=$request->profissao;
        $padrinho->telefone=$request->telefone;
        $padrinho->email=$request->email;
        $padrinho->categoria_id=$request->categoria_id;
        $padrinho->save();

        Session::flash('sucesso','Padrinho Atualizado com sucesso!');

        return  redirect()->route('padrinhos');
    }

 
    public function destroy($id)
    {
        $padrinho=Padrinho::find($id);
        $padrinho->delete();
        Session::flash('sucesso','Padrinho Excluido com sucesso!');
        return  redirect()->back();
    }
}
