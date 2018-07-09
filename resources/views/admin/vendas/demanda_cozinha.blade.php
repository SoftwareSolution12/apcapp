@extends('layouts.admin')

@section('titulo')
	Demandas Cozinha
@endsection

@section('conteudo')

	<!-- Titulo da pagina -->
	@section('titulo_pagina')
		Cozinha
	@endsection
	<!-- Fim titulo da pagina -->
	
	<div class="table-responsive">
	  <table class="table table-bordered">
	  <tr>
	  	<th>Item</th>
	  	<th>qty</th>
	  	<th class="text-center">Preparado</th>
	  </tr>
	  
	  @if(count(Session::get('itens'))===0)
	  	<tr>
	  		<th colspan="3" class="text-center"> Nao ha pedidos ainda.</th>
	  	</tr>
	  @else
	  @foreach(Session::get('itens') as $item)
		  <tr>
		  	<td>{{$item->nome}}</td>
		  	<td>{{$item->qty}}</td>
		  	<td class="text-center"><a href="{{ route('item.preparado',['id'=>$item->item_id]) }}" class="btn btn-success btn-xs">Preparado</a></td>
		  </tr>
	  @endforeach
	  @endif
	  </table>
	</div>

@endsection