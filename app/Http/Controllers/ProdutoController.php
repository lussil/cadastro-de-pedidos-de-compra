<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::paginate(20);
        return view('produto.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
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
            'nome.required'           => 'O campo nome é obrigatório!',
            'nome.max'                => 'O campo Nome não pode ultrapassar :max caracteres',
            'cod_barras.required'     => 'O Códio de barras é obrigatório',
            'cod_barras.max'          => 'O codigo de barras não oide ultrarpassar :max caracteres',
            'valor_unitario.required' => 'O campo valor é obrigatorio'
        ];

        $validateData = $request->validate([
            'nome'              => 'required|max:20',
            'cod_barras'        => 'required|max:100',
            'valor_unitario'    => 'required'
        ], $message);

        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->cod_barras = $request->cod_barras;
        $produto->valor_unitario = $request->valor_unitario;
        $produto->save();

        return redirect()->route('produto.index')->with('message', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'nome.required'           => 'O campo nome é obrigatório!',
            'nome.max'                => 'O campo Nome não pode ultrapassar :max caracteres',
            'cod_barras.required'     => 'O Códio de barras é obrigatório',
            'cod_barras.max'          => 'O codigo de barras não oide ultrarpassar :max caracteres',
            'valor_unitario.required' => 'O campo valor é obrigatorio'
        ];

        $validateData = $request->validate([
            'nome'              => 'required|max:20',
            'cod_barras'        => 'required|max:100',
            'valor_unitario'    => 'required'
        ], $message);

        $produto = Produto::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->cod_barras = $request->cod_barras;
        $produto->valor_unitario = $request->valor_unitario;
        $produto->save();

        return redirect()->route('produto.index')->with('message', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produto.index')->with('message', 'Produto deletado');
    }
}
