@extends('layouts.admin')

@section('titulo')
	Editar Perfil
@endsection


@section('conteudo')

@section('titulo_pagina')
Editando Perfil
@endsection
<br>
<form class="form-horizontal" method="POST" action="{{ route('usuario.atualizar',['id'=>$usuario->user_id]) }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nome:</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Perfil:</label>

            <div class="col-md-6">
                <select name="perfil_id" class="form-control">
                	@foreach($perfis as $perfil)
                		<option value="{{$perfil->perfil_id}}"
                		@if($perfil->perfil_id==$usuario->perfil->perfil_id)
                			selected
                		@endif

                		>{{$perfil->nome}}</option>
                	@endforeach
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Email:</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email}}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Senha</label>

            <div class="col-md-6">
                <input id="password" placeholder="Nova senha" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

            <div class="col-md-6">
                <input id="password-confirm"  placeholder="Confirmar senha" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Atualizar Usuario
                </button>
            </div>
        </div>
    </form>
<br>
@endsection