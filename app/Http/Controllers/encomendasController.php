<?php

namespace App\Http\Controllers;

use App\Models\remetentes;
use App\Models\destinatarios;
use App\Models\encomendas;
use Illuminate\Http\Request;

class encomendasController extends Controller
{
    public function index()
    {
    $encomendas = encomendas::with(['remetente', 'destinatario'])
    ->paginate(8);

    return view('encomendas.index', compact('encomendas'));
    }
    
    public function create()
    {
         $remetentes = remetentes::all();
         $destinatarios = destinatarios::all();

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

    encomendas::create([
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
       $encomenda = encomendas::findOrFail($id);
       $remetentes = remetentes::all();
       $destinatarios = destinatarios::all();

    return view('encomendas.edit', compact(
        'encomenda',
        'remetentes',
        'destinatarios'
    ));
    }

    public function update(Request $request, $id)
    {
        $encomenda = encomendas::findOrFail($id);

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
        $encomenda = encomendas::findOrFail($id);

        $encomenda->delete();

        return redirect()->route('encomendas.index')
                         ->with('success', 'Encomenda excluída com sucesso!');
    }
}