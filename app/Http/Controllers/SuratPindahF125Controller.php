<?php

namespace App\Http\Controllers;

use App\Models\SuratPindahF125;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratPindahF125Controller extends Controller
{
    /**
     * Generate default nomor surat F.1-25.
     */
    private function generateNomorSurat()
    {
        $romanMonths = [1=>'I', 2=>'II', 3=>'III', 4=>'IV', 5=>'V', 6=>'VI', 7=>'VII', 8=>'VIII', 9=>'IX', 10=>'X', 11=>'XI', 12=>'XII'];
        $monthRoman = $romanMonths[(int)date('n')];
        $count = SuratPindahF125::whereYear('created_at', date('Y'))->count() + 1;
        return sprintf("475/LMG-F125/%s/%03d/%d", $monthRoman, $count, date('Y'));
    }

    /**
     * Display form for creating Formulir Permohonan Pindah WNI Antar Desa/Kelurahan Dalam Satu Kecamatan (F.1-25).
     */
    public function create()
    {
        $nomorSuratDefault = $this->generateNomorSurat();
        return view('surat.f125-create', compact('nomorSuratDefault'));
    }

    /**
     * Store new permohonan pindah F.1-25 data.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'nullable|string|max:255',

            // Header Wilayah Pembuat
            'prov_pembuat' => 'nullable|string|max:255',
            'kab_pembuat' => 'nullable|string|max:255',
            'kec_pembuat' => 'nullable|string|max:255',
            'desa_pembuat' => 'nullable|string|max:255',
            'dusun_pembuat' => 'nullable|string|max:255',

            // Data Daerah Asal
            'no_kk_asal' => 'required|string|max:255',
            'nama_kepala_keluarga' => 'required|string|max:255',
            'alamat_asal' => 'nullable|string',
            'rt_asal' => 'nullable|string|max:10',
            'rw_asal' => 'nullable|string|max:10',
            'dusun_asal' => 'nullable|string|max:255',
            'desa_asal' => 'nullable|string|max:255',
            'kec_asal' => 'nullable|string|max:255',
            'kab_asal' => 'nullable|string|max:255',
            'prov_asal' => 'nullable|string|max:255',
            'kodepos_asal' => 'nullable|string|max:10',
            'telepon_asal' => 'nullable|string|max:30',
            'nik_pemohon' => 'required|string|max:255',
            'nama_pemohon' => 'required|string|max:255',

            // Data Kepindahan
            'alasan_pindah' => 'nullable|string|max:255',
            'alasan_pindah_lainnya' => 'nullable|string|max:255',
            'alamat_tujuan' => 'nullable|string',
            'rt_tujuan' => 'nullable|string|max:10',
            'rw_tujuan' => 'nullable|string|max:10',
            'dusun_tujuan' => 'nullable|string|max:255',
            'desa_tujuan' => 'nullable|string|max:255',
            'kec_tujuan' => 'nullable|string|max:255',
            'kab_tujuan' => 'nullable|string|max:255',
            'prov_tujuan' => 'nullable|string|max:255',
            'kodepos_tujuan' => 'nullable|string|max:10',
            'telepon_tujuan' => 'nullable|string|max:30',

            'jenis_kepindahan' => 'nullable|string|max:255',
            'status_kk_tidak_pindah' => 'nullable|string|max:255',
            'status_kk_pindah' => 'nullable|string|max:255',

            // Data Anggota Keluarga
            'anggota_keluarga' => 'nullable|array',
            'anggota_keluarga.*.nik' => 'nullable|string',
            'anggota_keluarga.*.nama' => 'nullable|string',
            'anggota_keluarga.*.masa_berlaku_ktp' => 'nullable|string',
            'anggota_keluarga.*.shdk' => 'nullable|string',
        ]);

        // Filter valid anggota keluarga
        $anggotaList = [];
        if (!empty($validated['anggota_keluarga'])) {
            foreach ($validated['anggota_keluarga'] as $member) {
                if (!empty($member['nama']) || !empty($member['nik'])) {
                    $anggotaList[] = [
                        'nik' => $member['nik'] ?? '',
                        'nama' => strtoupper($member['nama'] ?? ''),
                        'masa_berlaku_ktp' => strtoupper($member['masa_berlaku_ktp'] ?? 'SEUMUR HIDUP'),
                        'shdk' => strtoupper($member['shdk'] ?? 'ANGGOTA KELUARGA'),
                    ];
                }
            }
        }

        // Generate or use manual Nomor Surat F.1-25
        $nomorSurat = $request->filled('nomor_surat') ? $request->nomor_surat : $this->generateNomorSurat();

        $surat = SuratPindahF125::create([
            'nomor_surat' => $nomorSurat,
            'prov_pembuat' => strtoupper($validated['prov_pembuat'] ?? 'RIAU'),
            'kab_pembuat' => strtoupper($validated['kab_pembuat'] ?? 'PELALAWAN'),
            'kec_pembuat' => strtoupper($validated['kec_pembuat'] ?? 'BUNUT'),
            'desa_pembuat' => strtoupper($validated['desa_pembuat'] ?? 'LUBUK MANDIAN GAJAH'),
            'dusun_pembuat' => strtoupper($validated['dusun_pembuat'] ?? ''),

            'no_kk_asal' => $validated['no_kk_asal'],
            'nama_kepala_keluarga' => strtoupper($validated['nama_kepala_keluarga']),
            'alamat_asal' => strtoupper($validated['alamat_asal'] ?? ''),
            'rt_asal' => str_pad($validated['rt_asal'] ?? '', 3, '0', STR_PAD_LEFT),
            'rw_asal' => str_pad($validated['rw_asal'] ?? '', 3, '0', STR_PAD_LEFT),
            'dusun_asal' => strtoupper($validated['dusun_asal'] ?? ''),
            'desa_asal' => strtoupper($validated['desa_asal'] ?? 'LUBUK MANDIAN GAJAH'),
            'kec_asal' => strtoupper($validated['kec_asal'] ?? 'BUNUT'),
            'kab_asal' => strtoupper($validated['kab_asal'] ?? 'PELALAWAN'),
            'prov_asal' => strtoupper($validated['prov_asal'] ?? 'RIAU'),
            'kodepos_asal' => $validated['kodepos_asal'] ?? '28382',
            'telepon_asal' => $validated['telepon_asal'] ?? '',

            'nik_pemohon' => $validated['nik_pemohon'],
            'nama_pemohon' => strtoupper($validated['nama_pemohon']),

            'alasan_pindah' => $validated['alasan_pindah'] ?? '1. Pekerjaan',
            'alasan_pindah_lainnya' => strtoupper($validated['alasan_pindah_lainnya'] ?? ''),
            'alamat_tujuan' => strtoupper($validated['alamat_tujuan'] ?? ''),
            'rt_tujuan' => str_pad($validated['rt_tujuan'] ?? '', 3, '0', STR_PAD_LEFT),
            'rw_tujuan' => str_pad($validated['rw_tujuan'] ?? '', 3, '0', STR_PAD_LEFT),
            'dusun_tujuan' => strtoupper($validated['dusun_tujuan'] ?? ''),
            'desa_tujuan' => strtoupper($validated['desa_tujuan'] ?? ''),
            'kec_tujuan' => strtoupper($validated['kec_tujuan'] ?? 'BUNUT'),
            'kab_tujuan' => strtoupper($validated['kab_tujuan'] ?? 'PELALAWAN'),
            'prov_tujuan' => strtoupper($validated['prov_tujuan'] ?? 'RIAU'),
            'kodepos_tujuan' => $validated['kodepos_tujuan'] ?? '',
            'telepon_tujuan' => $validated['telepon_tujuan'] ?? '',

            'jenis_kepindahan' => $validated['jenis_kepindahan'] ?? '2. Kep. Keluarga dan Seluruh Angg. Keluarga',
            'status_kk_tidak_pindah' => $validated['status_kk_tidak_pindah'] ?? null,
            'status_kk_pindah' => $validated['status_kk_pindah'] ?? '2. Membuat KK Baru',

            'anggota_keluarga' => $anggotaList,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('surat.f125.print', $surat->id)
            ->with('success', 'Data berhasil disimpan! Dokumen siap dicetak.');
    }

    /**
     * Show printable document template for F.1-25.
     */
    public function print($id)
    {
        $surat = SuratPindahF125::findOrFail($id);
        return view('surat.f125-print', compact('surat'));
    }
}
