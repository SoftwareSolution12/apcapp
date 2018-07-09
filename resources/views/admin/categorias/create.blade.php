@extends('layouts.admin')

@section('titulo')
	Registar Novo | Tipo de Ajuda
@endsection


@section('conteudo')

@section('titulo_pagina')
Registo de Tipos de Ajuda
@endsection

<br>
<form method="post" action="{{route('categoria.salvar')}}">
	{{ csrf_field() }}
  <div class="form-group">
    <label for="nome">Nome Do Tipo de Ajuda:</label>
    <input type="text" class="form-control" name="nome">
  </div>

  <button type="submit" class="btn btn-primary">
  	Registar Tipo de Ajuda
  </button>	
</form>
<br>
@endsection