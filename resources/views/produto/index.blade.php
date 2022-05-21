@extends('components.layout')

@section('title', 'Produtos')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ URL::to('produto/create') }}" type="button" class="btn btn-success float-right mb-2">Novo produto</a>

            {{ Form::open(['url' => '/produto/search']) }}
            <div class="row">
                <div class="col-3">
                    {{ Form::label('nome', 'Nome do produto:') }}
                    {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Ex: produto']) }}
                </div>

                <div class="col-3">
                    {{ Form::label('cod_barras', 'Cod. Barras:', ['class' => ' ']) }}
                    {{ Form::text('cod_barras', null, ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
                <div class="col-2">
                    {{ Form::label('valor', 'Valor:') }}
                    {{ Form::number('valor_unitario', null, ['class' => 'form-control ', 'step' => 'any', 'placeholder' => 'Ex: R$ 4,00']) }}
                </div>
                <div class="col-2">
                    {{ Form::label('number_page', 'Numero de páginas:', ['class' => ' ']) }}
                    {{ Form::select('number_page', ['10' => '10','20' => '20', '50' => '50', '100' => '100' ], '20', ['class' => 'form-control']) }}
                </div>
                <div class="col-2">
                    {{ Form::submit('Filtrar', ['class' => 'btn btn-outline-success mt-4 mb-2']) }}
                    <a class="btn btn-primary mt-4 mb-2" href="{{ URL::to('produtos') }}">Limpar</a>
                    {{ Form::close() }}
                </div>
            </div>
          

        </div>
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Cod. de Barras</th>
                        <th>Valor</th>
                        <th>Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $key => $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->cod_barras }}</td>
                            <td>{{ $produto->valor_unitario }}</td>

                            <td>
                                <div class="input-group ">
                                    <a type="button" href="{{ URL::to('produto/' . $produto->id . '/edit') }}"
                                        class=" input-group-btn btn btn-outline-primary">Editar</a>
                                    <a type="button" href="{{ URL::to('produto/' . $produto->id) }}"
                                        class=" input-group-btn btn btn-outline-secondary">visualizar</a>


                                    {{ Form::open(['url' => 'produto/' . $produto->id, 'onsubmit' => 'return confirm("Deseja excluir esse registro?")']) }}
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
            {{ $produtos->links() }}
        </div>
    </div>


@endsection
@section('script')



@endsection
