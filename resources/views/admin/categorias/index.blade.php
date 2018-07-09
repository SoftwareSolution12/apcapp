@extends('layouts.admin')

@section('titulo')
	Tipo de Ajudas
@endsection

@section('conteudo')

	<!-- Titulo da pagina -->
	@section('titulo_pagina')
	Lista de Tipos de Ajuda
	@endsection
	<!-- Fim titulo da pagina -->
	
	@include('admin.pesquisa')

	<div class="table-responsive">
	  <table class="table table-bordered">
	  <tr>
	  	<th>Tipo de ajuda</th>
	  	<th class="text-center">Editar</th>
	  	<th class="text-center">Excluir</th>
	  </tr>
	  
	  @if(count($categorias)===0)

	  	<tr>
	  		<th colspan="3" class="text-center"> Tipos de Ajuda nao registadas ainda.</th>
	  	</tr>
	  @else
	  @foreach($categorias as $categoria)
	  <tr>
	  	<td>{{$categoria->nome}}</td>
	  	<td class="text-center"><a href="{{route('categoria.editar',['id'=>$categoria->categoria_id])}}" class="btn btn-success btn-xs">Editar</a></td>
	  	<td class="text-center"><a href="{{route('categoria.deletar',['id'=>$categoria->categoria_id])}}" class="btn btn-danger btn-xs btn-excluir">Excluir</a></td>
	  </tr>
	  @endforeach
	  @endif
	  </table>
	</div>

@endsection