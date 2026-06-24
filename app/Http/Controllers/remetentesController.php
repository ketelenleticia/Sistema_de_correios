<?php

namespace App\Http\Controllers;
use App\Models\Remetentes;
use Illuminate\Http\Request;

class RemetentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remetentes = Remetentes::paginate(8);

        return view('remetentes.index', compact('remetentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('remetentes.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nome' => 'required',
        'cpf' => 'required',
        'telefone' => 'required',
        'endereco' => 'required',
    ]);

    $remetente = new Remetentes();

    $remetente->nome = $request->nome;
    $remetente->cpf = $request->cpf;
    $remetente->telefone = $request->telefone;
    $remetente->endereco = $request->endereco;

    $remetente->save();

    return redirect()
        ->route('remetentes.index')
        ->with('success', 'Remetente cadastrado com sucesso!');
    
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
        $remetente = Remetentes::findOrFail($id);
        return view('remetentes.edit', compact('remetente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $remetente = Remetentes::findOrFail($id);
        $remetente->nome = $request->input('nome');
        $remetente->cpf = $request->input('cpf');
        $remetente->telefone = $request->input('telefone');
        $remetente->endereco = $request->input('endereco');
        $remetente->save();
        
         return redirect()->route('remetentes.index')
        ->with('success', 'Remetente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $remetente = Remetentes::findOrFail($id);
        
         if ($remetente->encomendas()->exists()) {
        return redirect()
            ->route('remetentes.index')
            ->with('error', 'Não é possível excluir este remetente porque ele possui encomendas cadastradas.');
        }

        $remetente->delete();

        return redirect()->route('remetentes.index')
        ->with('success', 'Remetente excluído com sucesso!');
    }
}