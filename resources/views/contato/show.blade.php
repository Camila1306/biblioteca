@extends('layout.app')
@section('title', 'Contato - {{$contato->nome}}')
@section('content')
    <div class="card-header">
        <h1>Contato - {{$contato->nome}}</h1>
    </div>
    <div class="card-body">
        <h3 class="card-title">
            ID: {{$contato->id}}
        </h3>
        <p class="text">
            E-mail: <a href="mailto:{{$contato->email}}">{{$contato->email}}</a><br>
            Telefone: {{$contato->telefone}}<br>
            Cidade: {{$contato->cidade}}<br>
            Estado: {{$contato->estado}}
        </p>
    </div>
    <div class="card-footer">
        {{Form::open(['route' => ['contatos.destroy', $contato->id],'method' => 'DELETE'])}}
            <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn btn-outline-info">Alterar</a>
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
            <a href="{{url('contatos/')}}" class="btn btn-outline-secondary">Voltar</a>
        {{Form::close()}}
    </div>
@endsection