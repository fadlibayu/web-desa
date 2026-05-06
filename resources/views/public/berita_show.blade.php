@extends('public.layouts.app')

@section('title', $berita->judul)

@section('content')
<!-- Header Page -->
<section class="bg-[#41431B] pt-32 pb-20 relative">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-[#AEB784] hover:text-[#F8F3E1] transition font-medium text-sm mb-6">
            &larr; Kembali ke Daftar Berita
        </a>
        <h1 class="text-3xl md:text-5xl font-bold font-serif text-[#F8F3E1] mb-6 leading-tight max-w-4xl mx-auto">{{ $berita->judul }}</h1>
        <div class="flex items-center justify-center gap-6 text-sm text-[#E3DBBB] font-medium">
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $berita->created_at->format('d F Y') }}
            </span>
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Admin Dusun
            </span>
        </div>
    </div>
</section>

<section class="py-12 bg-[#F8F3E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <article class="bg-[#F8F3E1] rounded-2xl overflow-hidden">
                    @if($berita->gambar)
                        <div class="w-full h-[400px] md:h-[500px] rounded-2xl overflow-hidden mb-10 shadow-sm border-b-4 border-[#41431B]">
                            <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="prose prose-lg max-w-none text-[#41431B]/80 leading-relaxed mb-12">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>

                    <div class="border-t border-[#E3DBBB] pt-8 flex items-center justify-between">
                        <span class="font-bold text-[#41431B]">Bagikan:</span>
                        <div class="flex gap-4">
                            <button onclick="window.print()" class="w-10 h-10 rounded-full bg-[#E3DBBB] flex items-center justify-center text-[#41431B] hover:bg-[#AEB784] hover:text-[#F8F3E1] transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            </button>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <div class="bg-[#E3DBBB] rounded-2xl p-6 sticky top-32">
                    <h3 class="text-xl font-bold font-serif text-[#41431B] mb-6 border-b border-[#AEB784] pb-3">Berita Lainnya</h3>
                    
                    <div class="flex flex-col gap-6">
                        @forelse($recent_beritas as $recent)
                            <a href="{{ route('berita.show', $recent->id) }}" class="flex gap-4 group">
                                <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-[#F8F3E1]">
                                    @if($recent->gambar)
                                        <img src="{{ Storage::url($recent->gambar) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[#AEB784]">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#41431B] text-sm leading-tight mb-1 group-hover:text-[#AEB784] transition">{{ $recent->judul }}</h4>
                                    <span class="text-xs text-[#AEB784] font-medium">{{ $recent->created_at->format('d M Y') }}</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-[#41431B]/70">Belum ada berita lain.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
