<?php

namespace App\Http\Controllers;

use App\Models\BiodataKeluargaF101;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataKeluargaF101Controller extends Controller
{
    /**
     * Generate default nomor surat F-1.01.
     */
    private function generateNomorSurat()
    {
        $romanMonths = [1=>'I', 2=>'II', 3=>'III', 4=>'IV', 5=>'V', 6=>'VI', 7=>'VII', 8=>'VIII', 9=>'IX', 10=>'X', 11=>'XI', 12=>'XII'];
        $monthRoman = $romanMonths[(int)date('n')];
        $count = BiodataKeluargaF101::whereYear('created_at', date('Y'))->count() + 1;
        return sprintf("470/LMG-F101/%s/%03d/%d", $monthRoman, $count, date('Y'));
    }

    /**
     * Display form for creating Formulir Isian Biodata Penduduk (F-1.01).
     */
    public function create()
    {
        $nomorSuratDefault = $this->generateNomorSurat();
        return view('surat.f101-create', compact('nomorSuratDefault'));
    }

    /**
     * Store new Biodata Keluarga F-1.01 data.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Header & Alamat Kepala Keluarga
            'nomor_blangko' => 'nullable|string|max:255',
            'nomor_surat' => 'nullable|string|max:255',
            'nama_kepala_keluarga' => 'required|string|max:255',
            'alamat_keluarga' => 'required|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'jumlah_anggota_keluarga' => 'nullable|integer',
            'kode_pos' => 'nullable|string|max:5',
            'telepon' => 'nullable|string|max:255',

            // Kode & Wilayah Pemerintahan
            'kode_provinsi' => 'nullable|string|max:255',
            'nama_provinsi' => 'nullable|string|max:255',
            'kode_kabupaten' => 'nullable|string|max:255',
            'nama_kabupaten' => 'nullable|string|max:255',
            'kode_kecamatan' => 'nullable|string|max:255',
            'nama_kecamatan' => 'nullable|string|max:255',
            'kode_desa' => 'nullable|string|max:255',
            'nama_desa' => 'nullable|string|max:255',
            'dusun_dukuh_kampung' => 'nullable|string|max:255',

            // Matriks Anggota Keluarga (JSON)
            'anggota_keluarga' => 'nullable|array',

            // Tanda Tangan & Pengesahan
            'nama_ketua_rt' => 'nullable|string|max:255',
            'nama_ketua_rw' => 'nullable|string|max:255',
            'nama_petugas_registrasi' => 'nullable|string|max:255',
        ]);

        // Process anggota_keluarga array formatting
        $rawAnggota = $request->input('anggota_keluarga', []);
        $formattedAnggota = [];

        if (is_array($rawAnggota)) {
            $i = 1;
            foreach ($rawAnggota as $item) {
                if (empty($item['nama_lengkap']) && empty($item['nomor_ktp_nik'])) {
                    continue; // skip empty rows
                }
                $formattedAnggota[] = [
                    'no' => $i++,
                    'nama_lengkap' => $item['nama_lengkap'] ?? '',
                    'nomor_ktp_nik' => $item['nomor_ktp_nik'] ?? '',
                    'alamat_sebelumnya' => $item['alamat_sebelumnya'] ?? '',
                    'nomor_paspor' => $item['nomor_paspor'] ?? '',
                    'tgl_berakhir_paspor' => $item['tgl_berakhir_paspor'] ?? '',
                    'jenis_kelamin' => $item['jenis_kelamin'] ?? '',
                    'tempat_lahir' => $item['tempat_lahir'] ?? '',
                    'tgl_lahir' => $item['tgl_lahir'] ?? '',
                    'umur' => $item['umur'] ?? '',
                    'akta_lahir' => $item['akta_lahir'] ?? '',
                    'no_akta_lahir' => $item['no_akta_lahir'] ?? '',
                    'gol_darah' => $item['gol_darah'] ?? '',
                    'agama' => $item['agama'] ?? '',
                    'status_perkawinan' => $item['status_perkawinan'] ?? '',
                    'akta_perkawinan' => $item['akta_perkawinan'] ?? '',
                    'no_akta_perkawinan' => $item['no_akta_perkawinan'] ?? '',
                    'tgl_perkawinan' => $item['tgl_perkawinan'] ?? '',
                    'akta_cerai' => $item['akta_cerai'] ?? '',
                    'no_akta_cerai' => $item['no_akta_cerai'] ?? '',
                    'tgl_perceraian' => $item['tgl_perceraian'] ?? '',
                    'shdk' => $item['shdk'] ?? '',
                    'kelainan_fisik_mental' => $item['kelainan_fisik_mental'] ?? '',
                    'penyandang_cacat' => $item['penyandang_cacat'] ?? '',
                    'pendidikan_terakhir' => $item['pendidikan_terakhir'] ?? '',
                    'pekerjaan' => $item['pekerjaan'] ?? '',
                    'nik_ibu' => $item['nik_ibu'] ?? '',
                    'nama_lengkap_ibu' => $item['nama_lengkap_ibu'] ?? '',
                    'nik_ayah' => $item['nik_ayah'] ?? '',
                    'nama_lengkap_ayah' => $item['nama_lengkap_ayah'] ?? '',
                ];
            }
        }

        $jumlahAnggota = count($formattedAnggota) > 0 ? count($formattedAnggota) : ($validated['jumlah_anggota_keluarga'] ?? 1);
        $nomorSurat = $request->filled('nomor_surat') ? $request->nomor_surat : $this->generateNomorSurat();

        $suratData = array_merge($validated, [
            'nomor_blangko' => $validated['nomor_blangko'] ?? 'F-1.01',
            'nomor_surat' => $nomorSurat,
            'kode_provinsi' => $validated['kode_provinsi'] ?? '14',
            'nama_provinsi' => $validated['nama_provinsi'] ?? 'RIAU',
            'kode_kabupaten' => $validated['kode_kabupaten'] ?? '04',
            'nama_kabupaten' => $validated['nama_kabupaten'] ?? 'PELALAWAN',
            'kode_kecamatan' => $validated['kode_kecamatan'] ?? '06',
            'nama_kecamatan' => $validated['nama_kecamatan'] ?? 'BUNUT',
            'kode_desa' => $validated['kode_desa'] ?? '2005',
            'nama_desa' => $validated['nama_desa'] ?? 'LUBUK MANDIAN GAJAH',
            'jumlah_anggota_keluarga' => $jumlahAnggota,
            'anggota_keluarga' => $formattedAnggota,
            'user_id' => Auth::id(),
        ]);

        $surat = BiodataKeluargaF101::create($suratData);

        return redirect()->route('surat.f101.print', $surat->id)
            ->with('success', 'Formulir Biodata Penduduk (F-1.01) berhasil disimpan dan siap dicetak.');
    }

    /**
     * Show printable document view for Formulir Biodata Penduduk F-1.01.
     */
    public function print($id)
    {
        $surat = BiodataKeluargaF101::findOrFail($id);
        return view('surat.f101-print', compact('surat'));
    }
}
