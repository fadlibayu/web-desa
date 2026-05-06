<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-[#41431B] tracking-tight">
            {{ isset($berita) ? 'Edit Berita' : 'Tulis Berita Baru' }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="admin-card p-8">
                <form action="{{ isset($berita) ? route('admin.berita.update', $berita->id) : route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($berita)) @method('PUT') @endif

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-[#41431B] mb-2">Judul Berita</label>
                        <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" class="admin-input w-full" required>
                        @error('judul') <span class="text-[#c53030] text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-[#41431B] mb-2">Konten Berita</label>
                        <textarea name="konten" rows="10" class="admin-input w-full" required>{{ old('konten', $berita->konten ?? '') }}</textarea>
                        @error('konten') <span class="text-[#c53030] text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-medium text-[#41431B] mb-2">Foto Berita (Opsional)</label>
                        <div class="flex items-center gap-4">
                            <input type="file" name="gambar" class="text-sm text-[#41431B] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-[#E3DBBB] file:text-[#41431B] hover:file:bg-[#d1e8da] transition-colors cursor-pointer">
                        </div>
                        @if(isset($berita) && $berita->gambar)
                            <div class="mt-4"><img src="{{ Storage::url($berita->gambar) }}" class="h-32 object-cover rounded-lg border border-[#E3DBBB] shadow-sm"></div>
                        @endif
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-[#E3DBBB]">
                        <a href="{{ route('admin.berita.index') }}" class="px-6 py-2 rounded-md text-[#41431B] font-medium hover:bg-[#E3DBBB] transition-colors text-sm">Batal</a>
                        <button type="submit" class="btn-primary">Simpan Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
