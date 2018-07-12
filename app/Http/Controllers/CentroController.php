<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Padrinho;
use App\Crianca;
use App\PadrinhoCrianca;
use Session;


class CentroController extends Controller
{
	public function __construct(){

        $this->middleware('admin');
    }
     public function index()
    {
    	 return view('admin.apadrinhamentos.index')->with('padrinhos', Padrinho::all());
    }


    public function apadrinhar($id)
    {
    	$padrinho = Padrinho::find($id);
    	$crianca = DB::table('criancas')->select("criancas.*")->where('estado', 0)->orderBy(DB::raw('RAND()'))->take(1)->first();
    	return view('admin.apadrinhamentos.create', compact('crianca','padrinho'));
    }

    public function guardar($id_padrinho, $id_crianca)
    {
    	//dd($id_padrinho, $id_crianca);
    	$padrinho_crianca = new PadrinhoCrianca();
    	$padrinho_crianca->padrinho_id = $id_padrinho;
    	$padrinho_crianca->crianca_id = $id_crianca;                                 
    	$crianca = Crianca::find($id_crianca);
    	$crianca->estado = 1;
    	$crianca->update();
    	$padrinho_crianca->save();
    	//return redirect('/list');

    	Session::flash('sucesso','Crianca Apadrinhada com sucesso!');
} 
  public function remover($id_padrinho, $id_crianca)
    {
       
        $crianca_aux = Crianca::find($id_crianca);
        $crianca_aux->estado = false;
        $crianca_aux->update();
        PadrinhoCrianca::where('padrinho_id',$id_padrinho)->where('crianca_id',$id_crianca)->delete();
        
        //return redirect('/list');
} 
public function listarPadrinhoCrianca()
{
    $padrinhoCriancas = PadrinhoCrianca::with('padrinho', 'crianca')->get();
    return view('centros.list', ['padrinhoCriancas' => $padrinhoCriancas]);
}
}
