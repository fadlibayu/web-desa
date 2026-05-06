@extends('public.layouts.app')

@section('title', 'Infografis & Statistik')

@section('content')
<!-- Header Page -->
<section class="bg-[#41431B] pt-32 pb-20 relative">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold font-serif text-[#F8F3E1] mb-4">Demografi Penduduk</h1>
        <p class="text-[#E3DBBB] text-lg max-w-2xl mx-auto">Visualisasi data kependudukan terpadu sebagai wujud transparansi informasi publik.</p>
    </div>
</section>

<!-- 1. Statistik Kependudukan Umum -->
<section class="py-16 bg-[#F8F3E1] -mt-10 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <div class="nature-card p-6 md:p-8 text-center border-t-[#41431B] shadow-lg bg-[#F8F3E1]">
                <div class="text-xs md:text-sm font-bold text-[#AEB784] uppercase tracking-widest mb-2">Total Penduduk</div>
                <div class="text-4xl md:text-5xl font-bold text-[#41431B]">{{ isset($penduduk_stats) ? number_format($penduduk_stats->total_penduduk) : 0 }}</div>
                <div class="mt-2 text-[#AEB784] text-xs">Jiwa</div>
            </div>
            <div class="nature-card p-6 md:p-8 text-center border-t-[#AEB784] shadow-lg bg-[#F8F3E1]">
                <div class="text-xs md:text-sm font-bold text-[#AEB784] uppercase tracking-widest mb-2">Kepala Keluarga</div>
                <div class="text-4xl md:text-5xl font-bold text-[#AEB784]">{{ isset($penduduk_stats) ? number_format($penduduk_stats->kepala_keluarga) : 0 }}</div>
                <div class="mt-2 text-[#AEB784] text-xs">KK</div>
            </div>
            <div class="nature-card p-6 md:p-8 text-center border-t-blue-600 shadow-lg bg-[#F8F3E1]">
                <div class="text-xs md:text-sm font-bold text-[#AEB784] uppercase tracking-widest mb-2">Laki-Laki</div>
                <div class="text-3xl md:text-4xl font-bold text-blue-600">{{ isset($penduduk_stats) ? number_format($penduduk_stats->laki_laki) : 0 }}</div>
                <div class="mt-2 text-[#AEB784] text-xs">Jiwa</div>
            </div>
            <div class="nature-card p-6 md:p-8 text-center border-t-pink-500 shadow-lg bg-[#F8F3E1]">
                <div class="text-xs md:text-sm font-bold text-[#AEB784] uppercase tracking-widest mb-2">Perempuan</div>
                <div class="text-3xl md:text-4xl font-bold text-pink-500">{{ isset($penduduk_stats) ? number_format($penduduk_stats->perempuan) : 0 }}</div>
                <div class="mt-2 text-[#AEB784] text-xs">Jiwa</div>
            </div>
        </div>
    </div>
</section>

<!-- Grafik Section Container -->
<section class="py-16 bg-[#F8F3E1] border-t border-[#E3DBBB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
            <!-- Berdasarkan Kelompok Umur (Horizontal Bar) -->
            <div>
                <div class="mb-6 flex items-center gap-3 border-b-2 border-[#E3DBBB] pb-3">
                    <div class="w-2 h-8 bg-[#AEB784] rounded-full"></div>
                    <h2 class="text-2xl font-bold font-serif text-[#41431B]">Berdasarkan Kelompok Umur</h2>
                </div>
                
                <div class="nature-card p-6 bg-[#F8F3E1]">
                    @if(isset($demografis['usia']) && count($demografis['usia']) > 0)
                        <div class="relative h-[400px] w-full">
                            <canvas id="chartUsia"></canvas>
                        </div>
                    @else
                        <div class="h-[400px] flex items-center justify-center text-[#AEB784] border-2 border-dashed border-[#E3DBBB] rounded-lg">
                            <p>Data kelompok umur belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Berdasarkan Pendidikan (Vertical Bar) -->
            <div>
                <div class="mb-6 flex items-center gap-3 border-b-2 border-[#E3DBBB] pb-3">
                    <div class="w-2 h-8 bg-[#AEB784] rounded-full"></div>
                    <h2 class="text-2xl font-bold font-serif text-[#41431B]">Berdasarkan Pendidikan</h2>
                </div>
                
                <div class="nature-card p-6 bg-[#F8F3E1]">
                    @if(isset($demografis['pendidikan']) && count($demografis['pendidikan']) > 0)
                        <div class="relative h-[400px] w-full">
                            <canvas id="chartPendidikan"></canvas>
                        </div>
                    @else
                        <div class="h-[400px] flex items-center justify-center text-[#AEB784] border-2 border-dashed border-[#E3DBBB] rounded-lg">
                            <p>Data pendidikan belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Berdasarkan Pekerjaan (Bar Chart) -->
            <div>
                <div class="mb-6 flex items-center gap-3 border-b-2 border-[#E3DBBB] pb-3">
                    <div class="w-2 h-8 bg-[#41431B] rounded-full"></div>
                    <h2 class="text-2xl font-bold font-serif text-[#41431B]">Berdasarkan Pekerjaan</h2>
                </div>
                
                <div class="nature-card p-6 bg-[#F8F3E1]">
                    @if(isset($demografis['pekerjaan']) && count($demografis['pekerjaan']) > 0)
                        <div class="relative h-[400px] w-full">
                            <canvas id="chartPekerjaan"></canvas>
                        </div>
                    @else
                        <div class="h-[400px] flex items-center justify-center text-[#AEB784] border-2 border-dashed border-[#E3DBBB] rounded-lg">
                            <p>Data pekerjaan belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Berdasarkan Agama (Pie Chart) -->
            <div>
                <div class="mb-6 flex items-center gap-3 border-b-2 border-[#E3DBBB] pb-3">
                    <div class="w-2 h-8 bg-[#AEB784] rounded-full"></div>
                    <h2 class="text-2xl font-bold font-serif text-[#41431B]">Berdasarkan Agama</h2>
                </div>
                
                <div class="nature-card p-6 bg-[#F8F3E1]">
                    @if(isset($demografis['agama']) && count($demografis['agama']) > 0)
                        <div class="relative h-[400px] w-full flex justify-center">
                            <canvas id="chartAgama"></canvas>
                        </div>
                    @else
                        <div class="h-[400px] flex items-center justify-center text-[#AEB784] border-2 border-dashed border-[#E3DBBB] rounded-lg">
                            <p>Data agama belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Fasilitas & Potensi Dusun -->
<section class="py-16 bg-[#F8F3E1] border-t border-[#E3DBBB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold font-serif text-[#41431B] mb-3">Fasilitas & Potensi Dusun</h2>
            <p class="text-[#AEB784] max-w-2xl mx-auto">Gambaran ketersediaan fasilitas umum, infrastruktur, dan potensi lingkungan yang ada di Dusun Gatak.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- 1. Fasilitas Pendidikan -->
            <div class="bg-[#E3DBBB]/60 rounded-2xl p-6 border border-[#E3DBBB] hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-[#AEB784] flex items-center justify-center text-[#41431B] shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v6"></path></svg>
                    </div>
                    <h3 class="font-bold text-[#41431B] text-lg">Fasilitas Pendidikan</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Sekolah Dasar (SD)</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5">SD Negeri Gatak</div>
                        </div>
                    </div>
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Taman Kanak-kanak (TK)</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5">TK ABA Gatak</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Fasilitas Ibadah -->
            <div class="bg-[#E3DBBB]/60 rounded-2xl p-6 border border-[#E3DBBB] hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-[#AEB784] flex items-center justify-center text-[#41431B] shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="font-bold text-[#41431B] text-lg">Fasilitas Ibadah</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Masjid Dusun</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5">Masjid Al-Iman Gatak</div>
                        </div>
                    </div>
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-center gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div class="font-bold text-[#41431B] text-sm">Masjid Al-Mujahidin</div>
                    </div>
                </div>
            </div>

            <!-- 3. Fasilitas Kesehatan -->
            <div class="bg-[#E3DBBB]/60 rounded-2xl p-6 border border-[#E3DBBB] hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-[#AEB784] flex items-center justify-center text-[#41431B] shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-[#41431B] text-lg">Fasilitas Kesehatan</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-center gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div class="font-bold text-[#41431B] text-sm">Posyandu</div>
                    </div>
                </div>
            </div>

            <!-- 4. Infrastruktur Jalan -->
            <div class="bg-[#E3DBBB]/60 rounded-2xl p-6 border border-[#E3DBBB] hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-[#AEB784] flex items-center justify-center text-[#41431B] shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <h3 class="font-bold text-[#41431B] text-lg">Infrastruktur Jalan</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Jalan Dusun</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Sebagian besar jalan sudah beraspal dan dapat dilalui kendaraan roda dua maupun roda empat.</div>
                        </div>
                    </div>
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Aksesibilitas</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Lokasi strategis dengan akses menuju jalan utama di wilayah Sleman.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Sarana Air -->
            <div class="bg-[#E3DBBB]/60 rounded-2xl p-6 border border-[#E3DBBB] hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-[#AEB784] flex items-center justify-center text-[#41431B] shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12.164a3 3 0 01-1.393 2.548l-6 3.6a3 3 0 01-3.214 0l-6-3.6A3 3 0 012 12.164V8.336a3 3 0 011.393-2.548l6-3.6a3 3 0 013.214 0l6 3.6A3 3 0 0120 8.336v3.828zM12 16.5l8-4.8M12 16.5v5.5"></path></svg>
                    </div>
                    <h3 class="font-bold text-[#41431B] text-lg">Sarana Air Bersih</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Sumber Air Bersih</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Menggunakan sumur warga dan sebagian memanfaatkan jaringan air bersih (PAMDES).</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. Listrik & Telekomunikasi -->
            <div class="bg-[#E3DBBB]/60 rounded-2xl p-6 border border-[#E3DBBB] hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-[#AEB784] flex items-center justify-center text-[#41431B] shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-[#41431B] text-lg">Listrik & Telekomunikasi</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Jaringan Listrik</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Seluruh wilayah dusun telah teraliri listrik.</div>
                        </div>
                    </div>
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Internet & Seluler</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Sinyal komunikasi relatif stabil, mendukung penggunaan internet untuk kebutuhan sehari-hari.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. Fasilitas Umum & Ekonomi -->
            <div class="bg-[#E3DBBB]/60 rounded-2xl p-6 border border-[#E3DBBB] hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-[#AEB784] flex items-center justify-center text-[#41431B] shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="font-bold text-[#41431B] text-lg">Fasilitas Ekonomi</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Warung & Toko Kelontong</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Tersedia untuk memenuhi kebutuhan harian warga.</div>
                        </div>
                    </div>
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">UMKM Lokal</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Bengkel Las</div>
                        </div>
                    </div>
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Balai Dusun</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Digunakan untuk kegiatan rapat, acara warga, dan kegiatan sosial.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. Potensi Lingkungan -->
            <div class="bg-[#E3DBBB]/60 rounded-2xl p-6 border border-[#E3DBBB] hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-[#AEB784] flex items-center justify-center text-[#41431B] shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h3 class="font-bold text-[#41431B] text-lg">Potensi Alam & Lingkungan</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Area Pertanian</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Lahan pertanian masih aktif digunakan oleh warga.</div>
                        </div>
                    </div>
                    <div class="bg-[#F8F3E1] rounded-xl p-3 flex items-start gap-3 shadow-sm border border-[#F8F3E1] hover:border-[#AEB784] transition">
                        <div class="text-[#AEB784] mt-0.5 shrink-0"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div>
                            <div class="font-bold text-[#41431B] text-sm">Lingkungan Asri</div>
                            <div class="text-[#41431B]/70 text-xs mt-0.5 leading-relaxed">Terletak di kawasan lereng Merapi, udara relatif sejuk dan lingkungan masih alami.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#718096';
    // Register datalabels plugin globally, but default to not display unless specified
    Chart.register(ChartDataLabels);
    Chart.defaults.plugins.datalabels.display = false;

    // Data Kelompok Umur (Horizontal Bar Chart)
    @if(isset($demografis['usia']) && count($demografis['usia']) > 0)
        const labelsUsia = {!! json_encode($demografis['usia']->pluck('label')) !!};
        const dataUsia = {!! json_encode($demografis['usia']->pluck('jumlah')) !!};
        
        new Chart(document.getElementById('chartUsia'), {
            type: 'bar',
            data: {
                labels: labelsUsia,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: dataUsia,
                    backgroundColor: '#AEB784', // Light green
                    borderColor: '#41431B',
                    borderWidth: 1,
                    borderRadius: 4,
                }]
            },
            options: {
                indexAxis: 'y', // Makes it horizontal
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        display: true,
                        align: 'end',
                        anchor: 'end',
                        color: '#41431B',
                        font: { weight: 'bold' }
                    }
                },
                scales: {
                    x: { beginAtZero: true, grid: { color: '#E3DBBB' } },
                    y: { grid: { display: false } }
                }
            }
        });
    @endif

    // Data Pendidikan (Vertical Bar Chart)
    @if(isset($demografis['pendidikan']) && count($demografis['pendidikan']) > 0)
        const labelsPendidikan = {!! json_encode($demografis['pendidikan']->pluck('label')) !!};
        const dataPendidikan = {!! json_encode($demografis['pendidikan']->pluck('jumlah')) !!};
        
        new Chart(document.getElementById('chartPendidikan'), {
            type: 'bar',
            data: {
                labels: labelsPendidikan,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: dataPendidikan,
                    backgroundColor: '#AEB784', // Matched image green
                    borderRadius: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        display: true,
                        align: 'end',
                        anchor: 'end',
                        color: '#4a5568',
                        font: { size: 11, weight: '500' }
                    }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#E3DBBB' } },
                    x: { 
                        grid: { display: false },
                        ticks: {
                            maxRotation: 0,
                            minRotation: 0,
                            callback: function(value, index, values) {
                                // Break long labels into multiple lines
                                let label = this.getLabelForValue(value);
                                if(label.length > 15) {
                                    return label.split(' ');
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    @endif

    // Data Pekerjaan
    @if(isset($demografis['pekerjaan']) && count($demografis['pekerjaan']) > 0)
        const labelsPekerjaan = {!! json_encode($demografis['pekerjaan']->pluck('label')) !!};
        const dataPekerjaan = {!! json_encode($demografis['pekerjaan']->pluck('jumlah')) !!};
        
        new Chart(document.getElementById('chartPekerjaan'), {
            type: 'bar',
            data: {
                labels: labelsPekerjaan,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: dataPekerjaan,
                    backgroundColor: '#41431B',
                    borderRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    datalabels: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#E3DBBB' } },
                    x: { grid: { display: false } }
                }
            }
        });
    @endif

    // Data Agama
    @if(isset($demografis['agama']) && count($demografis['agama']) > 0)
        const labelsAgama = {!! json_encode($demografis['agama']->pluck('label')) !!};
        const dataAgama = {!! json_encode($demografis['agama']->pluck('jumlah')) !!};
        
        new Chart(document.getElementById('chartAgama'), {
            type: 'doughnut',
            data: {
                labels: labelsAgama,
                datasets: [{
                    data: dataAgama,
                    backgroundColor: [
                        '#41431B', // Hijau
                        '#AEB784', // Coklat
                        '#3182ce', // Biru
                        '#d53f8c', // Pink
                        '#805ad5', // Ungu
                        '#dd6b20'  // Orange
                    ],
                    borderWidth: 2,
                    borderColor: '#F8F3E1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'right' },
                    datalabels: { display: false }
                },
                cutout: '60%'
            }
        });
    @endif

});
</script>
@endpush
