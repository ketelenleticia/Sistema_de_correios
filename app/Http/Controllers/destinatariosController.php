<?php

namespace App\Http\Controllers;
use App\Models\destinatarios;
use Illuminate\Http\Request;

class destinatariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $destinatarios = Destinatarios::paginate(8);
        return view('destinatarios.index', compact('destinatarios'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('destinatarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $destinatario = new destinatarios();
        $destinatario->nome = $request->input('nome');
        $destinatario->cpf = $request->input('cpf');
        $destinatario->telefone = $request->input('telefone');
        $destinatario->endereco = $request->input('endereco');
        $destinatario->save();
        return redirect()->route('destinatarios.index');
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
        $destinatario = destinatarios::findOrFail($id);
        return view('destinatarios.edit', compact('destinatario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $destinatario = destinatarios::findOrFail($id);
        $destinatario->nome = $request->input('nome');
        $destinatario->cpf = $request->input('cpf');
        $destinatario->telefone = $request->input('telefone');
        $destinatario->endereco = $request->input('endereco');
        $destinatario->save();
        return redirect()->route('destinatarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destinatario = destinatarios::findOrFail($id);
        $destinatario->delete();
        return redirect()->route('destinatarios.index');
    }
}