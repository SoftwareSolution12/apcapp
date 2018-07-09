<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use App\Pedido;
use App\Item;
use App\User;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $pedidospago=Pedido::where('estado','pago')->get();
        // // $numeroDePedidoPagos=count($pedidospago);

        // // $itensGarsom=Item::where('estado','preparado')->get();
        // // $numeroDeItensGarcom=count($itensGarsom);

        // // $itensCozinha=Item::where('estado','normal')->get();
        // // $numeroDeItensCozinha=count($itensCozinha);

        $usuarios=User::all();
        $numeroDeUsuarios=count($usuarios);

        return view('admin.home',compact('numeroDeUsuarios'));
    }


    public function ajuda(){
        Session::flash('info','O Manual de Ajuda ainda esta sendo produzida, porfavor aguarde, entraremos em contacto consigo.');
        return redirect()->back();
    }

    public function sobre(){
        return view('admin.outros.sobre');
    }

    public function demandasCozinha(){
        return view('admin.vendas.demanda_cozinha');
    }

    public function demandasGarcom(){
        return view('admin.vendas.demanda_garcom');
    }

}
