@extends('public.layouts.app')

@section('title', 'Berita & Informasi')

@section('content')
<!-- Header Page -->
<section class="bg-[#41431B] pt-32 pb-20 relative">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold font-serif text-[#F8F3E1] mb-4">Berita Dusun</h1>
        <p class="text-[#AEB784] text-lg max-w-2xl mx-auto">Kabar terbaru, pengumuman, dan informasi seputar kegiatan masyarakat di Dusun Gatak.</p>
    </div>
</section>

<!-- Berita List Section -->
<section class="py-16 bg-[#F8F3E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($beritas as $berita)
            <a href="{{ route('berita.show', $berita->id) }}" class="bg-[#E3DBBB] rounded-2xl overflow-hidden group block hover:-translate-y-1 transition-all duration-300 shadow-sm hover:shadow-md">
                <div class="h-56 overflow-hidden relative border-b-4 border-[#41431B]">
                    @if($berita->gambar)
                        <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-[#E3DBBB] flex items-center justify-center text-[#AEB784]">
                            <svg class="w-16 h-16 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-[#F8F3E1]/90 backdrop-blur text-[#41431B] text-xs font-bold px-3 py-1 rounded-full">
                        {{ $berita->created_at->format('d M Y') }}
                    </div>
                </div>
                <div class="p-6 bg-[#F8F3E1]">
                    <h3 class="text-xl font-bold font-serif text-[#41431B] mb-3 group-hover:text-[#AEB784] transition">{{ $berita->judul }}</h3>
                    <p class="text-[#41431B]/70 text-sm line-clamp-3 mb-4">{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                    <span class="text-[#AEB784] text-sm font-semibold flex items-center gap-2 group-hover:gap-3 transition-all">Baca Selengkapnya &rarr;</span>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-20 text-[#41431B]">
                <svg class="w-16 h-16 mx-auto text-[#AEB784] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3L22 4"></path></svg>
                <p class="text-xl font-medium">Belum ada berita yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $beritas->links() }}
        </div>
    </div>
</section>
@endsection
