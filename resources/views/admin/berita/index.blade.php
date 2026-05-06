<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-[#41431B] tracking-tight">Kelola Berita</h2>
            <a href="{{ route('admin.berita.create') }}" class="btn-primary">Tambah Berita</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium">{{ session('success') }}</div>
            @endif

            <div class="admin-card overflow-hidden">
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#E3DBBB]/50 border-b border-[#E3DBBB]">
                                <th class="p-4 text-xs font-semibold tracking-wide text-[#86868b] uppercase">Judul</th>
                                <th class="p-4 text-xs font-semibold tracking-wide text-[#86868b] uppercase">Tanggal</th>
                                <th class="p-4 text-xs font-semibold tracking-wide text-[#86868b] uppercase">Status</th>
                                <th class="p-4 text-xs font-semibold tracking-wide text-[#86868b] uppercase text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($beritas as $berita)
                            <tr class="hover:bg-[#E3DBBB]/50 transition-colors">
                                <td class="p-4 font-medium text-[#41431B]">{{ $berita->judul }}</td>
                                <td class="p-4 text-sm text-[#86868b]">{{ $berita->created_at->format('d/m/Y') }}</td>
                                <td class="p-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">{{ $berita->status }}</span>
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-4 justify-end items-center">
                                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-[#41431B] hover:text-[#AEB784] text-sm font-semibold transition">Edit</a>
                                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');" class="m-0 p-0 flex">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-[#c53030] hover:text-red-700 text-sm font-semibold transition">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if($beritas->isEmpty())
                            <tr>
                                <td colspan="4" class="p-8 text-center text-[#86868b]">Belum ada berita.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
