@extends('layouts.app')
@section('title', 'Listagem de Livros')
@section('content')
    <h1>Listagem de Livros</h1>
    @if (Session::has('mensagem'))
        <div class="alert alert-success">
                {{Session::get('mensagem')}}
        </div>    
    @endif
    <br>

    {{Form::open(['url' => 'livros/buscar', 'method' => 'GET'])}}
    <div class="row">
        @if ((Auth::check()) && (Auth::user()->isAdmin()))            
            <div class="col-sm-3">
                <a href="{{url('livros/create')}}" class="btn btn-outline-success">Criar</a>
            </div>
        @endif
        <div class="col-sm-9">
            <div class="input-group m1-5">
                @if ($busca !== null)
                &nbsp;<a href="{{url('livros/')}}" class="btn btn-outline-secondary">Todos</a>&nbsp;
                    
                @endif
                {{Form::text('busca', $busca, ['class' => 'form-control', 'required', 'placeholder' => 'buscar'] )}}
                &nbsp;
                <span class="input-group-btn">
                    {{Form::submit('Buscar', ['class' => 'btn btn-outline-primary'])}}
                </span>
            </div>
        </div>
    </div>
{{Form::close()}}
<br> <br>
<table class="table table-striped table-hover">
    @foreach ($livros as $livro)
    <tr>
        <td>
            <a href="{{url('livros/'.$livro->id)}}">{{$livro->titulo}}</a>
        </td>
    </tr>
        
    @endforeach

</table>

{{$livros->links()}}
    
@endsection