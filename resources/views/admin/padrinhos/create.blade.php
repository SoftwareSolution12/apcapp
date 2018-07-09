@extends('layouts.admin')

@section('titulo')
	Registar novo | Padrinho
@endsection


@section('conteudo')

@section('titulo_pagina')
Registo de Padrinhos
@endsection

<br>
<form method="post" action="{{route('padrinho.salvar')}}" enctype="multipart/form-data">
	{{ csrf_field() }}
  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome">
  </div>

   <div class="form-group">
    <label for="sexo">Sexo:</label>
    <select class="form-control" name="sexo"> 
      <option value="Masculino">Masculino</option>
      <option value="Feminino">Feminino</option>
    </select>
   </div>

   <div class="form-group">
    <label for="idade">Idade:</label>
    <input type="number" class="form-control" name="idade">
  </div>

   <div class="form-group">
    <label for="profissao">Profissao:</label>
    <input type="text" class="form-control" name="profissao">
   </div>

   <div class="form-group">
    <label for="telefone">Telefone:</label>
    <input type="number" class="form-control" name="telefone">
   </div>

   <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email">
   </div>

   <div class="form-group">
    <label for="categoria_id">Tipo de Ajuda:</label>
    <select class="form-control" name="categoria_id"> 
    	@foreach($categorias as $categoria)
    	<option value="{{$categoria->categoria_id}}">{{$categoria->nome}}</option>
    	@endforeach
    </select>
   </div>

  <button type="submit" class="btn btn-primary">
  	Registar Padrinho
  </button>	
</form>
<br>

@endsection