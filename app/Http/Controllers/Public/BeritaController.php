<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BeritaDesa;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Tampilkan daftar berita desa.
     */
    public function index()
    {
        $beritas = BeritaDesa::latest()->get();
        return view('berita', compact('beritas'));
    }

    /**
     * Tampilkan detail berita berdasarkan slug atau ID.
     */
    public function show($id)
    {
        // Cari berdasarkan slug terlebih dahulu, jika tidak ditemukan fallback ke ID
        $berita = BeritaDesa::where('slug', $id)->first();

        if (!$berita) {
            $berita = BeritaDesa::find($id);
        }

        if (!$berita) {
            abort(404, 'Berita tidak ditemukan.');
        }

        // Berita terkait (terbaru selain berita yang sedang dibuka)
        $beritaTerkait = BeritaDesa::where('id', '!=', $berita->id)->latest()->take(4)->get();

        return view('berita-detail', compact('berita', 'beritaTerkait'));
    }
}
