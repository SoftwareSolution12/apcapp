@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-9">
    <div class="col-md-offset-4">
<br>

<div class="panel panel-default">
  <div class="panel-body">
  	

<form method="post" action="{{route('padrinho.registar')}}" enctype="multipart/form-data">
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
    <input type="number" class="form-control" data-role="tags-input" name="telefone">
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
  	Registar 
  </button>	
</form>
  </div>
</div>
<br>
</div>
</div>
</div>

@endsection