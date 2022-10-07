@extends('layout.app')
@section('title','Alteração Contato {{$contato->nome}}')
@section('content')
    <h1>Alteração Contato {{$contato->nome}}</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br>
    {{Form::open(['route'=>['contatos.update', $contato->id], 'method'=>'PUT'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome', $contato->nome, ['class'=>'form-control', 'required', 'placeholder'=>'Nome Completo'])}}
        {{Form::label('email', 'E-mail')}}
        {{Form::text('email', $contato->email, ['class'=>'form-control', 'required', 'placeholder'=>'e-mail'])}}
        {{Form::label('telefone', 'Telefone')}}
        {{Form::text('telefone', $contato->telefone, ['class'=>'form-control', 'required', 'placeholder'=>'(99) 99999-9999'])}}
        {{Form::label('cidade', 'Cidade')}}
        {{Form::text('cidade',$contato->cidade, ['class'=>'form-control', 'required', 'placeholder'=>'Nome da Cidade'])}}
        {{Form::label('estado', 'Estado')}}
        {{Form::text('estado', $contato->estado, ['class'=>'form-control', 'required', 'placeholder'=>'Nome do Estado'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{ Form::close()}}
@endsection
