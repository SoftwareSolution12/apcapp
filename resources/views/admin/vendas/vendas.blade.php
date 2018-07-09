@extends('layouts.admin')

@section('titulo')
	Vendas | Caixa
@endsection

@section('venda')

 <!--INICIO DO CONTEUDO-->
      <section class="content-header">
      </section>

      <section class="content">
        <section class="invoice">

             
              
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="page-header">
                    <i class="fa fa-shopping-cart"></i> Pagamentos
                  </h2>
                </div>
              </div> 

               <div class="col-xs-12">
                  <p class="lead">Pedido:</p>
               </div>
                <div class="row invoice-info">
                <div class="col-sm-12 col-xs-12">
                     <form action="{{route('pesquisa.pedido')}}" method="post">
                          {{ csrf_field() }}
                          <div class="input-group">
                            <select name="pedido" class="form-control">
                              @foreach($pedidos as $pedido)
                                <option value="{{$pedido->pedido_id}}">{{$pedido->pedido_id}}</option>
                              @endforeach
                            </select>
                            <div class="input-group-btn">
                              <button class="btn btn-default btn-md" type="submit" style="height:34px">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                      </form>
                  </div>
                </div>
                <form>

                <div class="row invoice-info">
                  <div class="col-xs-12">
                    <p class="lead">Dados do cliente:</p>
                  </div>
                  <div class="col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class="control-label sr-only" for="inputSuccess"><i class="fa fa-check"></i>Nome:</label>
                      <input type="text" class="form-control" id="inputSuccess" placeholder="Nome do cliente">
                      <span class="help-block"></span>
                    </div>
                  </div>


                  

                  
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="col-xs-12">
                    <p class="lead">Itens do Pedido:</p>
                  </div>
                  <div class="col-xs-12 table-responsive">

                    <table class="table table-striped">
                      <thead>

                      <tr>
                        <th class="text-center">Quantidade</th>
                        <th>Item</th>
                        <th class="text-right">Subtotal</th>
                        <th class="text-right"></th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(count(Session::get('itemms'))===0)
                      <tr>
                      	<th colspan="4" class="text-center text-success">Pedido Sem Itens!</th>
                      </tr>
                      @else
                      @foreach(Session::get('itemms') as $item)
	                      <tr>
	                        <th class="text-center">{{$item->qty}}</th>
	                        <th>{{$item->nome}}</th>
	                        <th class="text-right">MZN {{$item->subtotal}}</th>
	                        <th class="text-right"></th>
	                      </tr>
                       @endforeach
                       @endif

                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                  <!-- accepted payments column -->
              
                  <!-- /.col -->
                  <div class="col-sm-12 col-xs-12">
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                        <tr>
                          <th><h3 class="text-success text-right">Total:</h3></th>
                          <td class="text-right"><h3 class="text-success">MZN 

                            @if(Session::has('pedido'))

                            {{Session::get('pedido')->total}}

                            @else

                            0

                            @endif
                          </h3></td>
                        </tr>
                      </tbody></table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>

              </form>

              <div class="row">
                <div class="col-xs-12">
                  @if(count(Session::get('pedido'))==0)
                   <a href="#" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Concluir Pedido
                  </a>
                  @else
                  <a href="{{route('concluir.pedido',['id'=>Session::get('pedido')->pedido_id])}}" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Concluir Pedido
                  </a>

                  @endif
                </div>
              </div>

          </section>
      </section>
      <!-- FIM DO CONTEUDO-->
	

@endsection