<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envios - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-[#0A0A0A] text-gray-800 antialiased font-sans">

    <div class="flex min-h-screen">

        <aside class="w-64 bg-[#111111] border-r border-[#242424] flex flex-col justify-between p-4 shrink-0">
            <div>
                <div class="flex items-center gap-2 px-3 py-4 mb-6">
                    <div class="bg-orange-500 text-white p-2 rounded-xl shadow-sm">
                        <i class="fa-solid fa-truck-fast text-lg"></i>
                    </div>
                    <span class="text-xl  text-[#FFFFFF] font-bold tracking-wide">CorreiosSys</span>
                </div>

                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2.5 bg-orange-500/10 text-orange-500 border-orange-500 font-medium rounded-lg transition-colors">
                        <i class="fa-solid fa-house w-5 text-center"></i> Dashboard
                    </a>
                    <a href="{{ route('remetentes.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors">
                        <i class="fa-solid fa-users w-5 text-center"></i> Remetentes
                    </a>
                    <a href="{{ route('destinatarios.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors">
                        <i class="fa-solid fa-user-tag w-5 text-center"></i> Destinatários
                    </a>
                    <a href="{{ route('funcionarios.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors">
                        <i class="fa-solid fa-user-tie w-5 text-center"></i> Funcionários
                    </a>
                    <a href="{{ route('encomendas.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors">
                        <i class="fa-solid fa-cubes w-5 text-center"></i> Encomendas
                    </a>
                    <div class="pt-4 mt-4 border-t border-[#242424] space-y-1">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="w-full flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-red-600 rounded-lg transition-colors">
                                <i class="fa-solid fa-right-from-bracket w-5 text-orange-500 text-center"></i>
                                Logout
                            </button>
                        </form>

                    </div>
                </nav>
            </div>

            <div class="bg-[#0A0A0A] border border-[#242424] rounded-2xl p-4 text-center">
                <div class="flex justify-center mb-2">
                    <i class="fa-solid fa-truck-fast text-4xl text-orange-500"></i>
                </div>
                <h4 class="font-bold text-sm text-[#FFFFFF] mb-1">Entregas eficientes</h4>
                <p class="text-xs text-[#A1A1AA] leading-relaxed mb-3">Acompanhe todas as encomendas em tempo real e
                    gerencie suas operações com agilidade.</p>
                <button
                    class="w-full bg-orange-500 text-white text-xs font-semibold py-2 px-4 rounded-xl hover:bg-orange-600 transition-colors">Saiba
                    mais</button>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">

            <header class="h-16 bg-[#111111] border-b border-[#242424] flex items-center justify-between px-8 shrink-0">
                <div>
                    <h1 class="text-lg font-bold text-[#FFFFFF]">Bem-vindo de volta, {{ Auth::user()->name }}!</h1>
                    <p class="text-xs text-[#A1A1AA]">Aqui está o resumo geral das suas operações.</p>
                </div>

                @if(session('correct'))
                <div class="bg-green-500/20 border border-green-500 text-green-400  py-3 rounded-xl mb-6">
                    {{ session('correct') }}
                </div>
                @endif
                <div class="flex items-center gap-5">

                    <div class="h-6 w-px bg-gray-200"></div>
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=60"
                            class="w-8 h-8 rounded-full object-cover">
                        <div class="text-left hidden sm:block">
                            <p class="text-xs font-semibold text-[#FFFFFF] leading-none">{{ Auth::user()->name }}</p>
                            <span class="text-[10px] text-[#A1A1AA]">Administrador</span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6 space-y-6 overflow-y-auto max-w-[1600px] w-full mx-auto flex-1">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div
                        class="bg-[#111111] p-4 rounded-2xl border border-[#242424] shadow-sm flex justify-between items-center">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="p-2 bg-orange-50 text-orange-500 rounded-xl text-sm"><i
                                        class="fa-solid fa-users"></i></span>
                                <span class="text-xs text-[#A1A1AA] font-medium">Remetentes</span>
                            </div>
                            <p class="text-2xl font-bold text-[#FFFFFF]">{{ $totalRemetentes }}</p>
                            <span class="text-[11px] text-emerald-500 font-semibold"><i
                                    class="fa-solid fa-arrow-up text-[9px]"></i><span class="text-gray-400 font-normal">
                                    Remetentes cadastrados</span></span>
                        </div>
                        <div class="w-20 h-10"><canvas id="miniChart1"></canvas></div>
                    </div>
                    <div
                        class="bg-[#111111] p-4 rounded-2xl border border-[#242424] shadow-sm flex justify-between items-center">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="p-2 bg-orange-50 text-orange-500 rounded-xl text-sm"><i
                                        class="fa-solid fa-location-dot"></i></span>
                                <span class="text-xs text-[#A1A1AA] font-medium">Destinatários</span>
                            </div>
                            <p class="text-2xl font-bold text-[#FFFFFF]">{{ $totalDestinatarios }}</p>
                            <span class="text-[11px] text-emerald-500 font-semibold"><i
                                    class="fa-solid fa-arrow-up text-[9px]"></i> <span
                                    class="text-[#A1A1AA] font-normal">Destinatários cadastrados</span></span>
                        </div>
                        <div class="w-20 h-10"><canvas id="miniChart2"></canvas></div>
                    </div>
                    <div
                        class="bg-[#111111] p-4 rounded-2xl border border-[#242424] shadow-sm flex justify-between items-center">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="p-2 bg-orange-50 text-orange-500 rounded-xl text-sm"><i
                                        class="fa-solid fa-user-tie"></i></span>
                                <span class="text-xs text-[#A1A1AA] font-medium"> Funcionários</span>
                            </div>
                            <p class="text-2xl font-bold text-[#FFFFFF]">{{ $totalFuncionarios }}</p>
                            <span class="text-[11px] text-emerald-500 font-semibold"><i
                                    class="fa-solid fa-arrow-up text-[9px]"></i><span
                                    class="text-[#A1A1AA] font-normal">
                                    Funcionários cadastrados</span></span>
                        </div>
                        <div class="w-20 h-10"><canvas id="miniChart3"></canvas></div>
                    </div>
                    <div
                        class="bg-[#111111] p-4 rounded-2xl border border-[#242424] shadow-sm flex justify-between items-center">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="p-2 bg-orange-50 text-orange-500 rounded-xl text-sm"><i
                                        class="fa-solid fa-box"></i></span>
                                <span class="text-xs text-[#A1A1AA] font-medium">Encomendas</span>
                            </div>
                            <p class="text-2xl font-bold text-[#FFFFFF]">{{ $totalEncomendas }}</p>
                            <span class="text-[11px] text-emerald-500 font-semibold"><i
                                    class="fa-solid fa-arrow-up text-[9px]"></i><span
                                    class="text-[#A1A1AA] font-normal">
                                    Encomendas cadastradas</span></span>
                        </div>
                        <div class="w-20 h-10"><canvas id="miniChart4"></canvas></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">

                    <div
                        class="lg:col-span-5 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="font-bold text-sm text-[#FFFFFF]">Últimas Encomendas</h3>
                                <a href="{{ route('encomendas.index') }}"
                                    class="text-xs text-orange-500 font-semibold hover:underline">Ver todas</a>
                            </div>
                            <div class="overflow-x-auto text-xs">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr class="text-gray-400 border-b border-[#242424]">
                                            <th class="pb-2 font-normal">ID</th>
                                            <th class="pb-2 font-normal">Remetente</th>
                                            <th class="pb-2 font-normal">Destinatário</th>
                                            <th class="pb-2 font-normal">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#242424] text-[#A1A1AA] font-medium">
                                        @foreach ($encomendas as $encomenda)
                                        <tr>
                                            <td class="py-2.5 text-gray-400">
                                                #{{ $encomenda->id }}
                                            </td>

                                            <td>
                                                {{ $encomenda->remetente->nome ?? 'Não informado' }}
                                            </td>

                                            <td>
                                                {{ $encomenda->destinatario->nome ?? 'Não informado' }}
                                            </td>

                                            <td>
                                                @if($encomenda->status == 'pendente')
                                                <span
                                                    class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-md text-[10px]">
                                                    Entregue
                                                </span>
                                                @elseif($encomenda->status == 'Em trânsito')
                                                <span
                                                    class="bg-orange-50 text-orange-600 px-2 py-0.5 rounded-md text-[10px]">
                                                    Em trânsito
                                                </span>
                                                @elseif($encomenda->status == 'entregue')
                                                <span
                                                    class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded-md text-[10px]">
                                                    Coletada
                                                </span>
                                                @else
                                                <span
                                                    class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded-md text-[10px]">
                                                    {{ $encomenda->status }}
                                                </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('encomendas.index') }}"
                            class="text-center w-full bg-orange-50/50 hover:bg-orange-50 text-orange-600 font-semibold text-xs py-2 rounded-xl mt-4 transition-colors">Ver
                            todas as encomendas →</a>
                    </div>

                    <div
                        class="lg:col-span-3 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-bold text-sm text-[#FFFFFF]">Status das Encomendas</h3>
                        </div>
                        <div class="relative flex items-center justify-center my-2 h-36">
                            <canvas id="donutChart"></canvas>

                            <div class="absolute text-center">
                                <p class="text-lg font-bold text-[#FFFFFF] leading-none">
                                    {{ $totalEncomendas }}
                                </p>
                                <span class="text-[10px] text-gray-400">Total</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-x-2 gap-y-1.5 text-[11px] text-[#FFFFFF] font-medium">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                Entregues ({{ $entregues }})
                            </div>

                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                                Em trânsito ({{ $emTransito }})
                            </div>

                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                                Pendentes ({{ $pendentes }})
                            </div>

                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                                <span class="text-[#FFFFFF]">Total {{ $totalEncomendas }}</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="lg:col-span-4 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col">
                        <h3 class="font-bold text-sm text-[#FFFFFF] mb-3">Mapa de Entregas</h3>
                        <div
                            class="flex-1 min-h-[180px] bg-gray-100 rounded-xl overflow-hidden relative border border-[#242424]">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d117039.56545155628!2d-46.61168537039433!3d-23.551025586940026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1710000000000!5m2!1spt-BR!2sbr"
                                class="w-full h-full border-0 grayscale contrast-125 opacity-85" allowfullscreen=""
                                loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">

                    <div
                        class="lg:col-span-5 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-sm text-[#FFFFFF]">Encomendas por Mês</h3>
                            <select
                                class="text-xs bg-gray-50 border border-[#242424] rounded-lg px-2 py-1 font-medium text-gray-600 outline-none">
                                <option>Este ano</option>
                            </select>
                        </div>
                        <div class="flex-1 h-48"><canvas id="barChart"></canvas></div>
                    </div>

                    <div
                        class="lg:col-span-3 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-bold text-sm text-[#FFFFFF]">Funcionários em Atividade</h3>
                            <a href="#" class="text-xs text-orange-500 font-semibold hover:underline">Ver todos</a>
                        </div>
                        <div class="space-y-3 text-xs">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=80"
                                        class="w-7 h-7 rounded-full object-cover">
                                    <div>
                                        <p class="font-semibold text-[#FFFFFF]">João Silva</p>
                                        <p class="text-[10px] text-gray-400">Motorista</p>
                                    </div>
                                </div>
                                <span
                                    class="text-[10px] text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded-md font-medium">•
                                    Em rota</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80"
                                        class="w-7 h-7 rounded-full object-cover">
                                    <div>
                                        <p class="font-semibold text-gray-900">Maria Santos</p>
                                        <p class="text-[10px] text-gray-400">Auxiliar Logístico</p>
                                    </div>
                                </div>
                                <span
                                    class="text-[10px] text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded-md font-medium">•
                                    Em rota</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=80"
                                        class="w-7 h-7 rounded-full object-cover">
                                    <div>
                                        <p class="font-semibold text-gray-900">Pedro Almeida</p>
                                        <p class="text-[10px] text-gray-400">Motorista</p>
                                    </div>
                                </div>
                                <span
                                    class="text-[10px] text-orange-600 bg-orange-50 px-1.5 py-0.5 rounded-md font-medium">•
                                    Em entrega</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?w=80"
                                        class="w-7 h-7 rounded-full object-cover">
                                    <div>
                                        <p class="font-semibold text-gray-900">Lucas Ferreira</p>
                                        <p class="text-[10px] text-gray-400">Conferente</p>
                                    </div>
                                </div>
                                <span
                                    class="text-[10px] text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded-md font-medium">•
                                    No depósito</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="lg:col-span-4 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-bold text-sm text-[#FFFFFF]">Top Remetentes</h3>
                            <a href="#" class="text-xs text-orange-500 font-semibold hover:underline">Ver todos</a>
                        </div>
                        <div class="space-y-2.5 text-xs font-semibold text-gray-800">
                            <div class="flex justify-between items-center py-1 border-b border-[#242424]">
                                <div class="flex items-center gap-3"><span class=" text-[#A1A1AA] w-3">1</span>
                                    <span>Ana
                                        Souza</span>
                                </div>
                                <span class="text-orange-500 font-bold">124 <span
                                        class="text-gray-400 font-normal text-[10px]">encomendas</span></span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-[#242424]">
                                <div class="flex items-center gap-3"><span class="text-gray-400 w-3">2</span> <span>João
                                        Pereira</span></div>
                                <span class="text-orange-500 font-bold">98 <span
                                        class="text-gray-400 font-normal text-[10px]">encomendas</span></span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-[#242424]">
                                <div class="flex items-center gap-3"><span class="text-gray-400 w-3">3</span>
                                    <span>Fernanda Oliveira</span>
                                </div>
                                <span class="text-orange-500 font-bold">87 <span
                                        class="text-gray-400 font-normal text-[10px]">encomendas</span></span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-[#242424]">
                                <div class="flex items-center gap-3"><span class="text-gray-400 w-3">4</span>
                                    <span>Lucas Martins</span>
                                </div>
                                <span class="text-orange-500 font-bold">76 <span
                                        class="text-gray-400 font-normal text-[10px]">encomendas</span></span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-[#242424]">
                                <div class="flex items-center gap-3"><span class="text-gray-400 w-3">5</span>
                                    <span>Bruno Castro</span>
                                </div>
                                <span class="text-orange-500 font-bold">65 <span
                                        class="text-gray-400 font-normal text-[10px]">encomendas</span></span>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script>
    const miniOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                display: false
            },
            y: {
                display: false
            }
        },
        elements: {
            point: {
                radius: 0
            }
        }
    };

    // 4 Mini Gráficos Superiores (Linhas laranjas)
    new Chart(document.getElementById('miniChart1'), {
        type: 'line',
        options: miniOptions,
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{
                data: [10, 18, 12, 24, 20],
                borderColor: '#f97316',
                borderWidth: 2,
                tension: 0.4
            }]
        }
    });
    new Chart(document.getElementById('miniChart2'), {
        type: 'line',
        options: miniOptions,
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{
                data: [5, 12, 8, 15, 22],
                borderColor: '#f97316',
                borderWidth: 2,
                tension: 0.4
            }]
        }
    });
    new Chart(document.getElementById('miniChart3'), {
        type: 'line',
        options: miniOptions,
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{
                data: [15, 10, 20, 14, 25],
                borderColor: '#f97316',
                borderWidth: 2,
                tension: 0.4
            }]
        }
    });
    new Chart(document.getElementById('miniChart4'), {
        type: 'line',
        options: miniOptions,
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{
                data: [8, 22, 14, 28, 18],
                borderColor: '#f97316',
                borderWidth: 2,
                tension: 0.4
            }]
        }
    });

    // Gráfico de Pizza/Donut (Status das Encomendas)
    const entregues = @json($entregues);
    const emTransito = @json($emTransito);
    const pendentes = @json($pendentes);

    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            labels: ['Entregues', 'Em trânsito', 'Pendentes'],
            datasets: [{
                data: [entregues, emTransito, pendentes],
                backgroundColor: [
                    '#10B981',
                    '#F97316',
                    '#FBBF24'
                ],
                borderWidth: 0
            }]
        },
        options: {
            cutout: '75%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    </script>
</body>

</html>