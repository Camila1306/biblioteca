@extends('layouts.app')
@section('title', 'Empréstimo - {{$emprestimo->id}}')
@section('content')
<div class="card w-50">
        <div class="card-header">
            <h1>Empréstimo - {{$emprestimo->id}}</h1>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">ID: {{$emprestimo->id}}</h3> <br>
                    </div>
                    @auth
                        <div class="col-4">
                            @if ($emprestimo->datadevolucao == null)    
                                {{Form::open(['route'=>['emprestimos.devolver', $emprestimo->id], 'method'=>'PUT'])}}
                                {{Form::submit('Devolver', ['class'=>'btn btn-outline-success', 'onclick'=>'return confim("Confirma devolução?")'])}}
                                {{Form::close()}}
                            @endif
                        </div>
                    @endauth
                </div>
            </div>
            <p class="text">
                Data:
                {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}}| Devolução: {{!!$emprestimo->devolvido!!}}<br>
                Contato: {{$emprestimo->contato_id}} - {{$emprestimo->contato->nome}}<br>
                Contato: {{$emprestimo->livro_id}} - {{$emprestimo->livro->titulo}}<br>
                Obs: {{$emprestimo->obs}}
            </p>
        </div>
    <div class="card-footer">
        @auth
            {{Form::open(['route' => ['emprestimos.destroy', $emprestimo->id], 'method' => 'DELETE'])}}
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger', 'onclick'=>'return confirm("Confirma exclusão?")'])}}
        @endauth
        <a href="{{url('emprestimos/')}}" class="btn btn-outline-secondary">Voltar</a>
        @auth    
            {{Form::close()}}   
        @endauth
    </div>
</div>

@endsection