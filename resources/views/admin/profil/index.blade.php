<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-[#41431B] tracking-tight">Pengaturan Profil & Statistik Desa</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm font-medium">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <!-- Profil Desa -->
                    <div class="admin-card p-8">
                        <h3 class="text-lg font-semibold text-[#41431B] mb-6 border-b border-[#E3DBBB] pb-3">Profil Visi & Misi</h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-[#41431B] mb-2">Visi Desa</label>
                                <textarea name="visi" rows="3" class="admin-input w-full">{{ old('visi', $profil->visi) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#41431B] mb-2">Misi Desa</label>
                                <textarea name="misi" rows="6" class="admin-input w-full">{{ old('misi', $profil->misi) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#41431B] mb-2">Bagan Struktur Organisasi (SOTK)</label>
                                <input type="file" name="foto_sotk" class="text-sm text-[#41431B] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-[#E3DBBB] file:text-[#41431B] hover:file:bg-[#d1e8da] transition-colors cursor-pointer mb-4">
                                @if($profil->foto_sotk)
                                    <div class="w-full h-40 bg-[#F8F3E1] flex items-center justify-center overflow-hidden rounded-lg border border-[#E3DBBB]">
                                        <img src="{{ Storage::url($profil->foto_sotk) }}" class="h-full object-contain mix-blend-multiply">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8 flex flex-col">
                        <!-- Informasi Geografis -->
                        <div class="admin-card p-8">
                            <h3 class="text-lg font-semibold text-[#41431B] mb-6 border-b border-[#E3DBBB] pb-3">Informasi Geografis</h3>
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-[#41431B] mb-2">Luas Desa (Keterangan)</label>
                                    <input type="text" name="luas_desa" value="{{ old('luas_desa', $profil->luas_desa) }}" placeholder="Contoh: 1.250 Hektar" class="admin-input w-full">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-[#41431B] mb-2">Link Iframe Google Maps</label>
                                    <p class="text-xs text-[#AEB784] mb-2">Dapatkan dari Google Maps > Share > Embed a map > Copy HTML. Tempelkan seluruh kodenya di bawah ini.</p>
                                    <textarea name="link_peta" rows="4" class="admin-input w-full font-mono text-sm" placeholder='<iframe src="..."></iframe>'>{{ old('link_peta', $profil->link_peta) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Statistik Penduduk -->
                        <div class="admin-card p-8 flex-grow">
                            <h3 class="text-lg font-semibold text-[#41431B] mb-6 border-b border-[#E3DBBB] pb-3">Angka Statistik Kependudukan</h3>
                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-medium text-[#41431B] mb-2">Total Penduduk</label>
                                    <input type="number" name="total_penduduk" value="{{ old('total_penduduk', $stats->total_penduduk) }}" class="admin-input w-full font-semibold text-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-[#41431B] mb-2">Kepala Keluarga (KK)</label>
                                    <input type="number" name="kepala_keluarga" value="{{ old('kepala_keluarga', $stats->kepala_keluarga) }}" class="admin-input w-full font-semibold text-lg text-purple-700">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-[#41431B] mb-2">Laki-laki</label>
                                    <input type="number" name="laki_laki" value="{{ old('laki_laki', $stats->laki_laki) }}" class="admin-input w-full font-semibold text-lg text-[#41431B]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-[#41431B] mb-2">Perempuan</label>
                                    <input type="number" name="perempuan" value="{{ old('perempuan', $stats->perempuan) }}" class="admin-input w-full font-semibold text-lg text-[#AEB784]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pemerintahan / Kepala Dusun -->
                <div class="admin-card p-8 mt-8">
                    <h3 class="text-lg font-semibold text-[#41431B] mb-6 border-b border-[#E3DBBB] pb-3">Profil Kepala Dusun</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-[#41431B] mb-2">Nama Kepala Dusun</label>
                                <input type="text" name="kepala_nama" value="{{ old('kepala_nama', $profil->kepala_nama) }}" class="admin-input w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#41431B] mb-2">Jabatan (Misal: Kepala Dusun)</label>
                                <input type="text" name="kepala_jabatan" value="{{ old('kepala_jabatan', $profil->kepala_jabatan) }}" class="admin-input w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#41431B] mb-2">Periode Jabatan</label>
                                <input type="text" name="kepala_periode" value="{{ old('kepala_periode', $profil->kepala_periode) }}" class="admin-input w-full" placeholder="Contoh: Periode 2021 - 2050">
                            </div>
                        </div>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-[#41431B] mb-2">Deskripsi / Visi Misi Pribadi</label>
                                <textarea name="kepala_deskripsi" rows="4" class="admin-input w-full">{{ old('kepala_deskripsi', $profil->kepala_deskripsi) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#41431B] mb-2">Foto Kepala Dusun</label>
                                <input type="file" name="kepala_foto" class="text-sm text-[#41431B] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-[#E3DBBB] file:text-[#41431B] hover:file:bg-[#d1e8da] transition-colors cursor-pointer mb-2">
                                @if($profil->kepala_foto)
                                    <div class="w-24 h-24 bg-[#F8F3E1] overflow-hidden rounded-full border-2 border-[#AEB784] mt-2">
                                        <img src="{{ Storage::url($profil->kepala_foto) }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 text-right">
                    <button type="submit" class="btn-primary px-8 py-3 text-base">Simpan Seluruh Pengaturan</button>
                </div>
            </form>

            <!-- Perangkat Desa -->
            <div class="admin-card p-8 mt-12">
                <h3 class="text-lg font-semibold text-[#41431B] mb-6 border-b border-[#E3DBBB] pb-3">Daftar Perangkat Desa / Staf</h3>
                
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Form Tambah Perangkat -->
                    <div class="md:w-1/3">
                        <form action="{{ route('admin.perangkat.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="text-sm font-medium text-[#41431B] block mb-1">Nama Staf</label>
                                <input type="text" name="nama" class="admin-input w-full" required>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-[#41431B] block mb-1">Jabatan</label>
                                <input type="text" name="jabatan" class="admin-input w-full" required placeholder="Contoh: Sekretaris Desa">
                            </div>
                            <button type="submit" class="btn-primary w-full mt-2">Tambah Perangkat</button>
                        </form>
                    </div>

                    <!-- Tabel Perangkat -->
                    <div class="md:w-2/3">
                        <div class="overflow-x-auto border border-[#E3DBBB] rounded-lg">
                            <table class="w-full text-left border-collapse bg-[#F8F3E1]">
                                <thead>
                                    <tr class="bg-[#E3DBBB]/50 border-b border-[#E3DBBB]">
                                        <th class="p-3 text-sm font-semibold text-[#41431B]">Nama</th>
                                        <th class="p-3 text-sm font-semibold text-[#41431B]">Jabatan</th>
                                        <th class="p-3 text-sm font-semibold text-[#41431B] text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#E3DBBB]">
                                    @foreach($perangkat_desas as $p)
                                    <tr class="hover:bg-[#E3DBBB]/30">
                                        <td class="p-3 font-medium text-[#41431B]">{{ $p->nama }}</td>
                                        <td class="p-3 text-[#AEB784]">{{ $p->jabatan }}</td>
                                        <td class="p-3 text-right">
                                            <form action="{{ route('admin.perangkat.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline text-sm font-medium">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if($perangkat_desas->isEmpty())
                                    <tr>
                                        <td colspan="3" class="p-4 text-center text-[#AEB784]">Belum ada perangkat desa.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
