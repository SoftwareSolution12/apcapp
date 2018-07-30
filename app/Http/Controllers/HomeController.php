<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use App\Crianca;
use App\User;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $criancasApadrinhadas=Crianca::where('estado','1')->get();
        $numeroDecriancasApadrinhadas=count($criancasApadrinhadas);

        $criancasPorApadrinhar=Crianca::where('estado','0')->get();
        $numeroDecriancasPorApadrinhar=count($criancasPorApadrinhar);
        
        $usuarios=User::all();
        $numeroDeUsuarios=count($usuarios);

        return view('admin.home',compact('numeroDeUsuarios','numeroDecriancasApadrinhadas','numeroDecriancasPorApadrinhar'));
    }


    public function ajuda(){
        Session::flash('info','O Manual de Ajuda ainda esta sendo produzida, porfavor aguarde, entraremos em contacto consigo.');
        return redirect()->back();
    }

    public function sobre(){
        return view('admin.outros.sobre');
    }
}
