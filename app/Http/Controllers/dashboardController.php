<?php

namespace App\Http\Controllers;

use App\Models\remetentes;
use App\Models\destinatarios;
use App\Models\funcionarios;
use App\Models\encomendas;

class dashboardController extends Controller
{
    public function index()
  {
    $totalRemetentes = remetentes::count();
    $totalDestinatarios = destinatarios::count();
    $totalFuncionarios = funcionarios::count();
    $totalEncomendas = encomendas::count();

    $entregues = encomendas::where('status', 'Entregue')->count();
    $emTransito = encomendas::where('status', 'Em trânsito')->count();
    $pendentes = encomendas::where('status', 'Pendente')->count();
    
    

    $encomendas = encomendas::with(['remetente', 'destinatario'])
    ->orderBy('id', 'desc')
    ->take(8)
    ->get();

    return view('dashboard', compact(
        'totalRemetentes',
        'totalDestinatarios',
        'totalFuncionarios',
        'totalEncomendas',
        'entregues',
        'emTransito',
        'pendentes',
        'encomendas'
    ));
    }
}