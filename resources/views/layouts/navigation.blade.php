<!-- <nav x-data="{ open: false }" class="bg-white shadow-sm border-b"> não conseguir fazer nessa parte -->

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex justify-between h-16">

        <!-- Logo -->
        <div class="flex items-center">

            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center shadow">
                    <i class="fa-solid fa-truck text-white text-xl"></i>
                </div>

                <div>
                    <h1 class="text-xl font-bold text-gray-800">
                        CorreiosSys
                    </h1>

                    <p class="text-xs text-gray-500">
                        Sistema de Encomendas
                    </p>
                </div>

            </a>

            <!-- Menu -->
            <div class="hidden sm:flex ms-10 space-x-8">

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-nav-link>

            </div>

        </div>

        <!-- Área Direita -->
        <div class="hidden sm:flex items-center gap-5">

            <!-- Notificação -->
            <button class="w-10 h-10 rounded-full bg-gray-100 hover:bg-orange-100 flex items-center justify-center">
                <i class="fa-regular fa-bell text-gray-600"></i>
            </button>

            <!-- Configurações -->
            <button class="w-10 h-10 rounded-full bg-gray-100 hover:bg-orange-100 flex items-center justify-center">
                <i class="fa-solid fa-gear text-gray-600"></i>
            </button>

            <!-- Usuário -->
            <x-dropdown align="right" width="56">

                <x-slot name="trigger">

                    <button
                        class="flex items-center gap-3 bg-orange-50 px-3 py-2 rounded-2xl hover:bg-orange-100 transition">

                        <div
                            class="w-10 h-10 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold">

                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                        </div>

                        <div class="text-left">

                            <div class="font-semibold text-gray-800">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="text-xs text-gray-500">
                                Administrador
                            </div>

                        </div>

                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />

                        </svg>

                    </button>

                </x-slot>

                <x-slot name="content">

                    <x-dropdown-link :href="route('profile.edit')">
                        Meu Perfil
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">

                            Sair

                        </x-dropdown-link>

                    </form>

                </x-slot>

            </x-dropdown>

        </div>

        <!-- Mobile -->
        <div class="flex items-center sm:hidden">

            <button @click="open = ! open" class="p-2 rounded-md text-gray-500">

                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                </svg>

            </button>

        </div>

    </div>

</div>

<!-- Menu Mobile -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

    <div class="pt-2 pb-3 space-y-1">

        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">

            Dashboard

        </x-responsive-nav-link>

    </div>

    <div class="border-t border-gray-200 py-4">

        <div class="px-4">

            <div class="font-medium text-base text-gray-800">
                {{ Auth::user()->name }}
            </div>

            <div class="font-medium text-sm text-gray-500">
                {{ Auth::user()->email }}
            </div>

        </div>

        <div class="mt-3 space-y-1">

            <x-responsive-nav-link :href="route('profile.edit')">
                Perfil
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();">

                    Sair

                </x-responsive-nav-link>

            </form>

        </div>

    </div>

</div>

</nav>