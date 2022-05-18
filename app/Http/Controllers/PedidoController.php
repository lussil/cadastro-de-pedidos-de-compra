<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::paginate(20);
        $clientes = Cliente::pluck('nome','id');
        return view('pedido.index', ['pedidos' => $pedidos, 'clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::pluck('nome','id');
        return view('pedido.create',['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'nome.cliente_id' => 'O campo cliente é obrigatório!',
            'data_pedido.required' => 'O campo data_pedido é obrigatório!',
            'status.required' => 'O campo status é obrigatório!',

        ];

        $validateData = $request->validate([
            'cliente_id'          => 'required',
            'data_pedido'         => 'required',
            'status'              => 'required'

        ], $message);

        $cliente = new Pedido;
        $cliente->cliente_id = $request->cliente_id;
        $cliente->data_pedido = $request->data_pedido;
        $cliente->status = $request->status;
        $cliente->save();

        return redirect()->route('pedido.index')->with('message', "Pedido criado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $clientes = Cliente::pluck('nome','id');
        return view('pedido.show', ['pedido' => $pedido, 'clientes' => $clientes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $clientes = Cliente::pluck('nome','id');
        return view('pedido.edit',  ['pedido' => $pedido, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'nome.required' => 'O campo cliente é obrigatório!',
            'data_pedido.required' => 'O campo data_pedido é obrigatório!',
            'status.required' => 'O campo status é obrigatório!',
        ];

        $validateData = $request->validate([
            'cliente_id'          => 'required',
            'data_pedido'         => 'required',
            'status'              => 'required'

        ], $message);

        $cliente = Pedido::findOrFail($id);;
        $cliente->cliente_id = $request->cliente_id;
        $cliente->data_pedido = $request->data_pedido;
        $cliente->status = $request->status;
        $cliente->save();

        return redirect()->route('pedido.index')->with('message', "Pedido atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedido.index')->with('message', 'Pedido Excluido');
    }
}
