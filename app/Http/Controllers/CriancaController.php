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
        ]);

        $imagem=$request->foto;

        $imagem_nome=time().$imagem->getClientOriginalName();

        $imagem->move('uploads/criancas',$imagem_nome);

        //dd($request->all());

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
            'estado'=>"1",
            'descricao'=>$request->descricao,
        ]);

        Session::flash('sucesso','Crianca Salvada com sucesso!');

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
            'sexo'=>'required|max:10',
            'idade'=>'required',
            'naturalidade'=>'required',
            'peso'=>'required',
            'altura'=>'required',
            'foto'=>'required|image',
            'grau_necessidade'=>'required',
        ]);

        if($request->hasFile('foto')){

            $imagem=$request->imagem;

            $imagem_nome=time().$imagem->getClientOriginalName();

            $imagem->move('uploads/criancas',$imagem_nome);

            $crianca->imagem='/uploads/criancas/'.$featured_new_name;

        }

        $crianca->nome=$request->nome;
        $crianca->sexo=$request->sexo;
        $crianca->idade=$request->idade;
        $crianca->categoria_id=$request->categoria_id;
        $crianca->save();

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
