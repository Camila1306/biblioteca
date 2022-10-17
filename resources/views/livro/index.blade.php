@extends('layout.app')
@section('title', 'Listagem de Livros')
@section('content')
    <h1>Listagem de Livros</h1>
    @if (Session::has('mensagem'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{Session::get('mensagem')}}
            </div>
        </div>    
    @endif
    <br>

    {{Form::open(['url' => 'livros/buscar', 'method' => 'GET'])}}
    <div class="row">
        <div class="col-sm-3">
            <a href="{{url('livros/create')}}" class="btn btn-outline-success">Criar</a>
        </div>
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
    
@endsection