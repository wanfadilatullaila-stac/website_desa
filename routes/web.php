<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ArsipDokumenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratPindahController;
use App\Http\Controllers\SuratPindahF125Controller;
use App\Http\Controllers\SuratPindahF129Controller;
use App\Http\Controllers\SuratPindahF134Controller;
use App\Http\Controllers\SuratKelahiranF201Controller;
use App\Http\Controllers\BiodataKeluargaF101Controller;
use App\Models\AparaturDesa;
use App\Models\BeritaDesa;
use App\Models\GaleriDesa;
use App\Models\ProfilDesa;
use App\Models\StatistikDesa;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $profil = ProfilDesa::first();
    $beritas = BeritaDesa::latest()->take(3)->get();
    $galeris = GaleriDesa::latest()->take(6)->get();
    $aparaturs = AparaturDesa::orderBy('urutan', 'asc')->get();
    $statistik = StatistikDesa::orderBy('urutan', 'asc')->get();

    return view('welcome', compact('profil', 'beritas', 'galeris', 'aparaturs', 'statistik'));
});

Route::get('/dokumen', function () {
    return view('dokumen');
});

Route::get('/peta', function () {
    return view('peta');
});

Route::get('/infografis', function () {
    $statistik = StatistikDesa::orderBy('urutan', 'asc')->get();
    return view('infografis', compact('statistik'));
});

Route::get('/galeri', function () {
    $galeris = GaleriDesa::latest()->get();
    return view('galeri', compact('galeris'));
});

Route::get('/struktur', function () {
    $aparaturs = AparaturDesa::orderBy('urutan', 'asc')->get();
    return view('struktur', compact('aparaturs'));
});

Route::get('/berita', function () {
    $beritas = BeritaDesa::latest()->get();
    return view('berita', compact('beritas'));
})->name('berita');

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Management Konten Website
    Route::post('/admin/update-profil', [AdminDashboardController::class, 'updateProfil'])->name('admin.update-profil');

    Route::post('/admin/store-berita', [AdminDashboardController::class, 'storeBerita'])->name('admin.store-berita');
    Route::put('/admin/update-berita/{id}', [AdminDashboardController::class, 'updateBerita'])->name('admin.update-berita');
    Route::delete('/admin/destroy-berita/{id}', [AdminDashboardController::class, 'destroyBerita'])->name('admin.destroy-berita');

    Route::post('/admin/store-galeri', [AdminDashboardController::class, 'storeGaleri'])->name('galeri.store');
    Route::delete('/admin/destroy-galeri/{id}', [AdminDashboardController::class, 'destroyGaleri'])->name('admin.destroy-galeri');

    Route::post('/admin/store-struktur', [AdminDashboardController::class, 'storeStruktur'])->name('aparatur.store');
    Route::put('/admin/update-struktur/{id}', [AdminDashboardController::class, 'updateStruktur'])->name('admin.update-struktur');
    Route::delete('/admin/destroy-struktur/{id}', [AdminDashboardController::class, 'destroyStruktur'])->name('admin.destroy-struktur');

    Route::post('/admin/update-infografis', [AdminDashboardController::class, 'updateInfografis'])->name('infografis.store');
    Route::delete('/admin/destroy-statistik/{id}', [AdminDashboardController::class, 'destroyStatistik'])->name('admin.destroy-statistik');

    // Management Arsip Dokumen Internal
    Route::post('/arsip/store', [ArsipDokumenController::class, 'store'])->name('arsip.store');
    Route::get('/arsip/download/{id}', [ArsipDokumenController::class, 'download'])->name('arsip.download');
    Route::delete('/arsip/{id}', [ArsipDokumenController::class, 'destroy'])->name('arsip.destroy');

    // Rute Formulir Permohonan Pindah WNI (Kode F.1-29)
    Route::get('/surat/pindah/create', [SuratPindahController::class, 'create'])->name('surat.pindah.create');
    Route::post('/surat/pindah/store', [SuratPindahController::class, 'store'])->name('surat.pindah.store');
    Route::get('/surat/pindah/print/{id}', [SuratPindahController::class, 'print'])->name('surat.pindah.print');

    // Rute Formulir Permohonan Pindah WNI Antar Kecamatan (Kode: F.1-29)
    Route::get('/surat/f129/create', [SuratPindahF129Controller::class, 'create'])->name('surat.f129.create');
    Route::post('/surat/f129/store', [SuratPindahF129Controller::class, 'store'])->name('surat.f129.store');
    Route::get('/surat/f129/print/{id}', [SuratPindahF129Controller::class, 'print'])->name('surat.f129.print');

    // Rute Formulir Permohonan Pindah WNI Antar Desa/Kelurahan (Kode: F.1-25)
    Route::get('/surat/f125/create', [SuratPindahF125Controller::class, 'create'])->name('surat.f125.create');
    Route::post('/surat/f125/store', [SuratPindahF125Controller::class, 'store'])->name('surat.f125.store');
    Route::get('/surat/f125/print/{id}', [SuratPindahF125Controller::class, 'print'])->name('surat.f125.print');

    // Rute Formulir Permohonan Pindah WNI Antar Kabupaten/Kota atau Antar Provinsi (Kode: F.1-34)
    Route::get('/surat/f134/create', [SuratPindahF134Controller::class, 'create'])->name('surat.f134.create');
    Route::post('/surat/f134/store', [SuratPindahF134Controller::class, 'store'])->name('surat.f134.store');
    Route::get('/surat/f134/print/{id}', [SuratPindahF134Controller::class, 'print'])->name('surat.f134.print');

    // Rute Surat Keterangan Kelahiran (Kode: F-2.01)
    Route::get('/surat/f201/create', [SuratKelahiranF201Controller::class, 'create'])->name('surat.f201.create');
    Route::post('/surat/f201/store', [SuratKelahiranF201Controller::class, 'store'])->name('surat.f201.store');
    Route::get('/surat/f201/print/{id}', [SuratKelahiranF201Controller::class, 'print'])->name('surat.f201.print');

    // Rute Formulir Isian Biodata Penduduk WNI (Kode: F-1.01)
    Route::get('/surat/f101/create', [BiodataKeluargaF101Controller::class, 'create'])->name('surat.f101.create');
    Route::post('/surat/f101/store', [BiodataKeluargaF101Controller::class, 'store'])->name('surat.f101.store');
    Route::get('/surat/f101/print/{id}', [BiodataKeluargaF101Controller::class, 'print'])->name('surat.f101.print');
});

Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
