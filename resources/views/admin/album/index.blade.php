<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-[#41431B] tracking-tight">Manajemen Album Desa</h2>
            <a href="{{ route('admin.album.create') }}" class="btn-primary">Tambah Album Baru</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm font-medium">{{ session('success') }}</div>
            @endif

            <div class="admin-card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#E3DBBB]/50 border-b border-[#E3DBBB]">
                                <th class="p-4 text-sm font-semibold text-[#41431B]">Cover</th>
                                <th class="p-4 text-sm font-semibold text-[#41431B]">Nama Kegiatan</th>
                                <th class="p-4 text-sm font-semibold text-[#41431B]">Tanggal Acara</th>
                                <th class="p-4 text-sm font-semibold text-[#41431B]">Jumlah Foto</th>
                                <th class="p-4 text-sm font-semibold text-[#41431B] text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E3DBBB]">
                            @forelse($albums as $album)
                            <tr class="hover:bg-[#F8F3E1] transition-colors">
                                <td class="p-4">
                                    @if($album->cover_foto)
                                        <div class="w-20 h-14 rounded overflow-hidden bg-[#E3DBBB]">
                                            <img src="{{ Storage::url($album->cover_foto) }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="w-20 h-14 rounded bg-[#E3DBBB] flex items-center justify-center text-xs text-[#AEB784]">No Image</div>
                                    @endif
                                </td>
                                <td class="p-4 font-medium text-[#41431B]">{{ $album->nama_kegiatan }}</td>
                                <td class="p-4 text-sm text-[#AEB784]">{{ $album->tanggal_acara ? $album->tanggal_acara->format('d M Y') : '-' }}</td>
                                <td class="p-4 text-sm text-[#41431B] font-bold">
                                    {{ is_array($album->kumpulan_foto) ? count($album->kumpulan_foto) : 0 }} Foto
                                </td>
                                <td class="p-4 text-right space-x-3">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.album.edit', $album->id) }}" class="text-[#AEB784] hover:text-[#41431B] font-medium text-sm transition-colors">Edit</a>
                                        <form action="{{ route('admin.album.destroy', $album->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus album ini beserta seluruh fotonya?');" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm transition-colors">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-[#AEB784]">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-[#E3DBBB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Belum ada album kegiatan yang ditambahkan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
