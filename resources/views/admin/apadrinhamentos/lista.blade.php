@extends('layouts.admin')

@section('titulo')
	Padrinhos|Criancas
@endsection

@section('conteudo')

	
	<!-- Titulo da pagina -->
	@section('titulo_pagina')
	Lista de Apadrinhamentos
	@endsection
	<!-- Fim titulo da pagina -->

	@include('admin.pesquisa')

	<div class="table-responsive">
	  <table class="table table-bordered">
	  <tr>
	  	<th>Padrinho</th>
	  	<!-- <th>Profissao</th -->
	  	<th>Crianca</th>
	  	<!-- <th>Tipo de Ajuda</th> -->
	  	<th>Accao</th>
	  	<!-- <th>Excluir</th> -->
	  </tr>
	  
	  @if(count($padrinhoCriancas)===0)

	  	<tr>
	  		<th colspan="6" class="text-center"> Apadrinhamento nao feitos ainda.</th>
	  	</tr>
	  @else
	  @foreach($padrinhoCriancas as $pc)
	  <tr>
	  	<td>{{$pc->padrinho->nome}}</td>
	  	<td>{{$pc->crianca->nome}}</td>
	  	
	  </tr>
	  @endforeach
	  @endif
	  </table>
	</div>

@endsection