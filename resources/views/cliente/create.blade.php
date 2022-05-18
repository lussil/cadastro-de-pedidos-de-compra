@extends('components.layout')

@section('title', 'Cadastrar Cliente')

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
            Cadastrar Cliente
        </div>
        <div class="card-body">

            {{ Form::open(['url' => '/cliente/create']) }}
            <div class="row">
                <div class="col-4">
                    {{ Form::label('nome', 'Nome do cliente:') }}
                    {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Ex: Fulado da silva']) }}
                </div>

                <div class="col-4">
                    {{ Form::label('email', 'E-mail:', ['class' => ' ']) }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']) }}
                </div>
                <div class="col-4">
                    {{ Form::label('cpf', 'CPF:') }}
                    {{ Form::text('cpf', null, ['class' => 'form-control ', 'step' => 'any', 'placeholder' => 'Somente Numeros. Ex: 12345678910']) }}
                </div>

            </div>
            {{ Form::submit('Enviar', ['class' => 'btn btn-outline-success mt-2 mb-2']) }}
            <a class="btn btn-primary " href="{{ URL::to('clientes') }}">Voltar</a>

            {{ Form::close() }}

        </div>
        <div class="card-footer text-muted">

        </div>
    </div>


@endsection
@section('script')



@endsection
