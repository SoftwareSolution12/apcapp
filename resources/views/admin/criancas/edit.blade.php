@extends('layouts.admin')

@section('titulo')
  Editando Crianca
@endsection


@section('conteudo')

@section('titulo_pagina')
Editando Criancas
@endsection

<br>
<form method="post" action="{{route('crianca.atualizar',['id'=>$crianca->crianca_id])}}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome" value="{{$crianca->nome}}">
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
    <input type="number" class="form-control" name="idade" value="{{$crianca->idade}}">
  </div>

   <div class="form-group">
    <label for="naturalidade">Naturalide:</label>
    <input type="text" class="form-control" name="naturalidade" value="{{$crianca->naturalidade}}">
   </div>

   <div class="form-group">
    <label for="peso">Peso:</label>
    <input type="text" class="form-control" name="peso" value="{{$crianca->peso}}">
   </div>

   <div class="form-group">
    <label for="altura">Altura:</label>
    <input type="text" class="form-control" name="altura" value="{{$crianca->altura}}">
   </div>

   <div class="form-group">
    <label for="foto">Foto:</label>
    <input type="file" class="form-control" name="foto" value="{{$crianca->foto}}">
   </div>

   <div class="form-group">
    <label for="doenca">Doenca:</label>
    <input type="text" class="form-control" name="doenca" value="{{$crianca->doenca}}">
   </div>

   <div class="form-group">
    <label for="grau_necessidade">Grau de Necessidade:</label>
    <select class="form-control" name="grau_necessidade">
      <option value="Alta">Alta</option>
      <option value="Media">Media</option>
      <option value="Baixa">Baixa</option>
    </select>
   </div>

   <!-- <div class="form-group">
    <input type="hidden" class="form-control" name="estado" value="1">
   </div> -->

   <div class="form-group">
    <label for="descricao">Descricao:</label>
    <textarea class="form-control" rows="5" name="descricao">{{$crianca->descricao}}</textarea>
   </div>

  <button type="submit" class="btn btn-primary">
    Actualizar Crianca
  </button> 
</form>
<br>

@endsection