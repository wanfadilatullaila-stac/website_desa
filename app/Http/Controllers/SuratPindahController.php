<?php

namespace App\Http\Controllers;

use App\Models\SuratPindah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratPindahController extends Controller
{
    /**
     * Generate default nomor surat F.1-29 (Legacy/Generic).
     */
    private function generateNomorSurat()
    {
        $romanMonths = [1=>'I', 2=>'II', 3=>'III', 4=>'IV', 5=>'V', 6=>'VI', 7=>'VII', 8=>'VIII', 9=>'IX', 10=>'X', 11=>'XI', 12=>'XII'];
        $monthRoman = $romanMonths[(int)date('n')];
        $count = SuratPindah::whereYear('created_at', date('Y'))->count() + 1;
        return sprintf("475/LMG-F129/%s/%03d/%d", $monthRoman, $count, date('Y'));
    }

    /**
     * Display the form for creating a new Surat Pindah (F.1-29).
     */
    public function create()
    {
        $nomorSuratDefault = $this->generateNomorSurat();
        return view('surat.pindah-create', compact('nomorSuratDefault'));
    }

    /**
     * Store a newly created Surat Pindah in storage and redirect to print view.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'nullable|string|max:255',

            // Wilayah Asal
            'prov_asal' => 'required|string|max:255',
            'kab_asal' => 'required|string|max:255',
            'kec_asal' => 'required|string|max:255',
            'desa_asal' => 'required|string|max:255',
            'dusun_asal' => 'nullable|string|max:255',

            // Data Asal
            'no_kk_asal' => 'required|string|size:16',
            'nama_kepala_keluarga' => 'required|string|max:255',
            'alamat_asal' => 'nullable|string',
            'rt_asal' => 'nullable|string|max:10',
            'rw_asal' => 'nullable|string|max:10',
            'kodepos_asal' => 'nullable|string|max:10',
            'telepon_asal' => 'nullable|string|max:20',
            'nik_pemohon' => 'required|string|size:16',
            'nama_pemohon' => 'required|string|max:255',

            // Data Kepindahan
            'alasan_pindah' => 'required|string|max:255',
            'alamat_tujuan' => 'nullable|string',
            'rt_tujuan' => 'nullable|string|max:10',
            'rw_tujuan' => 'nullable|string|max:10',
            'dusun_tujuan' => 'nullable|string|max:255',
            'desa_tujuan' => 'nullable|string|max:255',
            'kec_tujuan' => 'nullable|string|max:255',
            'kab_tujuan' => 'nullable|string|max:255',
            'prov_tujuan' => 'nullable|string|max:255',
            'kodepos_tujuan' => 'nullable|string|max:10',
            'telepon_tujuan' => 'nullable|string|max:20',

            'jenis_kepindahan' => 'required|string|max:255',
            'status_kk_tidak_pindah' => 'nullable|string|max:255',
            'status_kk_pindah' => 'required|string|max:255',

            // Data Anggota Keluarga (Array)
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
                        'nama' => $member['nama'] ?? '',
                        'masa_berlaku_ktp' => $member['masa_berlaku_ktp'] ?? 'SEUMUR HIDUP',
                        'shdk' => $member['shdk'] ?? 'ANGGOTA KELUARGA',
                    ];
                }
            }
        }

        // Generate or use manual Nomor Surat F.1-29
        $nomorSurat = $request->filled('nomor_surat') ? $request->nomor_surat : $this->generateNomorSurat();

        $suratPindah = SuratPindah::create([
            'nomor_surat' => $nomorSurat,
            'prov_asal' => strtoupper($validated['prov_asal']),
            'kab_asal' => strtoupper($validated['kab_asal']),
            'kec_asal' => strtoupper($validated['kec_asal']),
            'desa_asal' => strtoupper($validated['desa_asal']),
            'dusun_asal' => strtoupper($validated['dusun_asal'] ?? ''),

            'no_kk_asal' => $validated['no_kk_asal'],
            'nama_kepala_keluarga' => strtoupper($validated['nama_kepala_keluarga']),
            'alamat_asal' => strtoupper($validated['alamat_asal'] ?? ''),
            'rt_asal' => $validated['rt_asal'] ?? '',
            'rw_asal' => $validated['rw_asal'] ?? '',
            'kodepos_asal' => $validated['kodepos_asal'] ?? '',
            'telepon_asal' => $validated['telepon_asal'] ?? '',
            'nik_pemohon' => $validated['nik_pemohon'],
            'nama_pemohon' => strtoupper($validated['nama_pemohon']),

            'alasan_pindah' => $validated['alasan_pindah'],
            'alamat_tujuan' => strtoupper($validated['alamat_tujuan'] ?? ''),
            'rt_tujuan' => $validated['rt_tujuan'] ?? '',
            'rw_tujuan' => $validated['rw_tujuan'] ?? '',
            'dusun_tujuan' => strtoupper($validated['dusun_tujuan'] ?? ''),
            'desa_tujuan' => strtoupper($validated['desa_tujuan'] ?? ''),
            'kec_tujuan' => strtoupper($validated['kec_tujuan'] ?? ''),
            'kab_tujuan' => strtoupper($validated['kab_tujuan'] ?? ''),
            'prov_tujuan' => strtoupper($validated['prov_tujuan'] ?? ''),
            'kodepos_tujuan' => $validated['kodepos_tujuan'] ?? '',
            'telepon_tujuan' => $validated['telepon_tujuan'] ?? '',

            'jenis_kepindahan' => $validated['jenis_kepindahan'],
            'status_kk_tidak_pindah' => $validated['status_kk_tidak_pindah'] ?? null,
            'status_kk_pindah' => $validated['status_kk_pindah'],

            'anggota_keluarga' => $anggotaList,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('surat.pindah.print', $suratPindah->id)
            ->with('success', 'Data berhasil disimpan! Dokumen siap dicetak.');
    }

    /**
     * Show the printable document template for Surat Pindah (F.1-29).
     */
    public function print($id)
    {
        $surat = SuratPindah::findOrFail($id);
        return view('surat.pindah-print', compact('surat'));
    }
}
