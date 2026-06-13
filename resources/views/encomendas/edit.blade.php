<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CorreiosSys - Editar Encomenda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-[#0A0A0A] font-sans text-gray-800 antialiased">

    <div class="flex min-h-screen">

        <aside class="w-64 bg-[#111111] border-r border-[#242424] flex flex-col justify-between p-4">
            <div>
                <div class="flex items-center gap-2 px-3 py-4 mb-6">
                    <div class="bg-orange-500 text-white p-2 rounded-xl shadow-sm">
                        <i class=" fa-solid fa-truck-fast text-lg"></i>
                    </div>
                    <span class="text-xl text-[#FFFFFF] font-bold tracking-wide">CorreiosSys</span>
                </div>

                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors">
                        <i class="fa-solid fa-house w-5 text-center"></i> Dashboard
                    </a>
                    <a href="{{ route('remetentes.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors">
                        <i class="fa-solid fa-users w-5 text-center"></i> Remetentes
                    </a>
                    <a href="{{ route('destinatarios.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors ">
                        <i class="fa-solid fa-user-tag w-5 text-center"></i> Destinatários
                    </a>
                    <a href="{{ route('funcionarios.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors">
                        <i class="fa-solid fa-user-tie w-5 text-center"></i> Funcionários
                    </a>
                    <a href="{{ route('encomendas.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 bg-orange-500/10 text-orange-500 border-orange-500 font-medium rounded-lg transition-colors">
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

        <main class="flex-1 flex flex-col min-w-0">

            <header class="h-16  bg-[#111111] border-b border-[#242424] flex items-center justify-end px-8 gap-6">

                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=60"
                        alt="Avatar" class="w-9 h-9 rounded-full object-cover">
                    <div class="text-left">
                        <p class="text-sm font-semibold text-[#FFFFFF] leading-none">{{ auth()->user()->name }}</p>
                        <span class="text-[11px] text-[#A1A1AA]">Administrador</span>
                    </div>
                </div>
            </header>

            <div class="p-8 max-w-3xl w-full mx-auto flex-1 flex flex-col justify-start">

                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-[#FFFFFF] tracking-tight">Editar Encomenda</h1>
                        <p class="text-sm text-[#A1A1AA] mt-1">Atualize os detalhes do pacote, prazos, remetente e
                            destinatário abaixo.</p>
                    </div>
                    <a href="{{ route('encomendas.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-zinc-900 border border-zinc-700 text-zinc-300 rounded-xl hover:bg-zinc-800 hover:text-orange-400 transition-all duration-200">
                        <i class="fa-solid fa-arrow-left text-xs"></i> Voltar
                    </a>
                </div>

                <div class="bg-[#111111] rounded-2xl shadow-sm border border-[#242424] p-6 md:p-8">
                    <form action="{{ route('encomendas.update', $encomenda->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div class="md:col-span-2 flex flex-col gap-1.5">
                                <label for="descricao"
                                    class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">
                                    Descrição do Objeto
                                </label>
                                <input type="text" id="descricao" name="descricao" value="{{ $encomenda->descricao }}"
                                    required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500 ">
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label for="peso" class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">
                                    Peso (kg)
                                </label>
                                <input type="number" step="0.01" id="peso" name="peso" value="{{ $encomenda->peso }}"
                                    required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500 ">
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label for="status" class="text-xs font-bold text-[#A1A1AA]  uppercase tracking-wider">
                                    Status
                                </label>

                                <select id="status" name="status"
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500 ">

                                    <option value="Pendente" {{ $encomenda->status == 'Pendente' ? 'selected' : '' }}>
                                        Pendente
                                    </option>

                                    <option value="Em trânsito"
                                        {{ $encomenda->status == 'Em trânsito' ? 'selected' : '' }}>
                                        Em trânsito
                                    </option>

                                    <option value="Entregue" {{ $encomenda->status == 'Entregue' ? 'selected' : '' }}>
                                        Entregue
                                    </option>

                                </select>
                            </div>

                            <div class="flex flex-col  gap-1.5 ">
                                <label for="data_envio"
                                    class="text-xs font-bold  text-[#A1A1AA] uppercase tracking-wider">
                                    Data de Envio
                                </label>
                                <input type="date" id="data_envio" name="data_envio"
                                    value="{{ $encomenda->data_envio }}" required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500 ">
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label for="data_entregar"
                                    class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">
                                    Data de Entrega
                                </label>
                                <input type="date" id="data_entregar" name="data_entregar"
                                    value="{{ $encomenda->data_entregar }}"
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500">
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label for="id_remetentes"
                                    class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">
                                    Remetente
                                </label>

                                <select id="id_remetentes" name="id_remetentes" required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500">

                                    @foreach($remetentes as $remetente)
                                    <option value="{{ $remetente->id }}"
                                        {{ $encomenda->id_remetentes == $remetente->id ? 'selected' : '' }}>
                                        {{ $remetente->nome }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label for="id_destinatarios"
                                    class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">
                                    Destinatário
                                </label>

                                <select id="id_destinatarios" name="id_destinatarios" required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500">

                                    @foreach($destinatarios as $destinatario)
                                    <option value="{{ $destinatario->id }}"
                                        {{ $encomenda->id_destinatarios == $destinatario->id ? 'selected' : '' }}>
                                        {{ $destinatario->nome }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>

                        </div>

                        <div class="border-t border-[#242424] pt-4 mt-6 flex justify-end">
                            <button type="submit"
                                class="w-full md:w-auto bg-orange-500 text-white font-semibold text-sm py-3 px-6 rounded-xl flex items-center justify-center gap-2 hover:bg-orange-600 transition-colors shadow-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Atualizar Encomenda
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </main>
    </div>

</body>

</html>