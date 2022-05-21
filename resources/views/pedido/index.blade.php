@extends('components.layout')

@section('title', 'Pedidos')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ URL::to('pedido/create') }}" type="button" class="btn btn-success float-right mb-2">Novo pedido</a>


            {{ Form::open(['url' => '/pedido/search']) }}
            <div class="row">
                <div class="col-4">
                    {{ Form::label('cliente', 'Cliente:', ['class' => ' ']) }}
                    {{ Form::select('cliente_id', $clientes, null, ['placeholder' => 'Selecione uma opção','class' => 'form-control '] ) }}
                </div>

                <div class="col-2">
                    {{ Form::label('status', 'status:', ['class' => ' ']) }}
                    {{ Form::select('status', ['' => '', 'A' => 'Aberto', 'C' => 'Cancelado', 'P' => 'Pago'], null, ['class' => 'form-control']) }}
                </div>
                <div class="col-2">
                    {{ Form::label('data_pedido', 'Data do pedido:') }}
                    {{ Form::date('data_pedido', null, ['class' => 'form-control ']) }}
                </div>
                <div class="col-2">
                    {{ Form::label('number_page', 'Numero de páginas:', ['class' => ' ']) }}
                    {{ Form::select('number_page', ['10' => '10','20' => '20', '50' => '50', '100' => '100' ], '20', ['class' => 'form-control']) }}
                </div>
                <div class="col-2">
                    {{ Form::submit('Filtrar', ['class' => 'btn btn-outline-success mt-3 mb-2']) }}
                    <a class="btn btn-primary mt-3 mb-2" href="{{ URL::to('pedidos') }}">Limpar</a>
                    {{ Form::close() }}
                </div>

            </div>

        </div>
        <div class="card-body">
            <h5 class="card-title">Pedidos</h5>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th>Cód. Pedido</th>
                        <th>Data do pedido</th>
                        <th>Nome cliente</th>
                        <th>status</th>
                        <th>Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $key => $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->data_pedido }}</td>
                            <td> <a href=" {{ URL::to('cliente/' . $pedido->cliente_id) }}" target="_blank"
                                    rel="noopener noreferrer">{{ $pedido->cliente->nome }}</a></td>

                            {{-- <td>{{ $pedido->cliente->nome }}</td> --}}
                            <td>{{ $pedido->status }}</td>
                            <td>
                                <div class="input-group ">
                                    <a type="button" href="{{ URL::to('pedido/' . $pedido->id . '/edit') }}"
                                        class=" input-group-btn btn btn-outline-primary">Editar</a>
                                    <a type="button" href="{{ URL::to('pedido/' . $pedido->id) }}"
                                        class=" input-group-btn btn btn-outline-secondary">visualizar</a>
                                    <a type="button" href="{{ URL::to('pedido_produto/' . $pedido->id) }}"
                                        class=" input-group-btn btn btn-outline-primary">produtos</a>

                                    {{ Form::open(['url' => 'pedido/' . $pedido->id, 'onsubmit' => 'return confirm("Deseja excluir esse registro?")']) }}
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
            {{ $pedidos->links() }}
        </div>
    </div>


@endsection
@section('script')



@endsection
