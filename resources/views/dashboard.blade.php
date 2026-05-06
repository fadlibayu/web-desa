<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-[#41431B] tracking-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card Berita -->
                <div class="admin-card p-8 hover:bg-[#E3DBBB] transition-colors">
                    <h3 class="text-[#AEB784] text-sm font-semibold tracking-wide uppercase mb-2">Total Berita</h3>
                    <p class="text-5xl font-bold text-[#41431B]">{{ $beritaCount ?? 0 }}</p>
                    <a href="{{ route('admin.berita.index') }}" class="mt-6 text-sm text-[#AEB784] font-medium hover:underline inline-flex items-center gap-1">Kelola Berita &rarr;</a>
                </div>

                <!-- Card Demografi -->
                <div class="admin-card p-8 hover:bg-[#E3DBBB] transition-colors">
                    <h3 class="text-[#AEB784] text-sm font-semibold tracking-wide uppercase mb-2">Data Demografi</h3>
                    <p class="text-5xl font-bold text-[#41431B]">{{ $demografiCount ?? 0 }}</p>
                    <a href="{{ route('admin.demografi.index') }}" class="mt-6 text-sm text-[#AEB784] font-medium hover:underline inline-flex items-center gap-1">Kelola Demografi &rarr;</a>
                </div>

                <!-- Card Profil Desa -->
                <div class="admin-card p-8 hover:bg-[#E3DBBB] transition-colors flex flex-col justify-between">
                    <div>
                        <h3 class="text-[#AEB784] text-sm font-semibold tracking-wide uppercase mb-2">Profil & SOTK</h3>
                        <p class="text-sm text-[#41431B] leading-relaxed mt-4">Kelola visi, misi, dan struktur organisasi desa Anda agar selalu mutakhir.</p>
                    </div>
                    <a href="{{ route('admin.profil.index') }}" class="mt-6 text-sm text-[#AEB784] font-medium hover:underline inline-flex items-center gap-1">Pengaturan Profil &rarr;</a>
                </div>
            </div>

            <div class="admin-card p-8">
                <h3 class="font-semibold text-lg text-[#41431B] mb-6">Aksi Cepat</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.berita.create') }}" class="btn-primary">+ Tulis Berita Baru</a>
                    <a href="{{ route('home') }}" target="_blank" class="px-6 py-2 bg-[#E3DBBB] text-[#41431B] rounded-md font-medium hover:bg-[#E3DBBB] transition-colors text-sm border border-[#E3DBBB]">Lihat Website</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
