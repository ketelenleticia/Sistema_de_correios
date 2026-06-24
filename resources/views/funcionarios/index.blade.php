<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CorreiosSys - Funcionários</title>
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
                        class="flex items-center gap-3 px-3 py-2.5 bg-orange-500/10 text-orange-500 border-orange-500 font-medium rounded-lg transition-colors">
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

        <main class="flex-1 flex flex-col">

            <header class="h-16  bg-[#111111] border-b border-[#242424] flex items-center justify-end px-8 gap-6">


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

            <div class="p-8 max-w-7xl w-full mx-auto flex-1">

                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-[#FFFFFF] mb-1">Funcionários</h1>
                        <p class="text-sm text-[#A1A1AA]">Gerencie os funcionários cadastrados no sistema.</p>
                    </div>
                    <a href="{{ route('funcionarios.create') }}"
                        class="bg-orange-500 text-white font-semibold text-sm py-2.5 px-4 rounded-xl flex items-center gap-2 hover:bg-orange-600 transition-colors shadow-sm">
                        <i class="fa-solid fa-plus text-xs"></i> Novo Funcionário
                    </a>
                </div>
                @if(session('success'))
                <div class="mb-4 p-4 bg-emerald-900/50 text-emerald-400 border border-emerald-700 rounded-lg">
                    {{ session('success') }}
                </div>
                @endif

                <div class="bg-[#111111] rounded-2xl shadow-sm border border-[#242424] overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-orange-500 text-white text-sm font-semibold">
                                    <th class="py-3 px-4 w-16">ID</th>
                                    <th class="py-3 px-4">Nome</th>
                                    <th class="py-3 px-4">Cargo</th>
                                    <th class="py-3 px-4">Telefone</th>
                                    <th class="py-3 px-4">Email</th>
                                    <th class="py-3 px-4 text-center w-48">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#242424] text-sm text-[#A1A1AA]">
                                @forelse($funcionarios as $funcionario)
                                <tr class="hover:bg-zinc-800/50 transition-colors duration-200">
                                    <td class="py-3.5 px-4 font-medium text-[#FFFFFF]">{{ $funcionario->id }}</td>

                                    <td class="py-3.5 px-4 flex items-center gap-3 text-[#A1A1AA]">
                                        <div
                                            class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center font-semibold">
                                            {{ strtoupper(mb_substr($funcionario->nome, 0, 1)) }}
                                        </div>
                                        {{$funcionario->nome}}
                                    </td>

                                    <td class="py-3.5 px-4 text-[#A1A1AA]">{{ $funcionario->cargo }}</td>
                                    <td class="py-3.5 px-4 text-[#A1A1AA]">{{ $funcionario->telefone }}</td>
                                    <td class="py-3.5 px-4 max-w-xs truncate text-[#A1A1AA]">{{ $funcionario->email }}
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold py-1.5 px-3 rounded-lg inline-flex items-center gap-1.5 transition-colors">
                                                <i class="fa-solid fa-pen text-[10px]"></i> Editar
                                            </a>
                                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Tem certeza que deseja excluir esse funcionario?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold py-1.5 px-3 rounded-lg inline-flex items-center gap-1.5 transition-colors">
                                                    <i class="fa-solid fa-trash-can text-[10px]"></i> Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="py-8 text-center text-[#A1A1AA] italic">Nenhum funcionário
                                        cadastrado.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div
                        class="px-6 py-4  border-t  border-[#242424] bg-[#111111] flex items-center justify-between text-xs text-gray-500">
                        <div>
                            Mostrando {{ $funcionarios->firstItem() }} a {{ $funcionarios->lastItem() }} de
                            {{ $funcionarios->total() }} registros
                        </div>

                        <div class="flex items-center gap-1">
                            {{-- Botão Voltar --}}
                            <a href="{{ $funcionarios->previousPageUrl() }}"
                                class="w-8 h-8 flex items-center justify-center border  border-gray-500 rounded-lg hover:bg-gray-50 {{ $funcionarios->onFirstPage() ? 'opacity-50 pointer-events-none' : '' }}">
                                <i class="fa-solid fa-chevron-left text-[10px]"></i>
                            </a>

                            {{-- Números das Páginas --}}
                            @foreach ($funcionarios->getUrlRange(1, $funcionarios->lastPage()) as $page => $url)
                            <a href="{{ $url }}"
                                class="w-8 h-8 flex items-center justify-center border  border-[#242424] rounded-lg font-semibold {{ $page == $funcionarios->currentPage() ? 'bg-orange-500 text-white' : 'border border-gray-200 hover:bg-gray-50 text-gray-600' }}">
                                {{ $page }}
                            </a>
                            @endforeach

                            {{-- Botão Avançar --}}
                            <a href="{{ $funcionarios->nextPageUrl() }}"
                                class="w-8 h-8 flex items-center justify-center border  border-gray-500 rounded-lg hover:bg-gray-50 {{ !$funcionarios->hasMorePages() ? 'opacity-50 pointer-events-none' : '' }}">
                                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>