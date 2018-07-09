<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;
use App\Pedido;
use App\Item;
class PedidoController extends Controller
{
    public function enviarCozinha(Request $request){

    	$cart=Cart::content();

    	$pedido=Pedido::create([
    		'estado'=>'normal',
    		'total'=>Cart::total()
    	]);

    	foreach ($cart as $crt) {

    		Item::create([
    			'pedido_id'=>$pedido->pedido_id,
    			'nome'=>$crt->name,
    			'qty'=>$crt->qty,
    			'estado'=>'normal',
    			'subtotal'=>$crt->subtotal()
    		]);
    	}

    	Cart::destroy();

    	Session::flash('sucesso','pedido enviado com sucesso! o seu pedido esta sendo preparado aguarde...'.'Numero de Pedido '.$pedido->pedido_id );

    	Session::put('itens',Item::where('estado','normal')->get());

    	return redirect()->back();
    }

    public function updateItemCozinha($id){

    	$item=Item::find($id);

    	$item->estado='preparado';

    	$item->save();

    	Session::flash('sucesso','Pedido preparado com sucesso!');
		Session::forget('itens');
    	Session::put('itens',Item::where('estado','normal')->get());
    	Session::put('itens2',Item::where('estado','preparado')->get());
    	return redirect()->back();
    }

    public function updateItemGarcom($id){

    	$item=Item::find($id);

    	$item->estado='entregue';

    	$item->save();

    	Session::flash('sucesso','Pedido Entregue com sucesso!');
		Session::forget('itens');
    	Session::put('itens',Item::where('estado','normal')->get());
    	Session::put('itens2',Item::where('estado','preparado')->get());
    	return redirect()->back();
    }


    public function pedidoVenda(){

    	return view('admin.vendas.vendas')->with('pedidos',Pedido::where('estado','normal')->get());
    }


    public function pesquisaPedido(Request $request){

        $pedido=Pedido::find($request->pedido);

        $itens=Item::where('pedido_id',$pedido->pedido_id)->get();

        Session::put('itemms',$itens);

        Session::put('pedido',$pedido);

        return redirect()->back();

    }

    public function concluirPedido($id){

         $pedido=Pedido::find($id);
         $pedido->estado='pago';
         $pedido->cliente_nome='desconhecido';
         $pedido->save();
         Session::forget('itemms');
         Session::forget('pedido');
         Session::flash('sucesso','Pagamento efectuado com sucesso!');

        return redirect()->back();
    }
}
