@extends('layouts.app')
@section('title','Criar novo Contato')
@section('content')
    <h1>Criar Novo Contato</h1><br>
    @if(count($errors)>0)
    <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
                
            @endforeach
          </ul>
    </div>
    @endif
    {{Form::open(['route'=>'contatos.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome','',['class'=>'form-control', 'required', 'placeholder'=>'Nome Completo'])}}
        {{Form::label('email', 'E-mail')}}
        {{Form::email('email','',['class'=>'form-control', 'required', 'placeholder'=>'e-mail', 'pattern'=>'[\w+.]+@\w+\.\w{2,3}(?:\.\w{2})?'])}}
        {{Form::label('telefone', 'Telefone')}}
        {{Form::text('telefone','',['class'=>'form-control', 'required', 'placeholder'=>'(99) 99999-9999', 'pattern'=>'(\([0-9]{2}\))\s([9]{1})?([0-9]{4,5})-([0-9]{4})', 'title'=>'Número de telefone precisa ser no formato (99) 9999-9999'])}}
        {{Form::label('cidade', 'Cidade')}}
        {{Form::text('cidade','',['class'=>'form-control', 'required', 'placeholder'=>'Nome da Cidade'])}}
        {{Form::label('estado', 'Estado')}}
        {{Form::text('estado','',['class'=>'form-control', 'required', 'placeholder'=>'Nome do Estado'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=>'foto'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger'])!!}
    {{ Form::close()}}
@endsection
