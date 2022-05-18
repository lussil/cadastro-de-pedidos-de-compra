@extends('components.layout')

@section('title', 'Produtos')

@section('content')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    <div class="card">
        <div class="card-header">
            <a href="{{ URL::to('produto/create') }}" type="button" class="btn btn-success float-right">Novo produto</a>
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
                        <th >Ações</th>
                      
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
                                <a type="button" href="{{ URL::to('produto/'.$produto->id.'/edit') }}" class=" input-group-btn btn btn-outline-primary">Editar</a>
                                <a type="button" href="{{ URL::to('produto/'.$produto->id) }}" class=" input-group-btn btn btn-outline-secondary">visualizar</a>
                                
                           
                                {{ Form::open(['url' => 'produto/' . $produto->id, 'onsubmit' => 'return confirm("Deseja excluir esse registro?")']) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Excluir', ['class' => ' input-group-btn btn btn-outline-danger', 'id'=>'delete']) }}
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
