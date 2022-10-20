@extends('layout.app')
@section('title', 'Livro - {{$livro->titulo}}')
@section('content')
<div class="card w-50">
    <div class="card-img">
    @php
        $nomeimagem = "";
        if(file_exists("./img/livros/".md5($livro->id).".jpg")){
            $nomeimagem = "./img/livros/".md5($livro->id).".jpg";
        } elseif(file_exists("./img/livros/".md5($livro->id).".png")){
            $nomeimagem = "./img/livros/".md5($livro->id).".png";
        } elseif(file_exists("./img/livros/".md5($livro->id).".gif")){
            $nomeimagem = "./img/livros/".md5($livro->id).".gif";
        } elseif(file_exists("./img/livros/".md5($livro->id).".webp")){
            $nomeimagem = "./img/livros/".md5($livro->id).".webp";
        } elseif(file_exists("./img/livros/".md5($livro->id).".jpeg")){
            $nomeimagem = "./img/livros/".md5($livro->id).".jpeg";
        } else {
            $nomeimagem = "./img/livros/semfoto.webp";
        }
    @endphp
    {{Html::image(asset($nomeimagem), 'Foto de '.$livro->nome,["class"=>"card-img-top-thumbnail w-100"])}}
    </div>
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
        @if ($nomeimagem !== "./img/livros/semfoto.webp")
            {{Form::hidden('foto', $nomeimagem)}}            
        @endif
            <a href="{{url('livros/'.$livro->id.'/edit')}}" class="btn btn-outline-info">Alterar</a>
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
            <a href="{{url('livros/')}}" class="btn btn-outline-secondary">Voltar</a>
        {{Form::close()}}
    </div>
</div> 
@endsection