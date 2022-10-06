@extends('layout.app')
@section('title', 'Listagem de Contatos')
@section('content')
    <h1>Listagem de Contatos</h1>
    <br>
    <a class="btn btn-success" href="{{url('contatos/create')}}">Criar</a>
    <br><br>
    <ul>
        @foreach ($contatos as $contato)
            <li><a href="{{url('contatos/'.$contato->id)}}">{{$contato->nome}}</a></li>
    @endforeach
    </ul>

@endsection