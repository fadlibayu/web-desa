<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold tracking-tight text-[#41431B]">Buat Akun Admin</h2>
        <p class="text-sm text-[#AEB784] mt-1">Daftar untuk mengelola konten desa.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-[#41431B] mb-1">Nama Lengkap</label>
            <input id="name" class="auth-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-[#41431B] mb-1">Alamat Email</label>
            <input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-[#41431B] mb-1">Kata Sandi</label>
            <input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-[#41431B] mb-1">Konfirmasi Sandi</label>
            <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="btn-primary">
                Register
            </button>
        </div>

        <div class="text-center text-sm text-[#AEB784] mt-6">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-[#41431B] font-medium hover:underline">Log in</a>
        </div>
    </form>
</x-guest-layout>
