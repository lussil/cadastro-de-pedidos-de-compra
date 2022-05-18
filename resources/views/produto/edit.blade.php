@extends('components.layout')

@section('title', 'Editar produto')

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
            Editar produto : #{{$produto->id}}
        </div>
        <div class="card-body">

            {{ Form::model($produto, ['route' => ['produto.update', $produto->id], 'method' => 'PUT']) }}

            <div class="row">
                <div class="col-4">
                    {{ Form::label('nome', 'Nome do produto:') }}
                    {{ Form::text('nome', $produto->nome, ['class' => 'form-control', 'placeholder' => 'Ex: produto']) }}
                </div>

                <div class="col-4">
                    {{ Form::label('cod_barras', 'Cod. Barras:', ['class' => ' ']) }}
                    {{ Form::text('cod_barras', $produto->cod_barras, ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
                <div class="col-4">
                    {{ Form::label('valor', 'Valor:') }}
                    {{ Form::number('valor_unitario', $produto->valor_unitario, ['class' => 'form-control ', 'step' => 'any', 'placeholder' => 'Ex: R$ 4,00']) }}
                </div>

            </div>
            {{ Form::submit('Enviar', ['class' => 'btn btn-outline-success mt-2 mb-2']) }}
            <a class="btn btn-primary " href="{{ URL::to('produtos') }}">Voltar</a>

            {{ Form::close() }}

        </div>
        <div class="card-footer text-muted">

        </div>
    </div>


@endsection
@section('script')



@endsection
