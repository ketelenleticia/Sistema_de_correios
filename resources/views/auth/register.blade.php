<x-guest-layout>
    <div class="min-h-screen bg-[#05070D] flex items-center justify-center p-4">

        <div
            class="w-full max-w-5xl min-h-[650px] bg-[#0B0F14] border border-white/10 rounded-[30px] overflow-hidden flex flex-col md:flex-row">

            <!-- LADO ESQUERDO -->
            <div
                class="w-full md:w-1/2 bg-gradient-to-r from-orange-900/40 to-transparent p-8 md:p-12 flex flex-col justify-center relative">

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
                        Cadastre-se na
                        <span class="text-orange-500">
                            CorreiosSys!
                        </span>
                    </h1>

                    <p class="text-gray-400 mt-6 text-lg">
                        Crie sua conta e gerencie suas encomendas
                        de forma simples e eficiente.
                    </p>

                </div>

            </div>

            <!-- LADO DIREITO -->
            <div class="w-full md:w-1/2 bg-[#0B0F14] flex flex-col justify-center px-8 md:px-12">

                <div class="text-center mb-8">

                    <div
                        class="w-20 h-20 mx-auto rounded-full border border-white/10 bg-[#10151c] flex items-center justify-center mb-4">

                        <i class="fa-solid fa-user-plus text-4xl text-orange-500"></i>

                    </div>

                    <h2 class="text-3xl font-bold text-white">
                        Criar Conta
                    </h2>

                    <p class="text-gray-400 mt-2">
                        Preencha os dados abaixo.
                    </p>

                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <input type="text" name="name" placeholder="Nome" required
                        class="w-full bg-transparent border border-white/10 rounded-2xl py-3 px-5 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">

                    <input type="email" name="email" placeholder="Email" required
                        class="w-full bg-transparent border border-white/10 rounded-2xl py-3 px-5 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">

                    <input type="password" name="password" placeholder="Senha" required
                        class="w-full bg-transparent border border-white/10 rounded-2xl py-3 px-5 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">

                    <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required
                        class="w-full bg-transparent border border-white/10 rounded-2xl py-3 px-5 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500">

                    <button type="submit"
                        class="w-full py-3 rounded-2xl bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold text-xl hover:from-orange-600 hover:to-orange-700 transition">

                        Cadastrar

                    </button>

                </form>

                <p class="text-center text-gray-400 mt-6">
                    Já possui uma conta?
                    <a href="{{ route('login') }}" class="text-orange-500 font-semibold hover:text-orange-400">
                        Faça login aqui.
                    </a>
                </p>

            </div>

        </div>

    </div>
</x-guest-layout>