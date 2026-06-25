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

            <div
                class="bg-[#0A0A0A] border border-[#242424] rounded-2xl p-4 text-center hover:outline hover:outline-orange-500">
                <div class="flex justify-center mb-2">
                    <i class="fa-solid fa-truck-fast text-4xl text-orange-500"></i>
                </div>
                <h4 class="font-bold text-sm text-[#FFFFFF] mb-1">Entregas eficientes</h4>
                <p class="text-xs text-[#A1A1AA] leading-relaxed mb-3">Acompanhe todas as encomendas em tempo real e
                    gerencie suas operações com agilidade.</p>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">

            <header class="h-16 bg-[#111111] border-b border-[#242424] flex items-center justify-between px-8 shrink-0">
                <div>
                    <h1 class="text-lg font-bold text-[#FFFFFF]">Bem-vindo de volta, {{ Auth::user()->name }}!</h1>
                    <p class="text-xs text-[#A1A1AA]">Aqui está o resumo geral das suas operações.</p>
                </div>

                <div class="pt-3">
                    @if(session('correct'))
                    <div class=" bg-green-500/20 border border-green-500 text-green-400  py-3 rounded-xl mb-3">
                        {{ session('correct') }}
                    </div>
                    @endif
                </div>
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center font-semibold">
                            {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div class="text-left hidden sm:block">
                            <p class="text-xs font-semibold text-[#FFFFFF] leading-none">
                                {{ Auth::user()->name }}
                            </p>
                            <span class="text-[10px] text-[#A1A1AA]">Administrador</span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6 space-y-6 overflow-y-auto max-w-[1600px] w-full mx-auto flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <!-- Remetentes -->
                    <a href="{{ route('remetentes.index') }}" class="bg-[#111111] p-4 rounded-2xl border border-[#242424]
                       hover:border-orange-500 hover:-translate-y-1
                       transition-all duration-200 cursor-pointer
                       flex justify-between items-center">

                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class=" text-orange-500  text-sm">
                                    <i class="fa-solid fa-users"></i>
                                </span>
                                <span class="text-xs text-[#A1A1AA] font-medium">Remetentes</span>
                            </div>

                            <p class="text-2xl font-bold text-[#FFFFFF]">
                                {{ $totalRemetentes }}
                            </p>

                            <span class="text-[11px] text-emerald-500 font-semibold">
                                <i class="fa-solid fa-arrow-up text-[9px]"></i>
                                <span class="text-[#A1A1AA] font-normal">
                                    Remetentes cadastrados
                                </span>
                            </span>
                        </div>

                        <div class="w-20 h-10">
                            <canvas id="miniChart1"></canvas>
                        </div>
                    </a>

                    <!-- Destinatários -->
                    <a href="{{ route('destinatarios.index') }}" class="bg-[#111111] p-4 rounded-2xl border border-[#242424]
                       hover:border-orange-500 hover:-translate-y-1
                       transition-all duration-200 cursor-pointer
                       flex justify-between items-center">

                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="text-orange-500  text-sm">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <span class="text-xs text-[#A1A1AA] font-medium">Destinatários</span>
                            </div>

                            <p class="text-2xl font-bold text-[#FFFFFF]">
                                {{ $totalDestinatarios }}
                            </p>

                            <span class="text-[11px] text-emerald-500 font-semibold">
                                <i class="fa-solid fa-arrow-up text-[9px]"></i>
                                <span class="text-[#A1A1AA] font-normal">
                                    Destinatários cadastrados
                                </span>
                            </span>
                        </div>

                        <div class="w-20 h-10">
                            <canvas id="miniChart2"></canvas>
                        </div>
                    </a>

                    <!-- Funcionários -->
                    <a href="{{ route('funcionarios.index') }}" class="bg-[#111111] p-4 rounded-2xl border border-[#242424]
                       hover:border-orange-500 hover:-translate-y-1
                       transition-all duration-200 cursor-pointer
                       flex justify-between items-center">

                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="text-orange-500 text-sm">
                                    <i class="fa-solid fa-user-tie"></i>
                                </span>
                                <span class="text-xs text-[#A1A1AA] font-medium">Funcionários</span>
                            </div>

                            <p class="text-2xl font-bold text-[#FFFFFF]">
                                {{ $totalFuncionarios }}
                            </p>

                            <span class="text-[11px] text-emerald-500 font-semibold">
                                <i class="fa-solid fa-arrow-up text-[9px]"></i>
                                <span class="text-[#A1A1AA] font-normal">
                                    Funcionários cadastrados
                                </span>
                            </span>
                        </div>

                        <div class="w-20 h-10">
                            <canvas id="miniChart3"></canvas>
                        </div>
                    </a>

                    <!-- Encomendas -->
                    <a href="{{ route('encomendas.index') }}" class="bg-[#111111] p-4 rounded-2xl border border-[#242424]
                       hover:border-orange-500 hover:-translate-y-1
                       transition-all duration-200 cursor-pointer
                       flex justify-between items-center">

                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="text-orange-500 text-sm">
                                    <i class="fa-solid fa-box"></i>
                                </span>
                                <span class="text-xs text-[#A1A1AA] font-medium">Encomendas</span>
                            </div>

                            <p class="text-2xl font-bold text-[#FFFFFF]">
                                {{ $totalEncomendas }}
                            </p>

                            <span class="text-[11px] text-emerald-500 font-semibold">
                                <i class="fa-solid fa-arrow-up text-[9px]"></i>
                                <span class="text-[#A1A1AA] font-normal">
                                    Encomendas cadastradas
                                </span>
                            </span>
                        </div>

                        <div class="w-20 h-10">
                            <canvas id="miniChart4"></canvas>
                        </div>
                    </a>

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
                                                @if($encomenda->status == 'Pendente')
                                                <span
                                                    class="bg-yellow-900/60  text-yellow-400 border border-yellow-700 px-2 py-1 rounded-md text-[10px]">
                                                    Pendente
                                                </span>

                                                @elseif($encomenda->status == 'Em trânsito')
                                                <span
                                                    class="bg-orange-900/50 text-orange-400 border border-orange-700 px-2 py-1 rounded-md text-[10px]">
                                                    Em trânsito
                                                </span>

                                                @elseif($encomenda->status == 'Entregue')
                                                <span
                                                    class="bg-emerald-900/50 text-emerald-400 border border-emerald-700 px-2 py-1 rounded-md text-[10px]">
                                                    Entregue
                                                </span>

                                                @else
                                                <span
                                                    class="bg-gray-900/50 text-gray-400 border border-gray-700 px-2 py-1 rounded-md text-[10px]">
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
                            class="text-center w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs py-2 rounded-xl mt-4 transition-colors">
                            Ver todas as encomendas →
                        </a>
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
                        <div
                            class="lg:col-span-4 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col">

                            <h3 class="font-bold text-sm text-[#FFFFFF] mb-3">Propaganda</h3>

                            <video class="w-full rounded-xl" autoplay muted loop>
                                <source src="{{ asset('videos/propaganda.mp4') }}" type="video/mp4">
                                Seu navegador não suporta vídeo.
                            </video>

                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">

                    <div
                        class="lg:col-span-5 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col">

                        <h3 class="font-bold text-sm text-[#FFFFFF] mb-3">
                            Banner publicitário
                        </h3>

                        <video class="w-full h-40 rounded-xl object-cover" autoplay muted loop>
                            <source src="{{ asset('videos/caminhao.mp4') }}" type="video/mp4">
                            Seu navegador não suporta vídeo.
                        </video>

                    </div>

                    <div
                        class="lg:col-span-3 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-bold text-sm text-[#FFFFFF]">Funcionários</h3>
                            <a href="{{route('funcionarios.index')}}"
                                class="text-xs text-orange-500 font-semibold hover:underline">Ver todos</a>
                        </div>
                        <table class="w-full text-[13px]">
                            <thead>
                                <tr class="text-left text-[#A1A1AA] border-b border-[#242424]">
                                    <th class="pb-1 font-medium">Funcionário</th>
                                    <th class="pb-1 font-medium">Cargo</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($funcionarios as $funcionario)
                                <tr class="border-b border-[#242424]">
                                    <td class="py-1 text-[#FFFFFF]">
                                        <div class="flex items-center gap-2">

                                            <div
                                                class="w-6 h-6 rounded-full bg-orange-500 text-white flex items-center justify-center text-[10px] font-semibold">
                                                {{ strtoupper(mb_substr($funcionario->nome, 0, 1)) }}
                                            </div>

                                            <span>
                                                {{ $funcionario->nome }}
                                            </span>

                                        </div>
                                    </td>

                                    <td class="py-1 text-[#A1A1AA]">
                                        {{ $funcionario->cargo }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div
                        class="lg:col-span-4 bg-[#111111] p-5 rounded-2xl border border-[#242424] shadow-sm flex flex-col justify-between">

                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-bold text-sm text-[#FFFFFF]">Remetentes</h3>

                            <a href="{{ route('remetentes.index') }}"
                                class="text-xs text-orange-500 font-semibold hover:underline">
                                Ver todos
                            </a>
                        </div>

                        <div class="space-y-2.5">

                            @foreach($remetentes as $remetente)
                            <div class="flex justify-between items-center py-2 border-b border-[#242424]">

                                <span class="text-sm text-white">
                                    {{ $remetente->nome }}
                                </span>

                                <span class="text-xs bg-orange-500/20 text-orange-400 px-2 py-1 rounded-lg">
                                    {{ $remetente->encomendas_count }} encomendas
                                </span>

                            </div>
                            @endforeach

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