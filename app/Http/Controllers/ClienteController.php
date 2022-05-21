<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(20);
        return view('cliente.index', ['clientes' => $clientes]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $clientes = Cliente::where('cpf', 'LIKE', "%{$request->cpf}%")
            ->where('nome', 'LIKE', "%{$request->nome}%")
            ->where('email', 'LIKE', "%{$request->email}%")
            ->paginate($request->number_page);
        return view('cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
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
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.max' => 'O campo nome não pode ultrapassar :max caracteres!',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'Este e-mail não é valido!',
            'cpf.required' => 'O CPF nome é obrigatório!',
            'cpf.max' => 'CPF precisa ter 11 digitos',
            'cpf.min' => 'CPF precisa ter 11 digitos',
        ];

        $validateData = $request->validate([
            'nome'          => 'required|max:20',
            'email'         => 'required|email',
            'cpf'           => 'required|max:11|min:11'
        ], $message);

        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->cpf = $request->cpf;
        $cliente->save();

        return redirect()->route('cliente.index')->with('message', "O cleinte {$cliente->nome} foi criado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.max' => 'O campo nome não pode ultrapassar :max caracteres!',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'Este e-mail não é valido!',
            'cpf.required' => 'O campo nome é obrigatório!',
            'cpf.max' => 'O campo cpf não pode ter mais de :max caracteres!',

        ];

        $validateData = $request->validate([
            'nome'          => 'required|max:20',
            'email'         => 'required|email',
            'cpf'           => 'required|max:11'
        ], $message);

        $cliente = Cliente::findOrFail($id);
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->cpf = $request->cpf;
        $cliente->save();

        return redirect()->route('cliente.index')->with('message', "O cleinte {$cliente->nome} foi alterado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('cliente.index')->with('message', 'Cliente deletado!');
    }
}
