 @extends('layouts.admin')

@section('titulo')
  Fazendo Pedido
@endsection


@section('compra')
<div class="row">
    <!--INÍCIO DO MENU -->

    <div class="col-md-6 col-xs-12">
       @foreach($produtos as $produto)
          <div class="menu-item-info-box">
            <span class="menu-item-info-box-icon">
              <img style="width: 120px;height: 120px;" src="{{ $produto->imagem }}">
            </span> 

            <div class="menu-item-info-box-content">
              <span class="menu-item-info-box-text">{{ $produto->nome }}</span>
              <span class="menu-item-info-box-detail">{{ $produto->descricao }}</span>
              <span class="menu-item-info-box-price">MZN {{ $produto->preco }}</span>
              <a href="{{ route('adicionar.carrinho',['id'=>$produto->produto_id]) }}">
                <i class="fa fa-plus-circle"></i> Adicionar
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
      @endforeach
    </div>
  

 <div class="col-md-6 col-xs-12">

    <div class="box box-solid">
    <div class="box-header">
      <i class="fa fa-shopping-cart"></i>
  
      <h3 class="box-title">Pedidos do cliente</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      @if(count(Cart::content())===0)
      <div>
        <p class="text-center">
          Sua Lista de Itens esta vazio!
        </p>
      </div>

      @else
      <div class="table-responsive"> 
        <table class="table">
          <tbody>
            <!-- Linha dos items -->
            @foreach(Cart::content() as $item)
             <tr>
                <th style="width:60%">
                  <a href="{{ route('item.reduzir',['id'=>$item->rowId,'qty'=>$item->qty]) }}" class="btn btn-sm">
                    <i class="fa fa-minus"></i>
                  </a>
                  ({{$item->qty}})
                  <a href="{{ route('item.aumentar',['id'=>$item->rowId,'qty'=>$item->qty]) }}" class="btn btn-sm">
                    <i class="fa fa-plus"></i>
                  </a>
                  {{ $item->name }}
                  
                </th>
    
                <td class="text-right">MZN {{$item->subtotal()}}</td>
                <td class="text-right">
                  <a href="{{ route('remover.item',['id'=>$item->rowId,'qty'=>$item->qty]) }}"><i class="fa fa-remove"></i></a>
                </td>
    
            </tr>
          @endforeach

        <!-- Linha dos totais -->
            <tr>
              <th class="text-right">Total:</th>
              <th class="text-right text-danger"">MZN {{ Cart::total() }}</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="box-footer" *ngIf="itens().length">
      <div class="pull-right">
        <a href="{{ route('remover.itens')}}" class="btn btn-danger">
          <i class="fa fa-trash"></i> Limpar
        </a>
        <a href="{{ route('enviar.cozinha')}}" class="btn btn-success">
          <i class="fa fa-credit-card"></i> Envia a Cozinha
        </a>

      </div>
    </div>
  </div>
  @endif
</div>

@endsection



 