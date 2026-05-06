<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-[#41431B] tracking-tight">
            {{ isset($album) ? 'Edit Album Kegiatan' : 'Tambah Album Baru' }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="admin-card p-8">
                <form action="{{ isset($album) ? route('admin.album.update', $album->id) : route('admin.album.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($album)) @method('PUT') @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Kegiatan -->
                        <div>
                            <label class="block text-sm font-medium text-[#41431B] mb-2">Nama Kegiatan / Acara</label>
                            <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $album->nama_kegiatan ?? '') }}" class="admin-input w-full" required placeholder="Misal: Perayaan HUT RI ke-79">
                            @error('nama_kegiatan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Tanggal Acara -->
                        <div>
                            <label class="block text-sm font-medium text-[#41431B] mb-2">Tanggal Acara</label>
                            <input type="date" name="tanggal_acara" value="{{ old('tanggal_acara', isset($album) && $album->tanggal_acara ? $album->tanggal_acara->format('Y-m-d') : '') }}" class="admin-input w-full" required>
                            @error('tanggal_acara') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Cover Foto -->
                    <div>
                        <label class="block text-sm font-medium text-[#41431B] mb-2">Foto Cover (Sampul)</label>
                        <p class="text-xs text-[#AEB784] mb-3">Foto utama yang akan tampil di halaman depan galeri.</p>
                        <input type="file" name="cover_foto" accept="image/*" class="text-sm text-[#41431B] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-[#E3DBBB] file:text-[#41431B] hover:file:bg-[#d1e8da] transition-colors cursor-pointer" {{ isset($album) ? '' : 'required' }}>
                        @if(isset($album) && $album->cover_foto)
                            <div class="mt-4 w-48 h-32 rounded bg-[#F8F3E1] overflow-hidden border border-[#E3DBBB]">
                                <img src="{{ Storage::url($album->cover_foto) }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        @error('cover_foto') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full h-px bg-[#E3DBBB] my-6"></div>

                    <!-- Kumpulan Foto -->
                    <div>
                        <label class="block text-sm font-medium text-[#41431B] mb-2">Kumpulan Foto Kegiatan</label>
                        <p class="text-xs text-[#AEB784] mb-3">Anda bisa memilih banyak foto sekaligus (Multiple Upload). Jika sedang mengedit, foto yang diunggah akan <b>ditambahkan</b> ke koleksi foto yang sudah ada.</p>
                        <input type="file" name="kumpulan_foto[]" accept="image/*" multiple class="text-sm text-[#41431B] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-[#E3DBBB] file:text-[#41431B] hover:file:bg-[#d1e8da] transition-colors cursor-pointer w-full border border-dashed border-[#AEB784] p-4 rounded-xl">
                        @error('kumpulan_foto.*') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

                        @if(isset($album) && is_array($album->kumpulan_foto) && count($album->kumpulan_foto) > 0)
                            <div class="mt-6">
                                <p class="text-sm font-medium text-[#41431B] mb-3">Foto yang sudah ada ({{ count($album->kumpulan_foto) }}):</p>
                                <div class="grid grid-cols-3 md:grid-cols-5 gap-3">
                                    @foreach($album->kumpulan_foto as $foto)
                                        <div class="aspect-square rounded bg-[#F8F3E1] overflow-hidden border border-[#E3DBBB]">
                                            <img src="{{ Storage::url($foto) }}" class="w-full h-full object-cover">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="pt-6 border-t border-[#E3DBBB] flex justify-end gap-4">
                        <a href="{{ route('admin.album.index') }}" class="px-6 py-2 rounded-xl text-sm font-medium text-[#41431B] bg-[#E3DBBB] hover:bg-[#d1e8da] transition-colors">Batal</a>
                        <button type="submit" class="btn-primary">
                            {{ isset($album) ? 'Simpan Perubahan' : 'Buat Album' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
