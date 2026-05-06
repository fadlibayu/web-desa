<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold tracking-tight text-[#41431B]">Masuk ke Dashboard</h2>
        <p class="text-sm text-[#86868b] mt-1">Silakan masukkan kredensial Anda.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-[#41431B] mb-1">Alamat Email</label>
            <input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-[#41431B] mb-1">Kata Sandi</label>
            <input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex justify-between items-center mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-[#AEB784] text-[#0071e3] shadow-sm focus:ring-[#0071e3]" name="remember">
                <span class="ms-2 text-sm text-[#86868b]">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-[#0071e3] hover:underline" href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
            @endif
        </div>

        <div class="pt-4">
            <button type="submit" class="btn-primary">
                Log in
            </button>
        </div>
        
        <div class="text-center text-sm text-[#AEB784] mt-6">
            Belum punya akun? <a href="{{ route('register') }}" class="text-[#41431B] font-medium hover:underline">Daftar sekarang</a>
        </div>
    </form>
</x-guest-layout>
