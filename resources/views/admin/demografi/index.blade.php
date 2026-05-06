<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-[#41431B] tracking-tight">Kelola Demografi Penduduk</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row gap-8">
            
            <!-- List Kategori & Form Tambah -->
            <div class="md:w-1/3 space-y-8">
                <!-- Filter Kategori -->
                <div class="admin-card p-6">
                    <h3 class="font-semibold text-[#41431B] mb-4">Pilih Kategori</h3>
                    <form method="GET" action="{{ route('admin.demografi.index') }}" class="flex gap-2">
                        <select name="kategori" class="admin-input w-full text-sm" onchange="this.form.submit()">
                            @foreach($kategoriList as $kat)
                                <option value="{{ $kat }}" {{ $kategori == $kat ? 'selected' : '' }}>{{ ucfirst($kat) }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <!-- Form Tambah -->
                <div class="admin-card p-6">
                    <h3 class="font-semibold text-[#41431B] mb-4">Tambah Data Baru</h3>
                    @if(session('success'))
                        <div class="bg-green-50 text-green-700 p-3 text-sm rounded-lg mb-4 font-medium">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('admin.demografi.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="text-xs font-medium text-[#AEB784] block mb-1">Kategori Baru / Ada</label>
                            <input type="text" name="kategori" value="{{ $kategori }}" class="admin-input w-full text-sm" required placeholder="Contoh: usia">
                        </div>
                        <div>
                            <label class="text-xs font-medium text-[#AEB784] block mb-1">Label Data</label>
                            <input type="text" name="label" class="admin-input w-full text-sm" required placeholder="Contoh: Laki-laki">
                        </div>
                        <div>
                            <label class="text-xs font-medium text-[#AEB784] block mb-1">Jumlah (Jiwa)</label>
                            <input type="number" name="jumlah" class="admin-input w-full text-sm" required placeholder="100">
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="btn-primary w-full">Tambahkan Data</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="md:w-2/3">
                <div class="admin-card overflow-hidden">
                    <div class="p-6 border-b border-[#E3DBBB] flex items-center justify-between">
                        <h3 class="font-semibold text-lg text-[#41431B] capitalize">Data: <span class="text-[#41431B]">{{ $kategori }}</span></h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#E3DBBB]/50 border-b border-[#E3DBBB]">
                                    <th class="p-4 text-xs font-semibold tracking-wide text-[#AEB784] uppercase">Label</th>
                                    <th class="p-4 text-xs font-semibold tracking-wide text-[#AEB784] uppercase text-right">Jumlah</th>
                                    <th class="p-4 text-xs font-semibold tracking-wide text-[#AEB784] uppercase text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($demografis as $d)
                                <tr class="hover:bg-[#E3DBBB]/50 transition-colors">
                                    <td class="p-4 font-medium text-[#41431B]">{{ $d->label }}</td>
                                    <td class="p-4 text-right font-semibold text-[#41431B]">{{ number_format($d->jumlah) }}</td>
                                    <td class="p-4">
                                        <div class="flex justify-end items-center">
                                            <form action="{{ route('admin.demografi.destroy', $d->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');" class="m-0 p-0 flex">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-[#c53030] hover:text-red-700 text-sm font-semibold transition">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="text-center text-[#AEB784] py-12">Belum ada data untuk kategori ini.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
