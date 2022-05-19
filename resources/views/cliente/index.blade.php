@extends('components.layout')

@section('title', 'Clientes')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ URL::to('cliente/create') }}" type="button" class="btn btn-success float-right mb-2">Novo cliente</a>

            {{ Form::open(['url' => '/cliente/search']) }}
            <div class="row">
                <div class="col-3">
                    {{ Form::label('nome', 'Nome do cliente:') }}
                    {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Ex: Fulado da silva']) }}
                </div>

                <div class="col-3">
                    {{ Form::label('email', 'E-mail:', ['class' => ' ']) }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']) }}
                </div>
                <div class="col-3">
                    {{ Form::label('cpf', 'CPF:') }}
                    {{ Form::text('cpf', null, ['class' => 'form-control ', 'step' => 'any', 'placeholder' => 'Somente Numeros. Ex: 12345678910']) }}
                </div>
                <div class="col-3 mt-3">
                    {{ Form::submit('Filtrar', ['class' => 'btn btn-outline-success mt-2 mb-2']) }}
                    {{ Form::close() }}
                </div>
            </div>

        </div>
        <div class="card-body">
            <h5 class="card-title">Clientes</h5>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>email</th>
                        <th>cpf</th>
                        <th>Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $key => $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->cpf }}</td>

                            <td>
                                <div class="input-group ">
                                    <a type="button" href="{{ URL::to('cliente/' . $cliente->id . '/edit') }}"
                                        class=" input-group-btn btn btn-outline-primary">Editar</a>
                                    <a type="button" href="{{ URL::to('cliente/' . $cliente->id) }}"
                                        class=" input-group-btn btn btn-outline-secondary">visualizar</a>


                                    {{ Form::open(['url' => 'cliente/' . $cliente->id, 'onsubmit' => 'return confirm("Deseja excluir esse registro?")']) }}
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
            {{ $clientes->links() }}
        </div>
    </div>

@endsection
