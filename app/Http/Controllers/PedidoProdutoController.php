<?php

namespace App\Http\Controllers;

use App\Models\PedidoProduto;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pedido = Pedido::findOrfail($id);
        $pedidoProdutoItens = PedidoProduto::where('pedido_id', '=', $id)->paginate(20);
        // dd($pedidoProdutoItens[0]->produto->nome);
        $produtos = Produto::pluck('nome', 'id');
        return view('pedido_produto.index', ['pedido' => $pedido, 'pedidoProdutoItens' => $pedidoProdutoItens, 'produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedido_produto.create', ['pedido' => $pedido]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pedido)
    {
        $message = [
            'produto_id.required' => 'O campo produto é obrigatório!',
            'quantidade.required' => 'O campo quantidade é obrigatório!'
        ];

        $validateData = $request->validate([
            'produto_id'          => 'required',
            'quantidade'         => 'required'
        ], $message);

        $pedido = Pedido::findOrFail($pedido);
        $pedidoProduto = new PedidoProduto;
        $pedidoProduto->produto_id = $request->produto_id;
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->quantidade = $request->quantidade;
        $pedidoProduto->save();

        return redirect()->back()->with('message', 'Produto adicionado ao pedido!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedido.show', ['pedido' => $pedido]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $message = [
            'produto_id.required' => 'O campo cliente é obrigatório!',
            'data_pedido.required' => 'O campo data_pedido é obrigatório!'
        ];

        $validateData = $request->validate([
            'produto_id'          => 'required',
            'quantidade'         => 'required'
        ], $message);

        $pedidoProduto = PedidoProduto::findOrFail($id);
        $pedidoProduto->produto_id = $request->produto_id;
        $pedidoProduto->quantidade = $request->quantidade;
        $pedidoProduto->save();
        return redirect()->back()->with('message', 'O pedido foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = PedidoProduto::findOrFail($id);
        $produto->delete();
        return redirect()->back()->with('message', 'O pedido foi atualizado com sucesso!');
    }
}
