<?php

namespace App\Http\Controllers;

use App\Models\Remetentes;
use App\Models\Destinatarios;
use App\Models\Encomendas;
use Illuminate\Http\Request;

class EncomendasController extends Controller
{
    public function index()
    {
    $encomendas = Encomendas::with(['remetente', 'destinatario'])
    ->paginate(8);

    return view('encomendas.index', compact('encomendas'));
    }
    
    public function create()
    {
         $remetentes = Remetentes::all();
         $destinatarios = Destinatarios::all();

        return view('encomendas.create', compact('remetentes', 'destinatarios'));
    }

    public function store(Request $request)
{
    $request->validate([
        'descricao' => 'required',
        'peso' => 'required',
        'status' => 'required',
        'data_envio' => 'required',
        'data_entregar' => 'required',
        'id_remetentes' => 'required',
        'id_destinatarios' => 'required',
    ]);

    Encomendas::create([
        'descricao' => $request->descricao,
        'peso' => $request->peso,
        'status' => $request->status,
        'data_envio' => $request->data_envio,
        'data_entregar' => $request->data_entregar,
        'id_remetentes' => $request->id_remetentes,
        'id_destinatarios' => $request->id_destinatarios,
    ]);

    return redirect()
        ->route('encomendas.index')
        ->with('success', 'Encomenda cadastrada com sucesso!');
}

    public function show($id)
    {
        
    }

    public function edit($id)
    { 
       $encomenda = Encomendas::findOrFail($id);
       $remetentes = Remetentes::all();
       $destinatarios = Destinatarios::all();

    return view('encomendas.edit', compact(
        'encomenda',
        'remetentes',
        'destinatarios'
    ));
    }

    public function update(Request $request, $id)
    {
        $encomenda = Encomendas::findOrFail($id);

        $request->validate([
            'descricao' => 'required',
            'peso' => 'required',
            'status' => 'required',
            'data_envio' => 'required',
            'data_entregar' => 'required',
            'id_remetentes' => 'required',
            'id_destinatarios' => 'required',
        ]);

        $encomenda->update($request->all());

        return redirect()->route('encomendas.index')
                         ->with('success', 'Encomenda atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $encomenda = Encomendas::findOrFail($id);

        $encomenda->delete();

        return redirect()->route('encomendas.index')
                         ->with('success', 'Encomenda excluída com sucesso!');
    }
}