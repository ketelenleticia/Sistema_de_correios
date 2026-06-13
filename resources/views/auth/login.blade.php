<x-guest-layout>
    <div class="min-h-screen bg-[#05070D] flex items-center justify-center p-4">

        <div
            class="w-full max-w-5xl min-h-[650px] bg-[#0B0F14] border border-white/10 rounded-[30px] overflow-hidden flex flex-col md:flex-row">

            <!-- LADO ESQUERDO -->
            <div
                class="w-full md:w-1/2 bg-gradient-to-r from-orange-900/50 to-transparent p-8 md:p-12 flex flex-col justify-center relative">

                <i class="fa-solid fa-truck absolute top-12 right-10 text-[180px] text-orange-500/10"></i>

                <div class="relative z-10">

                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-truck text-white"></i>
                        </div>

                        <h2 class="text-white text-2xl font-bold">
                            CorreiosSys
                        </h2>
                    </div>

                    <h1 class="text-5xl font-bold text-white leading-tight">
                        Bem-vindo ao <br>
                        sistema <br>
                        <span class="text-orange-500">
                            CorreiosSys!
                        </span>
                    </h1>

                    <p class="text-gray-400 mt-6 text-lg">
                        Gerencie suas encomendas de forma simples,
                        rápida e eficiente.
                    </p>

                </div>

            </div>

            <!-- LADO DIREITO -->
            <div class="w-full md:w-1/2 bg-[#0B0F14] flex flex-col justify-center px-8 md:px-12">

                <div class="flex justify-center mb-8">
                    <div
                        class="w-20 h-20 rounded-full border border-white/10 bg-[#10151c] flex items-center justify-center">

                        <i class="fa-regular fa-envelope text-4xl text-orange-500"></i>
                    </div>

                </div>
                <p class="text-center text-gray-300 mb-8">
                    Faça login abaixo para começar.
                </p>



                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    @if (session('success'))
                    <div class="bg-green-500/20 border border-green-500 text-green-400 p-3 rounded-xl mb-4">
                        {{ session('success') }}
                    </div>
                    @endif

    

                    @if ($errors->has('email'))
                    <div class="bg-red-500/20 border border-red-500 text-red-400 p-4 rounded-xl mb-6 text-center">
                        Email ou senha incorretos!
                    </div>
                    @endif


                    <!-- EMAIL -->
                    <div class="relative">

                        <i class="fa-solid fa-at absolute left-5 top-1/2 -translate-y-1/2 text-orange-500"></i>

                        <input type="email" placeholder="Email" name="email" :value="old('email')" required autofocus
                            class="w-full bg-transparent border border-orange-500 rounded-2xl py-3 pl-14 pr-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">

                    </div>

                    <!-- SENHA -->
                    <div class="relative">

                        <i class="fa-solid fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-orange-500"></i>

                        <input type="password" placeholder="Sua Senha" name="password" required
                            autocomplete="current-password"
                            class="w-full bg-transparent border border-white/10 rounded-2xl py-3 pl-14 pr-12 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">

                        <i
                            class="fa-regular fa-eye absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer"></i>

                    </div>
                    <br>

                    <button
                        class="w-full py-3 rounded-2xl bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold text-xl hover:scale-[1.02] transition-all">

                        Entrar

                    </button>

                </form>

                <p class="text-center text-gray-400 mt-8">
                    Não tem uma conta?
                    <a href="{{ route('register') }}" class="text-orange-500 font-semibold hover:text-orange-400">
                        Cadastre-se aqui.
                    </a>
                </p>

            </div>

        </div>

    </div>
</x-guest-layout>