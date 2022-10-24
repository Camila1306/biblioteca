@extends('layouts.app')
@section('title', 'Empréstimos')
@section('content')
    <h1>Empréstimos</h1>
    @if (Session::has('mensagem'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{Session::get('mensagem')}}
            </div>
        </div>    
    @endif
    <br>

    {{Form::open(['url' => 'emprestimos/buscar', 'method' => 'GET'])}}
    <div class="row">
        @auth
            <div class="col-sm-3">
                <a href="{{url('emprestimos/create')}}" class="btn btn-outline-success">Novo Empréstimo</a>
            </div>
        @endauth
        <div class="col-sm-9">
            <div class="input-group m1-5">
                @if ($busca !== null)
                &nbsp;<a href="{{url('emprestimos/')}}" class="btn btn-outline-secondary">Todos</a>&nbsp;
                    
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
    <tr>
        <th>Id</th>
        <th>Contato</th>
        <th>Livro</th>
        <th>Data</th>
        <th>Devolução</th>
    </tr>
    @foreach ($emprestimos as $emprestimo)
    <tr>
        <td>
            <a href="{{url('emprestimos/'.$emprestimo->id)}}">{{$emprestimo->id}}</a>
        </td>
        <td>
            {{$emprestimo->contato_id}} - {{$emprestimo->contato->nome}}
        </td>
        <td>
            {{$emprestimo->livro_id}} - {{$emprestimo->livro->titulo}}
        </td>
        <td>
            {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}}
        </td>
        <td>
            {{!!$emprestimo->devolvido!!}}
        </td>
    </tr>
        
    @endforeach

</table>

{{$emprestimos->links()}}
    
@endsection