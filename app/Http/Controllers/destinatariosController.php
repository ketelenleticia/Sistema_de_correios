<?php

namespace App\Http\Controllers;
use App\Models\Destinatarios;
use Illuminate\Http\Request;

class DestinatariosController extends Controller
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
         $destinatario = new Destinatarios();

    $destinatario->nome = $request->input('nome');
    $destinatario->cpf = $request->input('cpf');
    $destinatario->telefone = $request->input('telefone');
    $destinatario->endereco = $request->input('endereco');

    $destinatario->save();

    return redirect()
        ->route('destinatarios.index')
        ->with('success', 'Destinatário cadastrado com sucesso!');
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
        $destinatario = Destinatarios::findOrFail($id);
        return view('destinatarios.edit', compact('destinatario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $destinatario = Destinatarios::findOrFail($id);

        $destinatario->nome = $request->input('nome');
        $destinatario->cpf = $request->input('cpf');
        $destinatario->telefone = $request->input('telefone');
        $destinatario->endereco = $request->input('endereco');

        $destinatario->save();

        return redirect()
        ->route('destinatarios.index')
        ->with('success', 'Destinatário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $destinatario = Destinatarios::findOrFail($id);

       if ($destinatario->encomendas()->exists()) {
           return redirect()
            ->route('destinatarios.index')
            ->with('error', 'Não é possível excluir este destinatário porque ele possui encomendas cadastradas.');
       }

       $destinatario->delete();

       return redirect()
           ->route('destinatarios.index')
           ->with('success', 'Destinatário excluído com sucesso!');
    }
}