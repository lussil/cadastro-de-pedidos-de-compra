@extends('components.layout')

@section('title', 'Produtos do pedido')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

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
    $pedido_id = $pedidoProdutoItens[0]->pedido_id;
    @endphp

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Adicionar produto ao pedido</h5>

            {{ Form::open(['url' => '/pedido_produto/' . $pedido_id . '/create']) }}
            <div class="row">
                <div class="col-4">
                    {{ Form::label('produto', 'Produto:', ['class' => ' ']) }}
                    {{ Form::select('produto_id', $produtos, null, ['class' => 'form-control ']) }}
                </div>
                <div class="col-4">
                    {{ Form::label('quantidade', 'Quantidade:') }}
                    {{ Form::number('quantidade', null, ['class' => 'form-control ', 'step' => '1', 'placeholder' => '']) }}
                </div>
                <div class="col-4 mt-3">
                    {{ Form::submit('Enviar', ['class' => 'btn btn-outline-success mt-2 mb-2']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>


        <div class="card-body">
            <h5 class="card-title">Produtos do pedido : #{{ $pedido_id }}</h5>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th>Cód. Produto</th>
                        <th>Nome produto</th>
                        <th>Quantidade</th>
                        <th>Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidoProdutoItens as $key => $pedidoProduto)
                        <tr>
                            <td>{{ $pedidoProduto->produto_id }}</td>
                            <td> <a href=" {{ URL::to('produto/' . $pedidoProduto->produto_id) }}" target="_blank"
                                    rel="noopener noreferrer">{{ $pedidoProduto->produto->nome }}</a></td>
                            <td>{{ $pedidoProduto->quantidade }}</td>
                            <td>
                                <div class="input-group ">
                                    {{ Form::open(['url' => '/pedido_produto/' . $pedidoProduto->id, 'onsubmit' => 'return confirm("Deseja excluir esse registro?")']) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Excluir', ['class' => ' input-group-btn btn btn-outline-danger', 'id' => 'delete']) }}
                                    {{ Form::close() }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{ $pedidoProdutoItens->links() }}
        </div>
    </div>


@endsection
@section('script')

@endsection
