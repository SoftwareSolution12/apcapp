@extends('layouts.admin')

@section('titulo')
	Registar nova | Crianca
@endsection


@section('conteudo')

@section('titulo_pagina')
Registo de Criancas
@endsection

<br>
<form method="post" action="{{route('crianca.salvar')}}" enctype="multipart/form-data">
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
    <label for="naturalidade">Naturalide:</label>
    <input type="text" class="form-control" name="naturalidade">
   </div>

   <div class="form-group">
    <label for="peso">Peso:</label>
    <input type="number" class="form-control" name="peso">
   </div>

   <div class="form-group">
    <label for="altura">Altura:</label>
    <input type="number" class="form-control" name="altura">
   </div>

   <div class="form-group">
    <label for="foto">Foto:</label>
    <input type="file" class="form-control" name="foto">
   </div>

   <div class="form-group">
    <label for="doenca">Doenca:</label>
    <input type="text" class="form-control" name="doenca">
   </div>

   <div class="form-group">
    <label for="grau_necessidade">Grau de Necessidade:</label>
    <select class="form-control" name="grau_necessidade">
    	<option value="Alta">Alta</option>
      <option value="Media">Media</option>
      <option value="Baixa">Baixa</option>
    </select>
   </div>

   <div class="form-group">
    <label for="descricao">Descricao:</label>
    <textarea class="form-control" rows="5" name="descricao"></textarea>
   </div>

  <button type="submit" class="btn btn-primary">
  	Registar Crianca
  </button>	
</form>
<br>

@endsection