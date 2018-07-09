<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Session;
class CategoriaController extends Controller
{

    public function __construct(){

        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.categorias.index')->with('categorias',Categoria::all());
    }

  
    public function create()
    {
       return view('admin.categorias.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'=>'required|max:20'
        ]);

        Categoria::create([
            'nome'=>$request->nome
        ]);

        Session::flash('sucesso','Categoria Salvada com sucesso!');

        return  redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        return view('admin.categorias.edit')->with('categoria',Categoria::find($id));
    }

  
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome'=>'required|max:20'
        ]);

        $categoria=Categoria::find($id);
        $categoria->nome=$request->nome;
        $categoria->save();

        Session::flash('sucesso','Categoria Atualizada com sucesso!');

        return  redirect()->route('categorias');
    }

 
    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();
        Session::flash('sucesso','Categoria Excluida com sucesso!');
        return  redirect()->back();
    }
}
