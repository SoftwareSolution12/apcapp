@extends('layouts.admin')

@section('titulo')
	Criancas
@endsection

@section('conteudo')

	
	<!-- Titulo da pagina -->
	@section('titulo_pagina')
	Lista de Criancas
	@endsection
	<!-- Fim titulo da pagina -->

	@include('admin.pesquisa')

	<div class="table-responsive">
	  <table class="table table-bordered">
	  <tr>
	  	<th>Nome</th>
	  	<th>Idade</th>
	  	<th>Naturalidade</th>
	  	<th>Foto</th>
	  	<th>Editar</th>
	  	<th>Excluir</th>
	  </tr>
	  
	  @if(count($criancas)===0)

	  	<tr>
	  		<th colspan="6" class="text-center"> Criancas nao registados ainda.</th>
	  	</tr>
	  @else
	  @foreach($criancas as $crianca)
	  <tr>
	  	<td>{{$crianca->nome}}</td>
	  	<td>{{$crianca->idade}}</td>
	  	<td>{{$crianca->naturalidade}}</td>
	  	<td>{{$crianca->foto}}</td>
  		<td><a href="{{route('crianca.editar',['id'=>$crianca->crianca_id])}}" class="btn btn-success btn-xs">Editar</a></td>
  		<td><a href="{{route('crianca.deletar',['id'=>$crianca->crianca_id])}}" class="btn btn-danger btn-xs btn-excluir">Excluir</a></td>
	  </tr>
	  @endforeach
	  @endif
	  </table>
	</div>

@endsection