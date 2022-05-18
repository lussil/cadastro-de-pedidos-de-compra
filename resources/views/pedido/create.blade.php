@extends('components.layout')

@section('title', 'Cadastrar pedido')

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
            Cadastrar pedido
        </div>
        <div class="card-body">

            {{ Form::open(['url' => '/pedido/create']) }}
            <div class="row">
                <div class="col-4">
                    {{ Form::label('cliente', 'Cliente:', ['class' => ' ']) }}
                    {{ Form::select('cliente_id', $clientes, null, ['class' => 'form-control ']) }}
                </div>

                <div class="col-4">
                    {{ Form::label('status', 'status:', ['class' => ' ']) }}
                    {{ Form::select('status', ['A' => 'Aberto', 'C' => 'Cancelado', 'P' => 'Pago'], 'A', ['class' => 'form-control']) }}
                </div>
                <div class="col-2">
                    {{ Form::label('data_pedido', 'Data do pedido:') }}
                    {{ Form::date('data_pedido', \Carbon\Carbon::now(), ['class' => 'form-control ']) }}
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
