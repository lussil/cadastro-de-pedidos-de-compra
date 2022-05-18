@extends('components.layout')

@section('title', 'Visualizar pedido')

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
            Visualizar pedido : #{{ $pedido->id }}
        </div>
        <div class="card-body">

            <div class="container col-8">
                <p>ID: {{ $pedido->id }}</p>
                <p>Status: {{ $pedido->status }}</p>
                <p>Nome do cliente: {{ $pedido->cliente->nome }}</p>
                <p>Data do pedido: {{ Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y H:i') }}</p>
                <p>Criação: {{ Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y H:i') }}</p>
                <p>Última modificação: {{ Carbon\Carbon::parse($pedido->updated_at)->format('d/m/Y H:i') }}</p>
                <p>Produtos:
                <ul>
                    @foreach ($pedido->produto as $produto)
                        <li> <a href=" {{ URL::to('produto/' . $produto->id) }}" target="_blank"
                                rel="noopener noreferrer">{{ $produto->nome }}</a></td>
                        </li>
                    @endforeach
                </ul>
                <p>

                    <a class="btn btn-primary " href="{{ URL::to('pedidos') }}">Voltar</a>
            </div>



        </div>

    </div>


@endsection
@section('script')



@endsection
