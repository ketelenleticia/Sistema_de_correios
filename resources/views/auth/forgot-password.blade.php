<x-guest-layout>
    <div class="min-h-screen w-full flex items-center justify-center font-sans antialiased p-4">

        <div
            class="w-full max-w-md md:max-w-5xl bg-white rounded-3xl shadow-2xl flex flex-col md:flex-row overflow-hidden min-h-[600px]">

            <div
                class="w-full md:w-1/2 bg-gradient-to-br from-amber-400 via-orange-400 to-orange-500 relative flex flex-col justify-center p-10 md:p-16 text-white overflow-hidden min-h-[250px] md:min-h-full">
                <div
                    class="absolute inset-y-0 -right-24 w-48 bg-white rounded-full hidden md:block scale-y-[2] transform translate-x-1/2">
                </div>

                <div class="relative z-10 space-y-4 max-w-md">
                    <div class="flex items-center gap-3 font-semibold text-xl md:text-2xl tracking-wide">
                        <i class="fa-solid fa-truck"></i>
                        <span>CorreiosSys</span>
                    </div>

                    <h1 class="text-3xl md:text-5xl font-bold leading-tight break-words">
                        Recuperar á <br class="hidden md:inline">sua senha!
                    </h1>
                </div>
            </div>

            <div class="w-full md:w-1/2 bg-white flex flex-col justify-center items-center p-8 md:p-16 relative">

                <div class="w-full max-w-md space-y-6">

                    <div class="flex justify-center">
                        <div
                            class="w-20 h-20 md:w-24 md:h-24 bg-slate-100 rounded-full flex items-center justify-center text-orange-400 text-3xl md:text-4xl shadow-sm">
                            <i class="fa-solid fa-paper-plane"></i>
                        </div>
                    </div>

                    <div
                        class="text-center md:text-left text-sm md:text-base text-slate-500 font-medium leading-relaxed">
                        {{ __(' Esqueceu sua senha? Não tem problema. Basta informar seu endereço de e-mail e enviaremos um link para redefinição de senha.') }}
                    </div>

                    <x-auth-session-status
                        class="mb-4 p-4 bg-green-50 text-green-700 border border-green-100 rounded-xl text-sm font-medium"
                        :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                        @csrf

                        <div class="relative flex flex-col justify-center">
                            <span class="absolute left-4 text-slate-400 z-10 top-[18px]">
                                <i class="fa-solid fa-envelope text-xl"></i>
                            </span>
                            <x-text-input id="email"
                                class="w-full pl-14 pr-5 py-4 bg-slate-50 text-slate-700 placeholder-slate-400 border border-slate-100 rounded-2xl focus:bg-white focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none transition-all text-base shadow-none"
                                type="email" name="email" :value="old('email')" required autofocus
                                placeholder="Email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-1 px-2 text-xs" />
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-bold py-4 rounded-2xl shadow-xl shadow-orange-500/20 text-lg transition-all duration-200">
                                {{ __('Enviar Link para Redefinição de Senha') }}
                            </button>
                        </div>
                    </form>

                    <p class="text-center text-sm md:text-base text-slate-400 pt-2">
                        lembrar sua senha? <a href="{{ route('login') }}"
                            class="text-orange-500 font-semibold hover:underline">Voltar para o login.</a>
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-guest-layout>