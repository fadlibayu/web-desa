@extends('public.layouts.app')

@section('title', 'Album Kegiatan Dusun')

@section('content')
<!-- Header Page -->
<section class="bg-[#41431B] pt-32 pb-20 relative">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold font-serif text-[#F8F3E1] mb-4">Album Kegiatan</h1>
        <p class="text-[#AEB784] text-lg max-w-2xl mx-auto">Arsip kumpulan foto berbagai kegiatan dan acara kemasyarakatan di Dusun Gatak.</p>
    </div>
</section>

<!-- Album List Section -->
<section class="py-16 bg-[#F8F3E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($albums as $album)
            <a href="{{ route('album.show', $album->slug) }}" class="bg-[#E3DBBB] rounded-2xl overflow-hidden group block hover:-translate-y-1 transition-all duration-300 shadow-sm hover:shadow-md">
                <div class="h-56 overflow-hidden relative border-b-4 border-[#41431B]">
                    @if($album->cover_foto)
                        <img src="{{ Storage::url($album->cover_foto) }}" alt="{{ $album->nama_kegiatan }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-[#E3DBBB] flex items-center justify-center text-[#AEB784]">
                            <svg class="w-16 h-16 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-[#F8F3E1]/90 backdrop-blur text-[#41431B] text-xs font-bold px-3 py-1 rounded-full">
                        {{ $album->tanggal_acara ? $album->tanggal_acara->format('d M Y') : '-' }}
                    </div>
                </div>
                <div class="p-6 bg-[#F8F3E1] flex justify-between items-end">
                    <div>
                        <h3 class="text-xl font-bold font-serif text-[#41431B] mb-2 group-hover:text-[#AEB784] transition">{{ $album->nama_kegiatan }}</h3>
                        <p class="text-sm font-semibold text-[#AEB784] flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ is_array($album->kumpulan_foto) ? count($album->kumpulan_foto) : 0 }} Foto
                        </p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-[#E3DBBB] flex items-center justify-center group-hover:bg-[#41431B] transition-colors text-[#41431B] group-hover:text-[#F8F3E1]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-20 text-[#41431B]">
                <svg class="w-16 h-16 mx-auto text-[#AEB784] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <p class="text-xl font-medium">Belum ada album kegiatan yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $albums->links() }}
        </div>
    </div>
</section>
@endsection
