@extends('layouts.admin')

@section('titulo')
Utilizadores
@endsection

@section('conteudo')

	<!-- Titulo da pagina -->
	@section('titulo_pagina')
	Lista de Utilizadores
	@endsection
	<!-- Fim titulo da pagina -->
	
	<div class="table-responsive">
	  <table class="table table-bordered">
	  <tr>
	  	<th>Nome do Utilizador</th>
	  	<th>Email</th>
	  	<th>Perfil</th>
	  	<th class="text-center">Excluir</th>
	  </tr>
	  
	  @if($usuarios->count()===0)

	  	<tr>
	  		<th colspan="3" class="text-center"> Utilizadores nao registados ainda.</th>
	  	</tr>
	  @else
	  @foreach($usuarios as $usuario)
	  <tr>
	  	<td>{{$usuario->name}}</td>
	  	<td>{{$usuario->email}}</td>
	  	<td>{{$usuario->perfil->nome}}</td>
	  	<td class="text-center"><a href="{{route('usuario.deletar',['id'=>$usuario->user_id])}}" class="btn btn-danger btn-xs">Excluir</a></td>
	  </tr>
	  @endforeach
	  @endif
	  </table>
	</div>

@endsection