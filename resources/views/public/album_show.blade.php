@extends('public.layouts.app')

@section('title', $album->nama_kegiatan)

@section('content')
<!-- Header Space -->
<div class="bg-[#41431B] pt-28"></div>

<section class="py-12 bg-[#F8F3E1]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 text-[#41431B]">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center hover:text-[#AEB784] font-medium transition">
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                        <a href="{{ route('album') }}" class="ms-1 hover:text-[#AEB784] font-medium transition md:ms-2">Album</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                        <span class="ms-1 text-[#AEB784] font-medium md:ms-2 line-clamp-1">{{ $album->nama_kegiatan }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Album Header -->
        <div class="mb-10 text-center">
            <h1 class="text-3xl md:text-5xl font-bold font-serif text-[#41431B] mb-6 leading-tight">{{ $album->nama_kegiatan }}</h1>
            <div class="flex items-center justify-center gap-4 text-sm font-medium text-[#41431B]">
                <span class="bg-[#E3DBBB] px-4 py-1.5 rounded-full flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#AEB784]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $album->tanggal_acara ? $album->tanggal_acara->format('d M Y') : '-' }}
                </span>
                <span class="bg-[#E3DBBB] px-4 py-1.5 rounded-full flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#AEB784]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ is_array($album->kumpulan_foto) ? count($album->kumpulan_foto) : 0 }} Foto
                </span>
            </div>
        </div>

        <!-- Album Cover -->
        @if($album->cover_foto)
        <div class="w-full h-[300px] md:h-[450px] rounded-3xl overflow-hidden shadow-md mb-12 border-4 border-[#E3DBBB]">
            <img src="{{ Storage::url($album->cover_foto) }}" alt="{{ $album->nama_kegiatan }}" class="w-full h-full object-cover">
        </div>
        @endif

        <div class="w-24 h-1 bg-[#41431B] mx-auto mb-12"></div>

        <!-- Album Gallery Grid & Lightbox -->
        <div x-data="{ 
            lightboxOpen: false, 
            activeImage: '', 
            currentIndex: 0,
            images: [{{ is_array($album->kumpulan_foto) ? collect($album->kumpulan_foto)->map(fn($f) => "'" . Storage::url($f) . "'")->implode(',') : '' }}] 
        }">
            <h2 class="text-2xl font-bold font-serif text-[#41431B] mb-8 text-center">Kumpulan Foto Kegiatan</h2>
            
            @if(is_array($album->kumpulan_foto) && count($album->kumpulan_foto) > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @foreach($album->kumpulan_foto as $index => $foto)
                        <!-- Galeri Item -->
                        <div @click="lightboxOpen = true; currentIndex = {{ $index }}; activeImage = images[{{ $index }}]" class="group relative aspect-square rounded-2xl overflow-hidden bg-[#E3DBBB] cursor-pointer shadow-sm border-2 border-transparent hover:border-[#AEB784] transition-all">
                            <img src="{{ Storage::url($foto) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-[#41431B]/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <div class="bg-[#F8F3E1] text-[#41431B] rounded-full p-3 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-[#E3DBBB] rounded-2xl border-2 border-dashed border-[#AEB784]">
                    <p class="text-[#41431B] font-medium">Belum ada koleksi foto yang ditambahkan ke dalam album ini.</p>
                </div>
            @endif

            <!-- Lightbox Overlay -->
            <div x-show="lightboxOpen" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 backdrop-blur-sm" x-transition.opacity>
                <!-- Close Button -->
                <button @click="lightboxOpen = false" class="absolute top-4 right-4 md:top-6 md:right-6 text-white hover:text-[#AEB784] transition bg-black/50 p-2 rounded-full">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                
                <!-- Prev Button -->
                <button @click.stop="currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1; activeImage = images[currentIndex]" class="absolute left-2 md:left-8 text-white hover:text-[#AEB784] transition bg-black/50 p-2 md:p-3 rounded-full">
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <!-- Next Button -->
                <button @click.stop="currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1; activeImage = images[currentIndex]" class="absolute right-2 md:right-8 text-white hover:text-[#AEB784] transition bg-black/50 p-2 md:p-3 rounded-full">
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <!-- Image Container -->
                <div class="max-w-[90vw] max-h-[85vh] flex items-center justify-center" @click.away="lightboxOpen = false">
                    <img :src="activeImage" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl" x-transition>
                </div>
                
                <!-- Counter -->
                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-white bg-black/50 px-4 py-1.5 rounded-full text-sm font-medium tracking-widest">
                    <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Album Lainnya -->
@if($recent_albums->count() > 0)
<section class="py-16 bg-[#E3DBBB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold font-serif text-[#41431B] mb-8">Album Lainnya</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($recent_albums as $recent)
            <a href="{{ route('album.show', $recent->slug) }}" class="bg-[#F8F3E1] rounded-xl overflow-hidden group block hover:-translate-y-1 transition-all duration-300 shadow-sm border border-transparent hover:border-[#AEB784]">
                <div class="h-40 overflow-hidden relative">
                    @if($recent->cover_foto)
                        <img src="{{ Storage::url($recent->cover_foto) }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-[#E3DBBB]"></div>
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="font-bold font-serif text-[#41431B] mb-2 group-hover:text-[#AEB784] transition">{{ $recent->nama_kegiatan }}</h3>
                    <p class="text-xs font-semibold text-[#AEB784]">{{ $recent->tanggal_acara ? $recent->tanggal_acara->format('d M Y') : '-' }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
