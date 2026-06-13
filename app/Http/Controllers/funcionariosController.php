<?php

namespace App\Http\Controllers;
use App\Models\funcionarios;
use Illuminate\Http\Request;

class funcionariosController extends Controller
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
        $funcionario = new funcionarios();
        $funcionario->nome = $request->input('nome');
        $funcionario->cargo = $request->input('cargo');
        $funcionario->telefone = $request->input('telefone');
        $funcionario->email = $request->input('email');
        $funcionario->save();
        return redirect()->route('funcionarios.index');
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
        $funcionario = funcionarios::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $funcionario = funcionarios::findOrFail($id);
        $funcionario->nome = $request->input('nome');
        $funcionario->cargo = $request->input('cargo');
        $funcionario->telefone = $request->input('telefone');
        $funcionario->email = $request->input('email');
        $funcionario->save();
        return redirect()->route('funcionarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $funcionario = funcionarios::findOrFail($id);
        $funcionario->delete();
        return redirect()->route('funcionarios.index');
    }

    
}
