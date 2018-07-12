@extends('layouts.admin')

@section('titulo')
	Padrinhos | Crianca
@endsection

@section('conteudo')
	
<!-- Titulo da pagina -->

@section('titulo_pagina')
Padrinho e Crianca
@endsection
<div style="margin-top:10px">
<h1>Padrinho</h1>
<p>{{$padrinho->nome}}</p>
</div>

<div>
<h1>Criança</h1>
<p>{{$crianca->nome}}</p>
</div>

<a class='btn btn-info btn-xs' href="{{route('padrinho_crianca',['id_padrinho' => $padrinho->padrinho_id,'id_crianca' => $crianca->crianca_id])}}">
      <span class="glyphicon glyphicon-save"></span>Apadrinhar</a>
  <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>


@endsection