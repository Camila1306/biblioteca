@extends('layout.app')
@section('title', 'Livro - {{$livro->titulo}}')
@section('content')
        <div class="card-header">
            <h1>Título: {{$livro->titulo}}</h1>
        </div>
        <div class="card-body">
            <h3>ID: {{$livro->id}}</h3> <br>
            <p class="text">
                Descrição: {{$livro->descricao}} <br>
                Autor: {{$livro->autor}} <br>
                Editora: {{$livro->editora}} <br>
                Ano: {{$livro->ano}} <br>
            </p>
        </div>
    <div class="card-footer">
        {{Form::open(['route' => ['livros.destroy', $livro->id], 'method' => 'DELETE'])}}
            <a href="{{url('livros/'.$livro->id.'/edit')}}" class="btn btn-outline-info">Alterar</a>
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
            <a href="{{url('livros/')}}" class="btn btn-outline-secondary">Voltar</a>
        {{Form::close()}}
    </div>
    
@endsection