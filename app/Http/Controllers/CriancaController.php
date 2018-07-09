<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crianca;
use Session;

class CriancaController extends Controller
{
     public function __construct(){

        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('admin.criancas.index')->with('criancas', Crianca::all());
    }

  
    public function create()
    {
       return view('admin.criancas.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'=>'required|max:100',
            'sexo'=>'required|max:10',
            'idade'=>'required',
            'naturalidade'=>'required',
            'peso'=>'required',
            'altura'=>'required',
            'foto'=>'required|image',
            'grau_necessidade'=>'required',
            'estado'=>'required',
        ]);

        $imagem=$request->imagem;

        $imagem_nome=time().$imagem->getClientOriginalName();

        $imagem->move('uploads/criancas',$imagem_nome);

        Crianca::create([
            'nome'=>$request->nome,
            'sexo'=>$request->sexo,
            'idade'=>$request->idade,
            'naturalidade'=>$request->naturalidade,
            'peso'=>$request->peso,
            'altura'=>$request->altura,
            'foto'=>'/uploads/criancas/'.$imagem_nome,
            'doenca'=>$request->doenca,
            'grau_necessidade'=>$request->grau_necessidade,
        ]);

        Session::flash('sucesso','Crianca Salvado com sucesso!');

        return  redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        return view('admin.criancas.edit')
              ->with('crianca', Crianca::find($id));
    }

  
    public function update(Request $request, $id)
    {

        $crianca=Crianca::find($id);

        $this->validate($request,[
            'nome'=>'required|max:100',
            'preco'=>'required',
            'categoria_id'=>'required'
        ]);

        if($request->hasFile('foto')){

            $imagem=$request->imagem;

            $imagem_nome=time().$imagem->getClientOriginalName();

            $imagem->move('uploads/criancas',$imagem_nome);

            $produto->imagem='/uploads/criancas/'.$featured_new_name;

        }

        $produto->nome=$request->nome;
        $produto->preco=$request->preco;
        $produto->descricao=$request->descricao;
        $produto->categoria_id=$request->categoria_id;
        $produto->save();

        Session::flash('sucesso','Crianca Atualizada com sucesso!');

        return  redirect()->route('criancas');
    }

 
    public function destroy($id)
    {
        $produtp=Crianca::find($id);
        $produtp->delete();
        Session::flash('sucesso','Crianca Excluida com sucesso!');
        return  redirect()->back();
    }
}
