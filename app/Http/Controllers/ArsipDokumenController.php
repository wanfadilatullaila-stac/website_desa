<?php

namespace App\Http\Controllers;

use App\Models\ArsipDokumen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ArsipDokumenController extends Controller
{
    /**
     * Store a newly created arsip dokumen in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'kategori' => 'required|string',
            'file' => 'required|file|mimes:pdf,docx,doc,xlsx,xls|max:10240',
        ]);

        $file = $request->file('file');
        $path = $file->store('arsip_internal', 'public');
        $tipeFile = strtolower($file->getClientOriginalExtension());
        $ukuranFile = $this->formatSizeUnits($file->getSize());

        ArsipDokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'kategori' => $request->kategori,
            'file_path' => $path,
            'tipe_file' => $tipeFile,
            'ukuran_file' => $ukuranFile,
        ]);

        return redirect()->back()->with('success', 'Dokumen arsip berhasil diunggah!');
    }

    /**
     * Download the specified arsip dokumen.
     */
    public function download($id): StreamedResponse
    {
        $dokumen = ArsipDokumen::findOrFail($id);

        return Storage::disk('public')->download(
            $dokumen->file_path,
            $dokumen->nama_dokumen . '.' . $dokumen->tipe_file
        );
    }

    /**
     * Remove the specified arsip dokumen from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $dokumen = ArsipDokumen::findOrFail($id);

        if (Storage::disk('public')->exists($dokumen->file_path)) {
            Storage::disk('public')->delete($dokumen->file_path);
        }

        $dokumen->delete();

        return redirect()->back()->with('success', 'Dokumen arsip berhasil dihapus!');
    }

    /**
     * Format bytes to readable size units.
     */
    private function formatSizeUnits($bytes): string
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return $bytes . ' byte';
        } else {
            return '0 bytes';
        }
    }
}
