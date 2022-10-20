@extends('layout.app')
@section('title', 'Empréstimo - {{$emprestimo->id}}')
@section('content')
<div class="card w-50">
        <div class="card-header">
            <h1>Empréstimo - {{$emprestimo->id}}</h1>
        </div>
        <div class="card-body">
            <h3>ID: {{$emprestimo->id}}</h3> <br>
            <p class="text">
                Data:
                {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}}| Devolução: {{!!$emprestimo->devolvido!!}}<br>
                Contato: {{$emprestimo->contato_id}} - {{$emprestimo->contato->nome}}<br>
                Contato: {{$emprestimo->livro_id}} - {{$emprestimo->livro->titulo}}<br>
                Obs: {{$emprestimo->obs}}
            </p>
        </div>
    <div class="card-footer">
        {{Form::open(['route' => ['emprestimos.destroy', $emprestimo->id], 'method' => 'DELETE'])}}
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger', 'onclick'=>'return confirm("Confirma exclusão?")'])}}
            <a href="{{url('livros/')}}" class="btn btn-outline-secondary">Voltar</a>
        {{Form::close()}}
    </div>
</div>
    
@endsection