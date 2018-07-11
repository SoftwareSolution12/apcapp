@extends('layouts.admin')

@section('titulo')
	Padrinhos
@endsection

@section('conteudo')

	
	<!-- Titulo da pagina -->
	@section('titulo_pagina')
	Lista de Padrinhos
	@endsection
	<!-- Fim titulo da pagina -->

	@include('admin.pesquisa')

	<div class="table-responsive">
	  <table class="table table-bordered">
	  <tr>
	  	<th>Nome</th>
	  	<!-- <th>Profissao</th -->
	  	<th>Telefone</th>
	  	<th>Email</th>
	  	<!-- <th>Tipo de Ajuda</th> -->
	  	<th>Accao</th>
	  	<!-- <th>Excluir</th> -->
	  </tr>
	  
	  @if(count($padrinhos)===0)

	  	<tr>
	  		<th colspan="6" class="text-center"> Padrinhos nao registados ainda.</th>
	  	</tr>
	  @else
	  @foreach($padrinhos as $padrinho)
	  <tr>
	  	<td>{{$padrinho->nome}}</td>
	  	<!-- <td>{{$padrinho->profissao}}</td> -->
	  	<td>{{$padrinho->telefone}}</td>
	  	<td>{{$padrinho->email}}</td>
	  	<!-- <td>{{$padrinho->categorias->nome}}</td> -->
	  	<td><a href="{{route('padrinho.editar',['id'=>$padrinho->padrinho_id])}}" class="btn btn-success btn-xs">Apadrinhar</a></td>
	  	<!-- <td><a href="{{route('padrinho.deletar',['id'=>$padrinho->padrinho_id])}}" class="btn btn-danger btn-xs btn-excluir">Excluir</a></td> -->
	  </tr>
	  @endforeach
	  @endif
	  </table>
	</div>

@endsection