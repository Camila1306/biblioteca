@extends('layout.app')
@section('title', 'Contato - {{$contato->nome}}')
@section('content')
    <h1>Contato - {{$contato->nome}}</h1>
    <ul>
        <li>ID: {{$contato->id}}</li>
        <li>E-mail: <a href="mailto:{{$contato->email}}">{{$contato->email}}</a></li>
        <li>Telefone: {{$contato->telefone}}</li>
        <li>Cidade: {{$contato->cidade}}</li>
        <li>Estado: {{$contato->estado}}</li>
    </ul>
    {{Form::open(['route' => ['contatos.destroy', $contato->id],'method' => 'DELETE'])}}
        <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn btn-success">Alterar</a>
        {{Form::submit('Excluir', ['class' => 'btn btn-danger'])}}
        <a href="{{url('contatos/')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection