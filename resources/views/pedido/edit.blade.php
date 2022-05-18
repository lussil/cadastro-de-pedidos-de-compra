@extends('components.layout')

@section('title', 'Editar pedido')

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
            Editar pedido
        </div>
        <div class="card-body">

           
            {{ Form::model($pedido, ['route' => ['pedido.update', $pedido->id], 'method' => 'PUT']) }}
            <div class="row">
                <div class="col-4">
                    {{ Form::label('cliente', 'Cliente:', ['class' => ' ']) }}
                    {{ Form::select('cliente_id', $clientes, $pedido->cliente->id, ['class' => 'form-control ']) }}
                </div>

                <div class="col-4">
                    {{ Form::label('status', 'status:', ['class' => ' ']) }}
                    {{ Form::select('status', ['A' => 'Aberto', 'C' => 'Cancelado', 'P' => 'Pago'], $pedido->status, ['class' => 'form-control']) }}
                </div>
                <div class="col-2">
                    {{ Form::label('data_pedido', 'Data do pedido:') }}
                    {{ Form::date('data_pedido', $pedido->data_pedido, ['class' => 'form-control ']) }}
                </div>

            </div>
            {{ Form::submit('Enviar', ['class' => 'btn btn-outline-success mt-2 mb-2']) }}
            <a class="btn btn-primary " href="{{ URL::to('pedidos') }}">Voltar</a>

            {{ Form::close() }}

        </div>
        <div class="card-footer text-muted">

        </div>
    </div>


@endsection
@section('script')



@endsection
