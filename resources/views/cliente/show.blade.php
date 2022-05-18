@extends('components.layout')

@section('title', 'Visualizar cliente')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Visualizar cliente : #{{$cliente->id}}
        </div>
        <div class="card-body">

            <div class="container col-8">
                <p>ID:                  {{ $cliente->id }}</p>
                <p>Nome:                {{ $cliente->nome }}</p>
                <p>E-mail:              {{ $cliente->email }}</p>
                <p>CPF:                 {{ $cliente->cpf }}</p>
                <p>Criação:             {{ Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y H:i') }}</p>
                <p>Última modificação:  {{ Carbon\Carbon::parse($cliente->updated_at)->format('d/m/Y H:i') }}</p>
            
                <a class="btn btn-primary " href="{{URL::to('clientes')}}">Voltar</a>
            </div>
    


        </div>
    
    </div>


@endsection
@section('script')



@endsection
