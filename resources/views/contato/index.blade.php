@extends('layout.app')
@section('title', 'Listagem de Contatos')
@section('content')
    <h1>Listagem de Contatos</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br>

    {{Form::open(['route'=>['contatos/buscar'], 'method'=>'GET'])}}
    <div class="row">
        <div class="col-lg-12">
            <div class="input-group">
                <a class="btn btn-success" href="{{url('contatos/create')}}">Criar</a>
                {{Form::text('busca', $busca, ['class'=>'from-control', 'required', 'placeholder'=>'buscar'])}}
                <span class="input-group-btn">
                    {{Form::submit('Buscar', ['class'=>'btn btn-secondary'])}}
                </span>
            </div>
        </div>
    </div>
    {{Form::close()}}
    <br><br>
       <table  class="table table-striped">
            @foreach ($contatos as $contato)
                <tr>
                    <td>
                    <a href="{{url('contatos/'.$contato->id)}}">{{$contato->nome}}</a>
                    </td>
                </tr>
            @endforeach
       </table> 


@endsection