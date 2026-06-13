<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envios - Editar Destinatário</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-[#0A0A0A] text-gray-800 antialiased font-sans">

    <div class="flex min-h-screen">

        <aside class="w-64  bg-[#111111] border-r border-[#242424]  flex flex-col justify-between p-4">
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
                        class="flex items-center gap-3 px-3 py-2.5  text-[#A1A1AA] hover:text-[#FFFFFF] rounded-lg transition-colors">
                        <i class="fa-solid fa-users w-5 text-center"></i> Remetentes
                    </a>
                    <a href="{{ route('destinatarios.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 bg-orange-500/10 text-orange-500 border-orange-500 font-medium rounded-lg transition-colors">
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

           <div class="bg-[#0A0A0A] border border-[#242424] rounded-2xl p-4 text-center hover:outline hover:outline-orange-500">
                <div class="flex justify-center mb-2">
                    <i class="fa-solid fa-truck-fast text-4xl text-orange-500"></i>
                </div>
                <h4 class="font-bold text-sm text-[#FFFFFF] mb-1">Entregas eficientes</h4>
                <p class="text-xs text-[#A1A1AA] leading-relaxed mb-3">Acompanhe todas as encomendas em tempo real e
                    gerencie suas operações com agilidade.</p>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">

            <header class="h-16 bg-[#111111] border-b border-[#242424] flex items-center justify-end px-8 gap-6">

                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=60"
                        alt="Avatar" class="w-9 h-9 rounded-full object-cover">
                    <div class="text-left">
                        <p class="text-sm font-semibold text-[#FFFFFF] leading-none">{{ auth()->user()->name }}</p>
                        <span class="text-[11px] text-[#A1A1AA]">Administrador</span>
                    </div>
                </div>
            </header>


            <main class="p-6 max-w-3xl w-full mx-auto flex-1 flex flex-col justify-start">

                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-[#FFFFFF] tracking-tight">Editar Destinatário</h1>
                        <p class="text-sm text-[#A1A1AA] mt-1">Modifique os campos abaixo para atualizar as informações
                            do destinatário no sistema.</p>
                    </div>
                    <a href="{{ route('destinatarios.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-zinc-900 border border-zinc-700 text-zinc-300 rounded-xl hover:bg-zinc-800 hover:text-orange-400 transition-all duration-200">
                        <i class="fa-solid fa-arrow-left text-xs"></i> Voltar
                    </a>
                </div>

                <div class="bg-[#111111] rounded-2xl shadow-sm border border-[#242424]  p-6 md:p-8">
                    <form action="{{ route('destinatarios.update', $destinatario->id) }}" method="POST"
                        class="space-y-6">
                        @method('PUT')
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="md:col-span-2 flex flex-col gap-1.5">
                                <label for="nome" class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">Nome
                                    do Destinatário</label>
                                <input type="text" name="nome" value="{{ $destinatario->nome }}" required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500 ">
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label for="cpf"
                                    class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">CPF</label>
                                <input type="text" name="cpf" id="cpf" required value="{{ $destinatario->cpf }}"
                                    required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500 ">
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label for="telefone"
                                    class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">Telefone </label>
                                <input type="text" name="telefone" id="telefone" required
                                    value="{{ $destinatario->telefone }}" required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500 ">
                            </div>

                            <div class="md:col-span-2 flex flex-col gap-1.5">
                                <label for="endereco"
                                    class="text-xs font-bold text-[#A1A1AA] uppercase tracking-wider">Endereço
                                    Residencial</label>
                                <input type="text" name="endereco" id="endereco" value="{{ $destinatario->endereco }}"
                                    required
                                    class="w-full bg-[#111111] border border-[#242424] rounded-xl px-4 py-3 text-sm text-[#A1A1AA] placeholder:text-[#4F4F4F] focus:outline-none focus:border-orange-500 ">
                            </div>
                        </div>

                        <div class="border-t border-[#242424] pt-4 mt-6 flex justify-end">
                            <button type="submit"
                                class="w-full md:w-auto bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold text-sm flex items-center justify-center gap-2 transition-colors shadow-sm">
                                <i class="fa-solid fa-pen-to-square text-xs"></i> Atualizar Destinatário
                            </button>
                        </div>

                    </form>
                </div>

            </main>
        </div>
    </div>

</body>

</html>