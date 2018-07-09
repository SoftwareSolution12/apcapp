<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use Session;
class ProdutoController extends Controller
{

    
    public function __construct(){

        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('admin.produtos.index')->with('produtos', Produto::all());
    }

  
    public function create()
    {
       return view('admin.produtos.create')->with('categorias',Categoria::all());
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'=>'required|max:100',
            'preco'=>'required',
            'imagem'=>'required|image',
            'categoria_id'=>'required'
        ]);

        $imagem=$request->imagem;

        $imagem_nome=time().$imagem->getClientOriginalName();

        $imagem->move('uploads/produtos',$imagem_nome);

        Produto::create([
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'preco'=>$request->preco,
            'imagem'=>'/uploads/produtos/'.$imagem_nome,
            'categoria_id'=>$request->categoria_id
        ]);

        Session::flash('sucesso','Produto Salvado com sucesso!');

        return  redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        return view('admin.produtos.edit')
              ->with('categorias',Categoria::all())
              ->with('produto',Produto::find($id));
    }

  
    public function update(Request $request, $id)
    {

        $produto=Produto::find($id);

        $this->validate($request,[
            'nome'=>'required|max:100',
            'preco'=>'required',
            'categoria_id'=>'required'
        ]);

        if($request->hasFile('imagem')){

            $imagem=$request->imagem;

            $imagem_nome=time().$imagem->getClientOriginalName();

            $imagem->move('uploads/produtos',$imagem_nome);

            $produto->imagem='/uploads/prdutos/'.$featured_new_name;

        }

        $produto->nome=$request->nome;
        $produto->preco=$request->preco;
        $produto->descricao=$request->descricao;
        $produto->categoria_id=$request->categoria_id;
        $produto->save();

        Session::flash('sucesso','Produto Atualizado com sucesso!');

        return  redirect()->route('produtos');
    }

 
    public function destroy($id)
    {
        $produtp=Produto::find($id);
        $produtp->delete();
        Session::flash('sucesso','Produto Excluido com sucesso!');
        return  redirect()->back();
    }
}
