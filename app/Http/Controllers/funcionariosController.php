<?php

namespace App\Http\Controllers;
use App\Models\Funcionarios;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionarios::paginate(8);
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $funcionario = new Funcionarios();

    $funcionario->nome = $request->input('nome');
    $funcionario->cargo = $request->input('cargo');
    $funcionario->telefone = $request->input('telefone');
    $funcionario->email = $request->input('email');

    $funcionario->save();

    return redirect()
        ->route('funcionarios.index')
        ->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $funcionario = Funcionarios::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $funcionario = Funcionarios::findOrFail($id);
        $funcionario->nome = $request->input('nome');
        $funcionario->cargo = $request->input('cargo');
        $funcionario->telefone = $request->input('telefone');
        $funcionario->email = $request->input('email');
        $funcionario->save();
       
        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index')
                         ->with('success', 'Encomenda atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $funcionario = Funcionarios::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('funcionarios.index')
                         ->with('success', 'Funcionario excluído com sucesso!');
    }

    
}