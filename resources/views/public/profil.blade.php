@extends('public.layouts.app')

@section('title', 'Profil Desa')

@section('content')
<!-- Header Page -->
<section class="bg-[#41431B] pt-32 pb-20 relative">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold font-serif text-[#F8F3E1] mb-4">Profil Dusun</h1>
        <p class="text-[#E3DBBB] text-lg max-w-2xl mx-auto">Visi, Misi, Struktur Organisasi, dan Peta Geografis Desa.</p>
    </div>
</section>

<!-- Visi Misi Section -->
<section class="py-16 bg-[#F8F3E1]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- VISI -->
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold font-serif text-[#AEB784] mb-6">Visi</h2>
            @if(isset($profil) && $profil->visi)
                <p class="text-2xl italic text-[#41431B] leading-relaxed font-serif">"{{ $profil->visi }}"</p>
            @else
                <p class="text-[#AEB784] italic">Visi belum ditambahkan oleh admin.</p>
            @endif
        </div>

        <div class="w-24 h-1 bg-[#E3DBBB] mx-auto mb-16"></div>

        <!-- MISI -->
        <div>
            <h2 class="text-3xl font-bold font-serif text-[#41431B] mb-8 text-center">Misi</h2>
            @if(isset($profil) && $profil->misi)
                <div class="nature-card p-8 md:p-12 border-t-[#41431B]">
                    <div class="prose prose-lg text-[#41431B] mx-auto leading-loose">
                        {!! nl2br(e($profil->misi)) !!}
                    </div>
                </div>
            @else
                <p class="text-center text-[#AEB784]">Misi belum ditambahkan oleh admin.</p>
            @endif
        </div>

    </div>
</section>

<!-- SOTK / Perangkat Desa Section -->
<section class="py-16 bg-[#F8F3E1] border-t border-[#E3DBBB]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold font-serif text-[#41431B]">Pemerintahan Dusun</h2>
            <div class="w-24 h-1 bg-[#41431B] mx-auto mt-4"></div>
        </div>

        <!-- Kepala Dusun Card -->
        <div class="flex flex-col md:flex-row bg-[#E3DBBB] rounded-2xl overflow-hidden mb-16 shadow-sm">
            <!-- Left side (Dark) -->
            <div class="bg-[#41431B] w-full md:w-2/5 p-12 flex flex-col items-center justify-center relative">
                @if(isset($profil) && $profil->kepala_foto)
                    <div class="w-40 h-40 rounded-full border-[6px] border-[#AEB784] flex items-center justify-center mb-6 overflow-hidden bg-[#F8F3E1]">
                        <img src="{{ Storage::url($profil->kepala_foto) }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-40 h-40 rounded-full border-[6px] border-[#AEB784] flex items-center justify-center mb-6 bg-[#41431B]">
                        <span class="text-7xl font-serif text-[#AEB784]">{{ substr($profil->kepala_nama ?? 'B', 0, 1) }}</span>
                    </div>
                @endif
                <div class="absolute bottom-6 left-6 bg-[#AEB784] text-[#41431B] px-4 py-1.5 rounded-full text-sm font-bold">
                    {{ $profil->kepala_periode ?? 'Periode Belum Diatur' }}
                </div>
            </div>
            <!-- Right side (Light) -->
            <div class="w-full md:w-3/5 p-10 flex flex-col justify-center">
                <span class="text-[#AEB784] font-bold text-sm tracking-widest uppercase mb-2">{{ $profil->kepala_jabatan ?? 'Kepala Dusun' }}</span>
                <h3 class="text-4xl font-bold text-[#41431B] mb-4">{{ $profil->kepala_nama ?? 'Nama Belum Diatur' }}</h3>
                <p class="text-[#41431B] mb-8 leading-relaxed">
                    {{ $profil->kepala_deskripsi ?? 'Deskripsi belum ditambahkan oleh admin.' }}
                </p>
                <div class="flex items-center gap-8 border-t border-[#AEB784] pt-6">
                    <div>
                        <div class="text-2xl font-bold text-[#41431B]">5+</div>
                        <div class="text-sm text-[#AEB784]">Program Prioritas</div>
                    </div>
                    <div class="w-px h-10 bg-gray-300"></div>
                    <div>
                        <div class="text-2xl font-bold text-[#41431B]">100%</div>
                        <div class="text-sm text-[#AEB784]">Transparansi</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Perangkat Desa Grid -->
        <div class="text-center mb-8">
            <h3 class="text-2xl font-bold text-[#41431B]">Perangkat Desa</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            @forelse($perangkat_desas as $p)
            <div class="bg-[#E3DBBB] p-5 rounded-2xl flex items-center gap-4 transition hover:bg-[#E3DBBB]">
                <div class="w-12 h-12 bg-[#F8F3E1] rounded-xl flex items-center justify-center text-[#41431B] shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <div class="font-bold text-[#41431B]">{{ $p->nama }}</div>
                    <div class="text-sm text-[#AEB784]">{{ $p->jabatan }}</div>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-[#AEB784] py-8 border-2 border-dashed border-[#E3DBBB] rounded-2xl">
                Belum ada data perangkat desa.
            </div>
            @endforelse
        </div>

        <!-- Tombol Lihat Foto Full -->
        @if(isset($profil) && $profil->foto_sotk)
            <div class="text-center bg-[#F8F3E1] p-8 rounded-2xl border border-[#E3DBBB]">
                <p class="text-[#41431B] mb-4">Untuk melihat struktur organisasi secara lengkap beserta garis koordinasinya, silakan unduh/lihat bagan resolusi tinggi.</p>
                <a href="{{ Storage::url($profil->foto_sotk) }}" target="_blank" class="btn-primary px-8 py-3 inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Lihat Foto Full Bagan
                </a>
            </div>
        @endif

    </div>
</section>

<!-- Peta Geografis Section -->
<section class="py-16 bg-[#F8F3E1] border-t border-[#E3DBBB]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold font-serif text-[#41431B] mb-4">Peta Lokasi Desa</h2>
            <p class="text-[#41431B] max-w-2xl mx-auto">Informasi geografis dan tata letak wilayah administratif desa.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 items-start">
            <!-- Informasi Singkat Geografis -->
            <div class="w-full lg:w-1/3 space-y-6">
                <div class="nature-card p-6 border-t-[#AEB784]">
                    <h3 class="text-sm font-bold text-[#AEB784] uppercase tracking-widest mb-1">Luas Wilayah</h3>
                    <p class="text-2xl font-bold text-[#AEB784]">{{ isset($profil) && $profil->luas_desa ? $profil->luas_desa : 'Belum diatur' }}</p>
                </div>
                
                <div class="nature-card p-6 border-t-[#41431B]">
                    <h3 class="text-sm font-bold text-[#AEB784] uppercase tracking-widest mb-1">Jumlah Penduduk</h3>
                    <p class="text-2xl font-bold text-[#41431B]">{{ isset($penduduk_stats) ? number_format($penduduk_stats->total_penduduk) : 0 }} Jiwa</p>
                </div>

                <div class="bg-[#E3DBBB] p-6 rounded-lg border border-[#E3DBBB]">
                    <p class="text-[#41431B] text-sm leading-relaxed">Peta di samping merupakan visualisasi geografis desa yang bersumber dari Google Maps. Digunakan sebagai acuan lokasi fasilitas publik, potensi desa, dan pembagian wilayah dusun.</p>
                </div>
            </div>

            <!-- Iframe Maps -->
            <div class="w-full lg:w-2/3">
                <div class="nature-card overflow-hidden h-[400px] md:h-[500px] border-t-0 p-2 bg-[#F8F3E1]">
                    @if(isset($profil) && $profil->link_peta)
                        <div class="w-full h-full rounded bg-[#E3DBBB] overflow-hidden [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:border-0">
                            {!! $profil->link_peta !!}
                        </div>
                    @else
                        <!-- Dummy Placeholder Map -->
                        <div class="w-full h-full rounded bg-[#E3DBBB] flex flex-col items-center justify-center text-[#AEB784]">
                            <svg class="w-16 h-16 mb-4 text-[#AEB784]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <p class="font-medium">Peta Belum Diatur</p>
                            <p class="text-sm">Admin perlu memasukkan iframe Google Maps di Dashboard.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
