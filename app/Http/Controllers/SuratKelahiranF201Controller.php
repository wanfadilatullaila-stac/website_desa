<?php

namespace App\Http\Controllers;

use App\Models\SuratKelahiranF201;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratKelahiranF201Controller extends Controller
{
    /**
     * Generate default nomor surat F-2.01.
     */
    private function generateNomorSurat()
    {
        $romanMonths = [1=>'I', 2=>'II', 3=>'III', 4=>'IV', 5=>'V', 6=>'VI', 7=>'VII', 8=>'VIII', 9=>'IX', 10=>'X', 11=>'XI', 12=>'XII'];
        $monthRoman = $romanMonths[(int)date('n')];
        $count = SuratKelahiranF201::whereYear('created_at', date('Y'))->count() + 1;
        return sprintf("474/LMG-F201/%s/%03d/%d", $monthRoman, $count, date('Y'));
    }

    /**
     * Display form for creating Surat Keterangan Kelahiran (F-2.01).
     */
    public function create()
    {
        $nomorSuratDefault = $this->generateNomorSurat();
        return view('surat.f201-create', compact('nomorSuratDefault'));
    }

    /**
     * Store new Surat Keterangan Kelahiran F-2.01 data.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'nullable|string|max:255',

            // Header & Wilayah
            'pemerintah_desa' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kode_wilayah' => 'nullable|string|max:255',
            'nama_kepala_keluarga' => 'required|string|max:255',
            'no_kk' => 'required|string|max:16',

            // 1. DATA BAYI / ANAK
            'nama_anak' => 'required|string|max:255',
            'jenis_kelamin_anak' => 'required|string|max:255',
            'tempat_dilahirkan' => 'required|string|max:255',
            'tempat_kelahiran' => 'required|string|max:255',
            'hari_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pukul_lahir' => 'nullable|string|max:255',
            'jenis_kelahiran' => 'required|string|max:255',
            'kelahiran_ke' => 'nullable|integer',
            'penolong_kelahiran' => 'required|string|max:255',
            'berat_bayi' => 'nullable|string|max:255',
            'panjang_bayi' => 'nullable|string|max:255',

            // 2. DATA IBU
            'nik_ibu' => 'required|string|max:16',
            'nama_ibu' => 'required|string|max:255',
            'tgl_lahir_ibu' => 'nullable|date',
            'umur_ibu' => 'nullable|integer',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'alamat_ibu' => 'nullable|string',
            'desa_ibu' => 'nullable|string|max:255',
            'kec_ibu' => 'nullable|string|max:255',
            'kab_ibu' => 'nullable|string|max:255',
            'prov_ibu' => 'nullable|string|max:255',
            'kewarganegaraan_ibu' => 'nullable|string|max:255',
            'kebangsaan_ibu' => 'nullable|string|max:255',
            'tgl_pencatatan_perkawinan' => 'nullable|date',

            // 3. DATA AYAH
            'nik_ayah' => 'required|string|max:16',
            'nama_ayah' => 'required|string|max:255',
            'tgl_lahir_ayah' => 'nullable|date',
            'umur_ayah' => 'nullable|integer',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'alamat_ayah' => 'nullable|string',
            'desa_ayah' => 'nullable|string|max:255',
            'kec_ayah' => 'nullable|string|max:255',
            'kab_ayah' => 'nullable|string|max:255',
            'prov_ayah' => 'nullable|string|max:255',
            'kewarganegaraan_ayah' => 'nullable|string|max:255',
            'kebangsaan_ayah' => 'nullable|string|max:255',

            // 4. DATA PELAPOR
            'nik_pelapor' => 'required|string|max:16',
            'nama_pelapor' => 'required|string|max:255',
            'umur_pelapor' => 'nullable|integer',
            'jenis_kelamin_pelapor' => 'nullable|string|max:255',
            'pekerjaan_pelapor' => 'nullable|string|max:255',
            'alamat_pelapor' => 'nullable|string',
            'desa_pelapor' => 'nullable|string|max:255',
            'kec_pelapor' => 'nullable|string|max:255',
            'kab_pelapor' => 'nullable|string|max:255',
            'prov_pelapor' => 'nullable|string|max:255',

            // 5. DATA SAKSI I & SAKSI II
            'nik_saksi1' => 'nullable|string|max:16',
            'nama_saksi1' => 'nullable|string|max:255',
            'umur_saksi1' => 'nullable|integer',
            'pekerjaan_saksi1' => 'nullable|string|max:255',
            'alamat_saksi1' => 'nullable|string',
            'desa_saksi1' => 'nullable|string|max:255',
            'kec_saksi1' => 'nullable|string|max:255',
            'kab_saksi1' => 'nullable|string|max:255',
            'prov_saksi1' => 'nullable|string|max:255',

            'nik_saksi2' => 'nullable|string|max:16',
            'nama_saksi2' => 'nullable|string|max:255',
            'umur_saksi2' => 'nullable|integer',
            'pekerjaan_saksi2' => 'nullable|string|max:255',
            'alamat_saksi2' => 'nullable|string',
            'desa_saksi2' => 'nullable|string|max:255',
            'kec_saksi2' => 'nullable|string|max:255',
            'kab_saksi2' => 'nullable|string|max:255',
            'prov_saksi2' => 'nullable|string|max:255',
        ]);

        // Auto-generate or use manual Nomor Surat F-2.01
        $nomorSurat = $request->filled('nomor_surat') ? $request->nomor_surat : $this->generateNomorSurat();

        $suratData = array_merge($validated, [
            'nomor_surat' => $nomorSurat,
            'pemerintah_desa' => $validated['pemerintah_desa'] ?? 'Desa Lubuk Mandian Gajah',
            'kecamatan' => $validated['kecamatan'] ?? 'Bunut',
            'kabupaten' => $validated['kabupaten'] ?? 'Pelalawan',
            'kewarganegaraan_ibu' => $validated['kewarganegaraan_ibu'] ?? 'WNI',
            'kewarganegaraan_ayah' => $validated['kewarganegaraan_ayah'] ?? 'WNI',
            'user_id' => Auth::id(),
        ]);

        $surat = SuratKelahiranF201::create($suratData);

        return redirect()->route('surat.f201.print', $surat->id)
            ->with('success', 'Surat Keterangan Kelahiran F-2.01 berhasil disimpan dan siap dicetak.');
    }

    /**
     * Show printable document view for Surat Keterangan Kelahiran F-2.01.
     */
    public function print($id)
    {
        $surat = SuratKelahiranF201::findOrFail($id);
        return view('surat.f201-print', compact('surat'));
    }
}
