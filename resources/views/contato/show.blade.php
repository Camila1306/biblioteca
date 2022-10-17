@extends('layout.app')
@section('title', 'Contato - {{$contato->nome}}')
@section('content')
    <div class="card w-25">
        @php
            $nomeimagem = "";
            if(file_exists("./img/contatos/".md5($contato->id).".jpg")){
                $nomeimagem = "./img/contatos/".md5($contato->id).".jpg";
            } elseif(file_exists("./img/contatos/".md5($contato->id).".png")){
                $nomeimagem = "./img/contatos/".md5($contato->id).".png";
            } elseif(file_exists("./img/contatos/".md5($contato->id).".gif")){
                $nomeimagem = "./img/contatos/".md5($contato->id).".gif";
            } elseif(file_exists("./img/contatos/".md5($contato->id).".webp")){
                $nomeimagem = "./img/contatos/".md5($contato->id).".webp";
            } elseif(file_exists("./img/contatos/".md5($contato->id).".jpeg")){
                $nomeimagem = "./img/contatos/".md5($contato->id).".jpeg";
            } else {
                $nomeimagem = "./img/contatos/semfoto.png";
            }
        @endphp
        {{Html::image(asset($nomeimagem), 'Foto de '.$contato->nome,["class"=>"card-img-top-thumbnail"])}}
    </div>
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
        @if ($nomeimagem !== "./img/contatos/semfoto.png")
            {{Form::hidden('foto', $nomeimagem)}}
        @endif
            <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn btn-outline-info">Alterar</a>
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
            <a href="{{url('contatos/')}}" class="btn btn-outline-secondary">Voltar</a>
        {{Form::close()}}
    </div>
@endsection