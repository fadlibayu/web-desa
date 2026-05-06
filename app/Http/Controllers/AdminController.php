<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Demografi;
use App\Models\UmkProduct;
use App\Models\PendudukStat;
use App\Models\ProfilDesa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $beritaCount = Berita::count();
        $demografiCount = Demografi::count();
        return view('dashboard', compact('beritaCount', 'demografiCount'));
    }

    // --- CRUD Berita ---
    public function beritaIndex() {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }
    public function beritaCreate() {
        return view('admin.berita.form');
    }
    public function beritaStore(Request $request) {
        $request->validate(['judul' => 'required', 'konten' => 'required', 'gambar' => 'image|nullable']);
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul) . '-' . time();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }
        Berita::create($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }
    public function beritaEdit(Berita $berita) {
        return view('admin.berita.form', compact('berita'));
    }
    public function beritaUpdate(Request $request, Berita $berita) {
        $request->validate(['judul' => 'required', 'konten' => 'required', 'gambar' => 'image|nullable']);
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul) . '-' . time();
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }
        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate');
    }
    public function beritaDestroy(Berita $berita) {
        if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita dihapus');
    }

    // --- CRUD Demografi ---
    public function demografiIndex(Request $request) {
        $kategori = $request->get('kategori', 'usia');
        $demografis = Demografi::where('kategori', $kategori)->get();
        $kategoriList = Demografi::select('kategori')->distinct()->pluck('kategori');
        if($kategoriList->isEmpty()) $kategoriList = collect(['usia', 'pekerjaan', 'agama', 'pendidikan']);
        return view('admin.demografi.index', compact('demografis', 'kategori', 'kategoriList'));
    }
    public function demografiStore(Request $request) {
        $request->validate(['kategori' => 'required', 'label' => 'required', 'jumlah' => 'required|numeric']);
        Demografi::create($request->all());
        return back()->with('success', 'Data demografi ditambahkan');
    }
    public function demografiDestroy(Demografi $demografi) {
        $demografi->delete();
        return back()->with('success', 'Data dihapus');
    }

    // --- Pengaturan Profil & Statistik ---
    public function profilIndex() {
        $profil = ProfilDesa::first() ?? new ProfilDesa();
        $stats = PendudukStat::first() ?? new PendudukStat();
        $perangkat_desas = \App\Models\PerangkatDesa::all();
        return view('admin.profil.index', compact('profil', 'stats', 'perangkat_desas'));
    }
    public function profilUpdate(Request $request) {
        $profil = ProfilDesa::first() ?? new ProfilDesa();
        $data = $request->only(['visi', 'misi', 'link_peta', 'luas_desa', 'kepala_nama', 'kepala_jabatan', 'kepala_periode', 'kepala_deskripsi']);
        
        if ($request->hasFile('foto_sotk')) {
            if ($profil->foto_sotk) Storage::disk('public')->delete($profil->foto_sotk);
            $data['foto_sotk'] = $request->file('foto_sotk')->store('profil', 'public');
        }
        
        if ($request->hasFile('kepala_foto')) {
            if ($profil->kepala_foto) Storage::disk('public')->delete($profil->kepala_foto);
            $data['kepala_foto'] = $request->file('kepala_foto')->store('profil', 'public');
        }

        if($profil->exists) $profil->update($data); else ProfilDesa::create($data);

        $stats = PendudukStat::first() ?? new PendudukStat();
        $statsData = $request->only(['total_penduduk', 'laki_laki', 'perempuan', 'kepala_keluarga', 'mutasi']);
        if($stats->exists) $stats->update($statsData); else PendudukStat::create($statsData);

        return back()->with('success', 'Profil, Kepala Dusun, dan Statistik diperbarui');
    }

    // --- CRUD Perangkat Desa ---
    public function perangkatStore(Request $request) {
        $request->validate(['nama' => 'required', 'jabatan' => 'required']);
        \App\Models\PerangkatDesa::create($request->all());
        return back()->with('success', 'Perangkat Desa berhasil ditambahkan');
    }
    public function perangkatDestroy(\App\Models\PerangkatDesa $perangkat) {
        $perangkat->delete();
        return back()->with('success', 'Perangkat Desa dihapus');
    }
    // --- CRUD Album Desa ---
    public function albumIndex() {
        $albums = \App\Models\Album::latest()->get();
        return view('admin.album.index', compact('albums'));
    }
    public function albumCreate() {
        return view('admin.album.form');
    }
    public function albumStore(Request $request) {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_acara' => 'required|date',
            'cover_foto' => 'image|nullable',
            'kumpulan_foto.*' => 'image|nullable'
        ]);
        
        $data = $request->only(['nama_kegiatan', 'tanggal_acara']);
        $data['slug'] = Str::slug($request->nama_kegiatan) . '-' . time();
        
        if ($request->hasFile('cover_foto')) {
            $data['cover_foto'] = $request->file('cover_foto')->store('album', 'public');
        }

        if ($request->hasFile('kumpulan_foto')) {
            $kumpulan = [];
            foreach ($request->file('kumpulan_foto') as $file) {
                $kumpulan[] = $file->store('album_galeri', 'public');
            }
            $data['kumpulan_foto'] = $kumpulan;
        }

        \App\Models\Album::create($data);
        return redirect()->route('admin.album.index')->with('success', 'Album berhasil ditambahkan');
    }
    public function albumEdit(\App\Models\Album $album) {
        return view('admin.album.form', compact('album'));
    }
    public function albumUpdate(Request $request, \App\Models\Album $album) {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_acara' => 'required|date',
            'cover_foto' => 'image|nullable',
            'kumpulan_foto.*' => 'image|nullable'
        ]);

        $data = $request->only(['nama_kegiatan', 'tanggal_acara']);
        $data['slug'] = Str::slug($request->nama_kegiatan) . '-' . time();
        
        if ($request->hasFile('cover_foto')) {
            if ($album->cover_foto) Storage::disk('public')->delete($album->cover_foto);
            $data['cover_foto'] = $request->file('cover_foto')->store('album', 'public');
        }

        if ($request->hasFile('kumpulan_foto')) {
            $kumpulan = $album->kumpulan_foto ?? [];
            foreach ($request->file('kumpulan_foto') as $file) {
                $kumpulan[] = $file->store('album_galeri', 'public');
            }
            $data['kumpulan_foto'] = $kumpulan;
        }

        $album->update($data);
        return redirect()->route('admin.album.index')->with('success', 'Album berhasil diupdate');
    }
    public function albumDestroy(\App\Models\Album $album) {
        if ($album->cover_foto) Storage::disk('public')->delete($album->cover_foto);
        if ($album->kumpulan_foto) {
            foreach ($album->kumpulan_foto as $foto) {
                Storage::disk('public')->delete($foto);
            }
        }
        $album->delete();
        return redirect()->route('admin.album.index')->with('success', 'Album dihapus');
    }
}
