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
    @php
        $total = 0;
    @endphp
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
                    @foreach ($pedidoProdutoItens as $key => $pedidoProduto)
                        <li> <a href=" {{ URL::to('produto/' . $pedidoProduto->produto_id) }}" target="_blank"
                                rel="noopener noreferrer">{{ $pedidoProduto->produto->nome }} </a>
                            <ul>
                                <li>Quantidade : {{ $pedidoProduto->quantidade }} </li>
                                <li>Valor : {{ $pedidoProduto->produto->valor_unitario }}</li>
                            </ul>

                        </li>
                        @php
                        $total += $pedidoProduto->produto->valor_unitario * $pedidoProduto->quantidade ;
                    @endphp
                    @endforeach
                </ul>
                <p>
                <p>Valor Total : {{ $total}} </p>
            

                <a class="btn btn-primary " href="{{ URL::to('pedidos') }}">Voltar</a>
            </div>



        </div>

    </div>


@endsection
@section('script')



@endsection
