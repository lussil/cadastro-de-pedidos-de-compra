@extends('components.layout')

@section('title', 'Visualizar produto')

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
            Visualizar produto : #{{$produto->id}}
        </div>
        <div class="card-body">

            <div class="container col-8">
                <p>ID:                  {{ $produto->id }}</p>
                <p>Nome:                {{ $produto->nome }}</p>
                <p>Cód. De Barras:      {{ $produto->cod_barras }}</p>
                <p>Criação:             {{ Carbon\Carbon::parse($produto->created_at)->format('d/m/Y ') }}</p>
                <p>Última modificação:  {{ Carbon\Carbon::parse($produto->updated_at)->format('d/m/Y ') }}</p>
            
                <a class="btn btn-primary " href="{{URL::to('produtos')}}">Voltar</a>
            </div>
    


        </div>
    
    </div>


@endsection
@section('script')



@endsection
