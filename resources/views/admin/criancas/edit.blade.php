@extends('layouts.admin')

@section('titulo')
	Editando Padrinho
@endsection


@section('conteudo')

@section('titulo_pagina')
Editando Padrinhos
@endsection

<br>
<form method="post" action="{{route('padrinho.atualizar',['id'=>$padrinho->padrinho_id])}}" enctype="multipart/form-data">
	{{ csrf_field() }}
   <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome" value="{{$padrinho->nome}}">
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
    <input type="number" class="form-control" name="idade" value="{{$padrinho->idade}}">
  </div>

   <div class="form-group">
    <label for="profissao">Profissao:</label>
    <input type="text" class="form-control" name="profissao" value="{{$padrinho->profissao}}">
   </div>

   <div class="form-group">
    <label for="telefone">Telefone:</label>
    <input type="number" class="form-control" name="telefone" value="{{$padrinho->telefone}}">
   </div>

   <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" value="{{$padrinho->email}}">
   </div>

   <div class="form-group">
    <select class="form-control" name="categoria_id"> 
    	@foreach($categorias as $categoria)
    	
    	<option value="{{$categoria->categoria_id}}"
    	@if($categoria->nome===$padrinho->categorias->nome)
    		selected
    	@endif

    	>{{$categoria->nome}}</option>
    	@endforeach
    </select>
   </div>

  <button type="submit" class="btn btn-primary">
  	Atualizar Padrinho
  </button>	
</form>
<br>

@endsection