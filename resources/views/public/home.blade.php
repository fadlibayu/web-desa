@extends('public.layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen min-h-[600px] flex items-center justify-start text-[#F8F3E1] overflow-hidden" style="background-image: url('{{ asset('hero-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <!-- Gradient Overlay for better text readability -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full pt-20">
        <div class="max-w-2xl">
            <h1 class="text-6xl md:text-8xl font-bold font-serif mb-4 leading-none tracking-tight drop-shadow-lg">Dusun Gatak</h1>
            <h2 class="text-xl md:text-2xl font-medium mb-6 drop-shadow-md text-gray-200">Harmonious Living at the Heart of Nature</h2>
            <p class="text-base md:text-lg text-gray-300 mb-10 leading-relaxed drop-shadow-md max-w-lg">A traditional village community where nature, culture, and sustainable living unite in perfect harmony.</p>
            
            <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-transparent border-2 border-[#F8F3E1]/70 text-[#F8F3E1] font-medium rounded-full hover:bg-[#F8F3E1] hover:text-black transition-all duration-300">
                Explore Our Village
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex flex-col items-center opacity-70 animate-bounce">
        <span class="text-xs uppercase tracking-widest mb-2 font-medium">Scroll</span>
        <div class="w-1 h-1 bg-[#F8F3E1] rounded-full"></div>
    </div>
</section>

<!-- Profil Summary Section -->
<section class="py-20 bg-[#F8F3E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-block mb-4 px-4 py-1 bg-[#E3DBBB] text-[#41431B] text-sm font-bold uppercase tracking-widest rounded-full">Tentang Kami</div>
        <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#41431B] mb-8">Profil Dusun Gatak</h2>
        <div class="max-w-3xl mx-auto mb-10">
            @if(isset($profil) && $profil->visi)
                <p class="text-xl italic text-[#41431B] mb-6 font-serif">"{{ $profil->visi }}"</p>
            @else
                <p class="text-lg text-[#41431B] mb-6">Bersama-sama membangun desa yang makmur, agamis, dan sejahtera melalui gotong royong.</p>
            @endif
        </div>
        <a href="{{ route('profil') }}" class="btn-primary px-6 py-3 inline-flex items-center gap-2">Baca Visi Misi Lengkap &rarr;</a>
    </div>
</section>

<!-- Infografis Summary Section -->
<section class="py-20 bg-[#F8F3E1] border-y border-[#E3DBBB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="md:w-1/2">
                <div class="inline-block mb-4 px-4 py-1 bg-[#E3DBBB] text-[#41431B] text-sm font-bold uppercase tracking-widest rounded-full">Statistik</div>
                <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#41431B] mb-6">Sekilas Angka Kependudukan</h2>
                <p class="text-[#41431B] mb-8 leading-relaxed">Transparansi data kependudukan desa merupakan langkah kami menuju tata kelola pemerintahan desa yang akuntabel.</p>
                <a href="{{ route('infografis') }}" class="btn-primary px-6 py-3 inline-flex items-center gap-2">Lihat Seluruh Infografis &rarr;</a>
            </div>
            
            <div class="md:w-1/2 w-full grid grid-cols-2 gap-4">
                <div class="nature-card p-6 text-center border-t-[#41431B]">
                    <div class="text-4xl font-bold text-[#41431B] mb-2">{{ isset($penduduk_stats) ? number_format($penduduk_stats->total_penduduk) : 0 }}</div>
                    <div class="text-sm font-medium text-[#AEB784] uppercase tracking-wide">Total Penduduk</div>
                </div>
                <div class="nature-card p-6 text-center border-t-[#AEB784]">
                    <div class="text-4xl font-bold text-[#AEB784] mb-2">{{ isset($penduduk_stats) ? number_format($penduduk_stats->kepala_keluarga) : 0 }}</div>
                    <div class="text-sm font-medium text-[#AEB784] uppercase tracking-wide">Kepala Keluarga</div>
                </div>
                <div class="nature-card p-6 text-center border-t-blue-600">
                    <div class="text-3xl font-bold text-blue-600 mb-2">{{ isset($penduduk_stats) ? number_format($penduduk_stats->laki_laki) : 0 }}</div>
                    <div class="text-xs font-medium text-[#AEB784] uppercase tracking-wide">Laki-laki</div>
                </div>
                <div class="nature-card p-6 text-center border-t-pink-500">
                    <div class="text-3xl font-bold text-pink-500 mb-2">{{ isset($penduduk_stats) ? number_format($penduduk_stats->perempuan) : 0 }}</div>
                    <div class="text-xs font-medium text-[#AEB784] uppercase tracking-wide">Perempuan</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- UMK Section -->
<section class="py-20 bg-[#F8F3E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-block mb-4 px-4 py-1 bg-[#E3DBBB] text-[#AEB784] text-sm font-bold uppercase tracking-widest rounded-full">Potensi Desa</div>
            <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#41431B]">Produk Unggulan UMK</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($umk_products as $umk)
            <div class="nature-card overflow-hidden flex flex-col h-full border-t-0 border border-[#E3DBBB]">
                <div class="h-48 bg-[#E3DBBB] flex-shrink-0">
                    @if($umk->foto_produk)
                        <img src="{{ Storage::url($umk->foto_produk) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-[#AEB784] bg-[#E3DBBB]"><span class="text-2xl">📦</span></div>
                    @endif
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg text-[#41431B] mb-1 line-clamp-1">{{ $umk->nama_produk }}</h3>
                    <p class="text-[#41431B] font-semibold mb-3">Rp {{ number_format($umk->harga, 0, ',', '.') }}</p>
                    <p class="text-[#41431B] text-sm mb-4 line-clamp-2 flex-grow">{{ $umk->deskripsi }}</p>
                    <button class="w-full py-2 btn-secondary text-sm">Hubungi Penjual</button>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-[#AEB784]">Belum ada data produk UMK.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Berita Section -->
<section id="kabar-desa" class="py-20 bg-[#F8F3E1] border-t border-[#E3DBBB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#41431B]">Kabar Terbaru</h2>
            <div class="w-24 h-1 bg-[#41431B] mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($beritas as $berita)
            <a href="{{ route('berita.show', $berita->id) }}" class="nature-card rounded-2xl overflow-hidden group block hover:-translate-y-1 transition-all duration-300">
                <div class="h-48 overflow-hidden relative">
                    @if($berita->gambar)
                        <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-[#E3DBBB] flex items-center justify-center text-[#AEB784]">
                            <svg class="w-12 h-12 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-[#41431B] text-xs font-bold px-3 py-1 rounded-full">
                        {{ $berita->created_at->format('d M Y') }}
                    </div>
                </div>
                <div class="p-6 bg-white">
                    <h3 class="text-xl font-bold font-serif text-[#41431B] mb-3 group-hover:text-[#AEB784] transition">{{ $berita->judul }}</h3>
                    <p class="text-[#AEB784] text-sm line-clamp-3 mb-4">{{ Str::limit(strip_tags($berita->konten), 100) }}</p>
                    <span class="text-[#AEB784] text-sm font-semibold flex items-center gap-2 group-hover:gap-3 transition-all">Baca Selengkapnya &rarr;</span>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12 text-[#AEB784]">Belum ada berita.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
