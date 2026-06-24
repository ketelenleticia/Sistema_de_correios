<?php

namespace App\Http\Controllers;

use App\Models\Remetentes;
use App\Models\Destinatarios;
use App\Models\Funcionarios;
use App\Models\Encomendas;

class DashboardController extends Controller
{
    public function index()
  {
    $totalRemetentes = Remetentes::count();
    $totalDestinatarios = Destinatarios::count();
    $totalFuncionarios = Funcionarios::count();
    $totalEncomendas = Encomendas::count();

    $entregues = Encomendas::where('status', 'Entregue')->count();
    $emTransito = Encomendas::where('status', 'Em trânsito')->count();
    $pendentes = Encomendas::where('status', 'Pendente')->count();
    
    
    $funcionarios = Funcionarios::orderBy('id', 'desc')
       ->take(5)
       ->get();

    $encomendas = Encomendas::with(['remetente', 'destinatario'])
    ->orderBy('id', 'desc')
    ->take(8)
    ->get();

    $remetentes = \App\Models\Remetentes::withCount('encomendas')
    ->orderBy('id', 'desc')
    ->take(4)
    ->get();

    

    return view('dashboard', compact(
        'totalRemetentes',
        'totalDestinatarios',
        'totalFuncionarios',
        'totalEncomendas',
        'entregues',
        'emTransito',
        'pendentes',
        'encomendas',
        'funcionarios',
        'remetentes'
    ));
    }
}