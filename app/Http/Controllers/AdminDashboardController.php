<?php

namespace App\Http\Controllers;

use App\Models\AparaturDesa;
use App\Models\ArsipDokumen;
use App\Models\BeritaDesa;
use App\Models\GaleriDesa;
use App\Models\ProfilDesa;
use App\Models\StatistikDesa;
use App\Models\SuratPindah;
use App\Models\SuratPindahF125;
use App\Models\SuratPindahF129;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalSurat = 0;
        try {
            $totalSurat += SuratPindahF125::count();
        } catch (\Throwable $e) {}

        try {
            $totalSurat += SuratPindahF129::count();
        } catch (\Throwable $e) {}

        try {
            $totalSurat += SuratPindah::count();
        } catch (\Throwable $e) {}

        $arsipDokumens = collect();
        try {
            if (Schema::hasTable('arsip_dokumens')) {
                $arsipDokumens = ArsipDokumen::latest()->get();
            }
        } catch (\Throwable $e) {}
        $totalBerkas = $arsipDokumens->count();

        $profil = ProfilDesa::first();
        $beritas = BeritaDesa::latest()->get();
        $galeris = GaleriDesa::latest()->get();
        $aparaturs = AparaturDesa::orderBy('urutan', 'asc')->get();
        $statistik = StatistikDesa::orderBy('urutan', 'asc')->get();

        return view('dashboard', compact(
            'totalSurat',
            'totalBerkas',
            'arsipDokumens',
            'profil',
            'beritas',
            'galeris',
            'aparaturs',
            'statistik'
        ));
    }

    /**
     * Update Profil Desa.
     */
    public function updateProfil(Request $request): RedirectResponse
    {
        $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'foto_kantor' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $profil = ProfilDesa::first() ?? new ProfilDesa();

        if ($request->hasFile('foto_kantor')) {
            // Hapus foto lama jika ada
            if ($profil->foto_banner && File::exists(public_path($profil->foto_banner))) {
                File::delete(public_path($profil->foto_banner));
            }
            $file = $request->file('foto_kantor');
            $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profil'), $filename);
            $profil->foto_banner = 'uploads/profil/' . $filename;
        }

        $profil->deskripsi_singkat = $request->deskripsi;
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;
        $profil->save();

        return redirect()->back()->with('success', 'Profil Desa Lubuk Mandian Gajah berhasil diperbarui!');
    }

    /**
     * Store Berita Desa.
     */
    public function storeBerita(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string',
            'ringkasan' => 'nullable|string',
            'isi' => 'nullable|string',
            'isi_berita' => 'nullable|string',
            'konten' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'penulis' => 'nullable|string',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            if (!File::exists(public_path('uploads/berita'))) {
                File::makeDirectory(public_path('uploads/berita'), 0755, true);
            }
            $file = $request->file('gambar');
            $filename = 'berita_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/berita'), $filename);
            $gambarPath = 'uploads/berita/' . $filename;
        }

        $isiText = $request->isi ?? $request->isi_berita ?? $request->konten ?? '';

        $ringkasan = $request->filled('ringkasan') 
            ? $request->ringkasan 
            : Str::limit(strip_tags($isiText), 160);

        BeritaDesa::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . time(),
            'kategori' => $request->kategori ?? 'Kegiatan',
            'ringkasan' => $ringkasan,
            'isi_berita' => $isiText,
            'gambar' => $gambarPath,
            'penulis' => $request->penulis ?? 'Admin Desa',
            'tanggal_publikasi' => $request->tanggal_publikasi ?? now(),
        ]);

        return redirect()->back()->with('success', 'Berita desa baru berhasil dipublikasikan!');
    }

    /**
     * Update Berita Desa.
     */
    public function updateBerita(Request $request, $id): RedirectResponse
    {
        $berita = BeritaDesa::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string',
            'ringkasan' => 'nullable|string',
            'isi' => 'nullable|string',
            'isi_berita' => 'nullable|string',
            'konten' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'penulis' => 'nullable|string',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && File::exists(public_path($berita->gambar))) {
                File::delete(public_path($berita->gambar));
            }
            if (!File::exists(public_path('uploads/berita'))) {
                File::makeDirectory(public_path('uploads/berita'), 0755, true);
            }
            $file = $request->file('gambar');
            $filename = 'berita_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/berita'), $filename);
            $berita->gambar = 'uploads/berita/' . $filename;
        }

        $isiText = $request->isi ?? $request->isi_berita ?? $request->konten ?? $berita->isi_berita;

        $berita->judul = $request->judul;
        if ($berita->isDirty('judul') || empty($berita->slug)) {
            $berita->slug = Str::slug($request->judul) . '-' . $berita->id;
        }
        if ($request->filled('kategori')) {
            $berita->kategori = $request->kategori;
        }
        $berita->ringkasan = $request->filled('ringkasan') 
            ? $request->ringkasan 
            : Str::limit(strip_tags($isiText), 160);
        $berita->isi_berita = $isiText;
        if ($request->filled('penulis')) {
            $berita->penulis = $request->penulis;
        }
        if ($request->filled('tanggal_publikasi')) {
            $berita->tanggal_publikasi = $request->tanggal_publikasi;
        }
        $berita->save();

        return redirect()->back()->with('success', 'Data berita berhasil diperbarui!');
    }

    /**
     * Delete Berita Desa.
     */
    public function destroyBerita($id): RedirectResponse
    {
        $berita = BeritaDesa::findOrFail($id);
        if ($berita->gambar && File::exists(public_path($berita->gambar))) {
            File::delete(public_path($berita->gambar));
        }
        $berita->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * Store Galeri Desa.
     */
    public function storeGaleri(Request $request): RedirectResponse
    {
        $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'tanggal_dokumentasi' => 'nullable|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:15360',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = 'galeri_' . time() . '_' . Str::random(5) . '.' . ($extension === 'png' ? 'png' : 'jpg');
            $destinationDir = storage_path('app/public/galeri');

            if (!File::exists($destinationDir)) {
                File::makeDirectory($destinationDir, 0755, true);
            }

            $destinationPath = $destinationDir . '/' . $filename;
            $optimized = false;

            if (extension_loaded('gd')) {
                try {
                    $realPath = $file->getRealPath();
                    $imageInfo = @getimagesize($realPath);
                    if ($imageInfo) {
                        $mime = $imageInfo['mime'];
                        $srcImg = null;
                        switch ($mime) {
                            case 'image/jpeg':
                                $srcImg = @imagecreatefromjpeg($realPath);
                                break;
                            case 'image/png':
                                $srcImg = @imagecreatefrompng($realPath);
                                break;
                            case 'image/webp':
                                $srcImg = @imagecreatefromwebp($realPath);
                                break;
                        }

                        if ($srcImg) {
                            $origWidth = imagesx($srcImg);
                            $origHeight = imagesy($srcImg);
                            $maxWidth = 1920;
                            $maxHeight = 1920;

                            $newWidth = $origWidth;
                            $newHeight = $origHeight;

                            if ($origWidth > $maxWidth || $origHeight > $maxHeight) {
                                $ratio = min($maxWidth / $origWidth, $maxHeight / $origHeight);
                                $newWidth = (int) ($origWidth * $ratio);
                                $newHeight = (int) ($origHeight * $ratio);
                            }

                            $newImg = imagecreatetruecolor($newWidth, $newHeight);
                            if ($mime === 'image/png' || $mime === 'image/webp') {
                                imagealphablending($newImg, false);
                                imagesavealpha($newImg, true);
                            }

                            imagecopyresampled($newImg, $srcImg, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

                            if ($mime === 'image/png') {
                                imagepng($newImg, $destinationPath, 6);
                            } else {
                                imagejpeg($newImg, $destinationPath, 82);
                            }

                            imagedestroy($srcImg);
                            imagedestroy($newImg);
                            $optimized = true;
                        }
                    }
                } catch (\Throwable $e) {
                    $optimized = false;
                }
            }

            if (!$optimized) {
                $path = $file->store('galeri', 'public');
            } else {
                $path = 'galeri/' . $filename;
            }
        }

        GaleriDesa::create([
            'judul_kegiatan' => $request->judul_kegiatan,
            'kategori' => $request->kategori ?? 'Kegiatan',
            'tanggal_kegiatan' => $request->tanggal_dokumentasi ?? now(),
            'foto' => $path ? 'storage/' . $path : null,
        ]);

        return back()->with('success', 'Foto dokumentasi galeri berhasil ditambahkan!');
    }

    /**
     * Delete Galeri Desa.
     */
    public function destroyGaleri($id): RedirectResponse
    {
        $galeri = GaleriDesa::findOrFail($id);
        if ($galeri->foto && File::exists(public_path($galeri->foto))) {
            File::delete(public_path($galeri->foto));
        }
        $galeri->delete();

        return redirect()->back()->with('success', 'Foto galeri berhasil dihapus!');
    }

    /**
     * Store Struktur / Aparatur Desa.
     */
    public function storeStruktur(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'aparatur_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/aparatur'), $filename);
            $fotoPath = 'uploads/aparatur/' . $filename;
        }

        AparaturDesa::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'kontak' => $request->kontak,
            'foto' => $fotoPath,
            'urutan' => $request->urutan ?? (AparaturDesa::max('urutan') + 1),
        ]);

        return redirect()->back()->with('success', 'Perangkat desa berhasil ditambahkan!');
    }

    /**
     * Alias for storeStruktur.
     */
    public function aparaturStore(Request $request): RedirectResponse
    {
        return $this->storeStruktur($request);
    }

    /**
     * Update Struktur / Aparatur Desa.
     */
    public function updateStruktur(Request $request, $id): RedirectResponse
    {
        $aparatur = AparaturDesa::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            if ($aparatur->foto && File::exists(public_path($aparatur->foto))) {
                File::delete(public_path($aparatur->foto));
            }
            $file = $request->file('foto');
            $filename = 'aparatur_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/aparatur'), $filename);
            $aparatur->foto = 'uploads/aparatur/' . $filename;
        }

        $aparatur->nama = $request->nama;
        $aparatur->jabatan = $request->jabatan;
        $aparatur->nip = $request->nip;
        $aparatur->kontak = $request->kontak;
        if ($request->filled('urutan')) {
            $aparatur->urutan = $request->urutan;
        }
        $aparatur->save();

        return redirect()->back()->with('success', 'Data aparatur desa berhasil diperbarui!');
    }

    /**
     * Delete Struktur / Aparatur Desa.
     */
    public function destroyStruktur($id): RedirectResponse
    {
        $aparatur = AparaturDesa::findOrFail($id);
        if ($aparatur->foto && File::exists(public_path($aparatur->foto))) {
            File::delete(public_path($aparatur->foto));
        }
        $aparatur->delete();

        return redirect()->back()->with('success', 'Data aparatur desa berhasil dihapus!');
    }

    /**
     * Update or Store Infografis / Statistik Desa.
     */
    public function updateInfografis(Request $request): RedirectResponse
    {
        // Update standard stats or create dynamic stats
        if ($request->filled('total_warga')) {
            StatistikDesa::updateOrCreate(
                ['label' => 'Total Jiwa (Warga)'],
                ['jumlah' => $request->total_warga, 'kategori' => 'Kependudukan', 'ikon' => 'users', 'urutan' => 1]
            );
        }
        if ($request->filled('total_kk')) {
            StatistikDesa::updateOrCreate(
                ['label' => 'Total Kepala Keluarga (KK)'],
                ['jumlah' => $request->total_kk, 'kategori' => 'Kependudukan', 'ikon' => 'home', 'urutan' => 2]
            );
        }
        if ($request->filled('laki_laki')) {
            StatistikDesa::updateOrCreate(
                ['label' => 'Jumlah Laki-laki'],
                ['jumlah' => $request->laki_laki, 'kategori' => 'Kependudukan', 'ikon' => 'user-male', 'urutan' => 3]
            );
        }
        if ($request->filled('perempuan')) {
            StatistikDesa::updateOrCreate(
                ['label' => 'Jumlah Perempuan'],
                ['jumlah' => $request->perempuan, 'kategori' => 'Kependudukan', 'ikon' => 'user-female', 'urutan' => 4]
            );
        }

        // Custom statistic added via form
        if ($request->filled('label_custom') && $request->filled('jumlah_custom')) {
            StatistikDesa::create([
                'label' => $request->label_custom,
                'jumlah' => $request->jumlah_custom,
                'kategori' => $request->kategori_custom ?? 'Umum',
                'ikon' => $request->ikon_custom ?? 'chart',
                'urutan' => $request->urutan_custom ?? (StatistikDesa::max('urutan') + 1),
            ]);
        }

        return redirect()->back()->with('success', 'Data statistik & infografis desa berhasil diperbarui!');
    }

    /**
     * Alias for updateInfografis.
     */
    public function storeInfografis(Request $request): RedirectResponse
    {
        return $this->updateInfografis($request);
    }

    /**
     * Delete Statistik item.
     */
    public function destroyStatistik($id): RedirectResponse
    {
        $stat = StatistikDesa::findOrFail($id);
        $stat->delete();

        return redirect()->back()->with('success', 'Item statistik berhasil dihapus!');
    }
}
