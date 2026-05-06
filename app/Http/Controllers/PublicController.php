<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Demografi;
use App\Models\UmkProduct;
use App\Models\PendudukStat;
use App\Models\ProfilDesa;

class PublicController extends Controller
{
    public function home()
    {
        $beritas = Berita::latest()->take(4)->get();
        $umk_products = UmkProduct::latest()->take(4)->get();
        $profil = ProfilDesa::first();
        $penduduk_stats = PendudukStat::first();
        return view('public.home', compact('beritas', 'umk_products', 'profil', 'penduduk_stats'));
    }

    public function infografis()
    {
        $demografis = Demografi::all()->groupBy('kategori');
        $penduduk_stats = PendudukStat::first();
        return view('public.infografis', compact('demografis', 'penduduk_stats'));
    }

    public function profil()
    {
        $profil = ProfilDesa::first() ?? new ProfilDesa();
        $perangkat_desas = \App\Models\PerangkatDesa::all();
        $penduduk_stats = PendudukStat::first();
        return view('public.profil', compact('profil', 'perangkat_desas', 'penduduk_stats'));
    }

    public function berita()
    {
        $beritas = Berita::latest()->paginate(9);
        return view('public.berita', compact('beritas'));
    }

    public function beritaShow($id)
    {
        $berita = Berita::findOrFail($id);
        $recent_beritas = Berita::where('id', '!=', $id)->latest()->take(5)->get();
        return view('public.berita_show', compact('berita', 'recent_beritas'));
    }

    public function album()
    {
        $albums = \App\Models\Album::latest()->paginate(9);
        return view('public.album', compact('albums'));
    }

    public function albumShow($slug)
    {
        $album = \App\Models\Album::where('slug', $slug)->firstOrFail();
        $recent_albums = \App\Models\Album::where('id', '!=', $album->id)->latest()->take(3)->get();
        return view('public.album_show', compact('album', 'recent_albums'));
    }
}
