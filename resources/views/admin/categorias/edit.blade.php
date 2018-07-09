@extends('layouts.admin')

@section('titulo')
	Editando Categoria
@endsection


@section('conteudo')

@section('titulo_pagina')
Editando Categoria
@endsection
<br>
<form method="post" action="{{route('categoria.atualizar',['id'=>$categoria->categoria_id])}}">
	{{ csrf_field() }}
  <div class="form-group">
    <label for="nome">Nome Da Categoria:</label>
    <input type="text" class="form-control" name="nome" value="{{$categoria->nome}}">
  </div>

  <button type="submit" class="btn btn-primary">
  	Atualizar Categoria
  </button>	
</form>
<br>
@endsection