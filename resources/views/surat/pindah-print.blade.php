<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pindah WNI F.1-29 - {{ $surat->nama_pemohon }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        @page {
            size: 215mm 330mm portrait;
            margin: 8mm 12mm;
        }

        .print-container {
            max-height: 285mm;
            overflow: hidden;
            page-break-after: avoid;
            page-break-inside: avoid;
            break-after: avoid;
            break-inside: avoid;
        }

        @media print {
            body {
                background-color: #ffffff !important;
                padding: 0 !important;
                color: black !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .no-print, .btn-print, button, .alert {
                display: none !important;
            }
            .print-container {
                max-width: 100% !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
                max-height: 285mm !important;
                overflow: hidden !important;
                page-break-after: avoid !important;
                page-break-inside: avoid !important;
                break-after: avoid !important;
                break-inside: avoid !important;
            }
            .page-break {
                page-break-before: always;
            }
            .print-border {
                border-color: #000 !important;
            }
        }

        /* Digit box styling for Disdukcapil forms */
        .digit-box {
            display: inline-flex;
            width: 15px;
            height: 18px;
            border: 1px solid #000;
            align-items: center;
            justify-content: center;
            font-family: monospace;
            font-weight: bold;
            font-size: 10px;
            margin-right: 1px;
            background-color: #fff;
        }

        .code-box {
            border: 2px solid #000;
            padding: 1px 8px;
            font-weight: 900;
            font-family: monospace;
            font-size: 13px;
        }
    </style>
</head>
<body class="text-slate-900 font-sans text-xs" style="background-color: #f3f4f6; min-height: 100vh; padding: 20px 0;">

    <!-- FLOATING ACTION BUTTON BAR (NO-PRINT) -->
    <div class="no-print fixed top-4 right-4 z-50 flex items-center space-x-3 bg-white/90 backdrop-blur-md p-3 rounded-2xl shadow-2xl border border-slate-300">
        <a href="{{ route('surat.pindah.create') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white font-bold rounded-xl text-xs flex items-center space-x-1.5 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
            </svg>
            <span>Input Form Baru</span>
        </a>
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold rounded-xl text-xs transition-all">
            Dashboard
        </a>
        <button onclick="window.print()" class="px-6 py-2.5 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold rounded-xl text-xs shadow-lg flex items-center space-x-2 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
            </svg>
            <span>PRINT / CETAK DOKUMEN (PDF)</span>
        </button>
    </div>

    <!-- DOCUMENT CONTAINER (A4 SIZE SIMULATION) -->
    <div class="print-container space-y-2 text-[9.5px] leading-tight" style="max-width: 215mm; width: 100%; margin: 0 auto; background: #ffffff; padding: 15mm; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); box-sizing: border-box;">
        
        <!-- HEADER KOP FORMULIR -->
        <div class="flex justify-between items-start border-b-2 border-black pb-2">
            <div>
                <table class="text-[11px] font-bold">
                    <tr>
                        <td class="w-28 uppercase">PROVINSI</td>
                        <td>: {{ $surat->prov_asal }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">KABUPATEN/KOTA</td>
                        <td>: {{ $surat->kab_asal }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">KECAMATAN</td>
                        <td>: {{ $surat->kec_asal }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">DESA/KELURAHAN</td>
                        <td>: {{ $surat->desa_asal }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">DUSUN/KAMPUNG</td>
                        <td>: {{ $surat->dusun_asal ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <div class="text-right">
                <div class="code-box inline-block mb-1">
                    F.1-29
                </div>
                <div class="text-[9px] font-bold text-slate-700">
                    Nomor Surat: {{ !empty($surat->nomor_surat) ? $surat->nomor_surat : '................................' }}
                </div>
            </div>
        </div>

        <!-- JUDUL FORMULIR -->
        <div class="text-center py-1">
            <h1 class="text-sm font-black tracking-wide uppercase underline">
                FORMULIR PERMOHONAN PINDAH WNI
            </h1>
            <p class="text-[10px] font-bold tracking-tight">
                Antar Kabupaten/Kota Dalam Satu Provinsi atau Antar Provinsi
            </p>
        </div>

        <!-- SEKSI 1: DATA DAERAH ASAL -->
        <div class="border border-black p-2 space-y-2">
            <div class="font-extrabold uppercase bg-slate-200 px-2 py-0.5 border-b border-black text-[10px] flex justify-between">
                <span>DATA DAERAH ASAL</span>
            </div>

            <table class="w-full text-[11px] leading-relaxed">
                <!-- 1. NO KK -->
                <tr>
                    <td class="w-44 font-semibold">1. Nomor Kartu Keluarga</td>
                    <td class="w-3">:</td>
                    <td>
                        <div class="flex items-center">
                            @php
                                $kkDigits = str_split(str_pad($surat->no_kk_asal, 16, ' '));
                            @endphp
                            @foreach($kkDigits as $digit)
                                <span class="digit-box">{{ trim($digit) }}</span>
                            @endforeach
                        </div>
                    </td>
                </tr>

                <!-- 2. NAMA KEPALA KELUARGA -->
                <tr>
                    <td class="font-semibold">2. Nama Kepala Keluarga</td>
                    <td>:</td>
                    <td class="font-bold uppercase">{{ $surat->nama_kepala_keluarga }}</td>
                </tr>

                <!-- 3. ALAMAT ASAL -->
                <!-- 3. ALAMAT ASAL -->
                <tr>
                    <td class="font-bold align-top py-0.5">3. Alamat Asal</td>
                    <td class="align-top py-0.5">:</td>
                    <td class="py-0.5">
                        <div class="space-y-1 w-full text-[9.5px]">
                            <!-- Baris 1: Teks Alamat + RT & RW -->
                            <div class="flex items-center justify-between w-full gap-2">
                                <div class="flex-1 font-bold uppercase truncate border-b border-black/40 pb-0.5">
                                    {{ $surat->alamat_asal ?? '-' }}
                                </div>
                                <div class="flex items-center space-x-3 shrink-0 font-bold">
                                    <span class="inline-flex items-center">
                                        <span class="mr-1">RT</span>
                                        @foreach(str_split(str_pad($surat->rt_asal ?? '', 3, ' ')) as $d)
                                            <span class="digit-box">{{ trim($d) }}</span>
                                        @endforeach
                                    </span>
                                    <span class="inline-flex items-center">
                                        <span class="mr-1">RW</span>
                                        @foreach(str_split(str_pad($surat->rw_asal ?? '', 3, ' ')) as $d)
                                            <span class="digit-box">{{ trim($d) }}</span>
                                        @endforeach
                                    </span>
                                </div>
                            </div>

                            <!-- Baris 2 (Satu Baris Penuh): Dusun / Dukuh / Kampung -->
                            <div class="flex items-center w-full mt-0.5">
                                <span class="w-36 font-bold shrink-0">Dusun / Dukuh / Kampung</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->dusun_asal ?? '-' }}
                                </div>
                            </div>

                            <!-- Baris 3 & 4 (TERBAGI 2 KOLOM KIRI & KANAN 50% - 50%) -->
                            <div class="grid grid-cols-2 gap-x-4 gap-y-1 w-full mt-0.5">
                                <!-- Kolom Kiri -->
                                <div class="space-y-1">
                                    <div class="flex items-center">
                                        <span class="w-28 font-bold shrink-0">a. Desa / Kelurahan</span>
                                        <span class="mr-1 font-bold">:</span>
                                        <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                            {{ $surat->desa_asal ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="w-28 font-bold shrink-0">b. Kecamatan</span>
                                        <span class="mr-1 font-bold">:</span>
                                        <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                            {{ $surat->kec_asal ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="space-y-1">
                                    <div class="flex items-center">
                                        <span class="w-24 font-bold shrink-0">c. Kab / Kota</span>
                                        <span class="mr-1 font-bold">:</span>
                                        <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                            {{ $surat->kab_asal ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="w-24 font-bold shrink-0">d. Provinsi</span>
                                        <span class="mr-1 font-bold">:</span>
                                        <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                            {{ $surat->prov_asal ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Baris 5: Kode Pos (Kiri) & Telepon (Kanan) -->
                            <div class="grid grid-cols-2 gap-x-4 w-full mt-0.5">
                                <div class="flex items-center font-bold">
                                    <span class="w-28 shrink-0">Kode Pos</span>
                                    <span class="mr-1">:</span>
                                    <div class="inline-flex items-center">
                                        @foreach(str_split(str_pad($surat->kodepos_asal ?? '', 5, ' ')) as $d)
                                            <span class="digit-box">{{ trim($d) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex items-center font-bold">
                                    <span class="w-24 shrink-0">Telepon</span>
                                    <span class="mr-1">:</span>
                                    <div class="flex-1 border border-black px-2 py-0.5 font-bold font-mono bg-white truncate">
                                        {{ $surat->telepon_asal ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- 4. NIK PEMOHON -->
                <tr>
                    <td class="font-semibold">4. NIK Pemohon</td>
                    <td>:</td>
                    <td>
                        <div class="flex items-center">
                            @php
                                $nikDigits = str_split(str_pad($surat->nik_pemohon, 16, ' '));
                            @endphp
                            @foreach($nikDigits as $digit)
                                <span class="digit-box">{{ trim($digit) }}</span>
                            @endforeach
                        </div>
                    </td>
                </tr>

                <!-- 5. NAMA PEMOHON -->
                <tr>
                    <td class="font-semibold">5. Nama Lengkap Pemohon</td>
                    <td>:</td>
                    <td class="font-bold uppercase text-slate-900">{{ $surat->nama_pemohon }}</td>
                </tr>
            </table>
        </div>

        <!-- SEKSI 2: DATA KEPINDAHAN -->
        <div class="border border-black p-2 space-y-2">
            <div class="font-extrabold uppercase bg-slate-200 px-2 py-0.5 border-b border-black text-[10px]">
                DATA KEPINDAHAN
            </div>

            <table class="w-full text-[11px] leading-relaxed">
                <!-- 1. ALASAN PINDAH -->
                <tr>
                    <td class="w-44 font-semibold">1. Alasan Pindah</td>
                    <td class="w-3">:</td>
                    <td>
                        <span class="font-bold bg-slate-100 border border-black px-2 py-0.5 inline-block">
                            {{ $surat->alasan_pindah }}
                        </span>
                    </td>
                </tr>

                <!-- 2. ALAMAT TUJUAN -->
                <tr>
                    <td class="font-bold align-top py-0.5">2. Alamat Tujuan Pindah</td>
                    <td class="align-top py-0.5">:</td>
                    <td class="py-0.5">
                        <div class="space-y-1 w-full text-[9.5px]">
                            <!-- Baris 1: Teks Alamat + RT & RW -->
                            <div class="flex items-center justify-between w-full gap-2">
                                <div class="flex-1 font-bold uppercase truncate border-b border-black/40 pb-0.5">
                                    {{ $surat->alamat_tujuan ?? '-' }}
                                </div>
                                <div class="flex items-center space-x-3 shrink-0 font-bold">
                                    <span class="inline-flex items-center">
                                        <span class="mr-1">RT</span>
                                        @foreach(str_split(str_pad($surat->rt_tujuan ?? '', 3, ' ')) as $d)
                                            <span class="digit-box">{{ trim($d) }}</span>
                                        @endforeach
                                    </span>
                                    <span class="inline-flex items-center">
                                        <span class="mr-1">RW</span>
                                        @foreach(str_split(str_pad($surat->rw_tujuan ?? '', 3, ' ')) as $d)
                                            <span class="digit-box">{{ trim($d) }}</span>
                                        @endforeach
                                    </span>
                                </div>
                            </div>

                            <!-- Baris 2 (Satu Baris Penuh): Dusun / Dukuh / Kampung -->
                            <div class="flex items-center w-full mt-0.5">
                                <span class="w-36 font-bold shrink-0">Dusun / Dukuh / Kampung</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->dusun_tujuan ?? '-' }}
                                </div>
                            </div>

                            <!-- Baris 3 & 4 (TERBAGI 2 KOLOM KIRI & KANAN 50% - 50%) -->
                            <div class="grid grid-cols-2 gap-x-4 gap-y-1 w-full mt-0.5">
                                <!-- Kolom Kiri -->
                                <div class="space-y-1">
                                    <div class="flex items-center">
                                        <span class="w-28 font-bold shrink-0">a. Desa / Kelurahan</span>
                                        <span class="mr-1 font-bold">:</span>
                                        <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                            {{ $surat->desa_tujuan ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="w-28 font-bold shrink-0">b. Kecamatan</span>
                                        <span class="mr-1 font-bold">:</span>
                                        <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                            {{ $surat->kec_tujuan ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="space-y-1">
                                    <div class="flex items-center">
                                        <span class="w-24 font-bold shrink-0">c. Kab / Kota</span>
                                        <span class="mr-1 font-bold">:</span>
                                        <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                            {{ $surat->kab_tujuan ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="w-24 font-bold shrink-0">d. Provinsi</span>
                                        <span class="mr-1 font-bold">:</span>
                                        <div class="flex-1 border border-black px-2 py-0.5 font-bold uppercase bg-white truncate">
                                            {{ $surat->prov_tujuan ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Baris 5: Kode Pos (Kiri) & Telepon (Kanan) -->
                            <div class="grid grid-cols-2 gap-x-4 w-full mt-0.5">
                                <div class="flex items-center font-bold">
                                    <span class="w-28 shrink-0">Kode Pos</span>
                                    <span class="mr-1">:</span>
                                    <div class="inline-flex items-center">
                                        @foreach(str_split(str_pad($surat->kodepos_tujuan ?? '', 5, ' ')) as $d)
                                            <span class="digit-box">{{ trim($d) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex items-center font-bold">
                                    <span class="w-24 shrink-0">Telepon</span>
                                    <span class="mr-1">:</span>
                                    <div class="flex-1 border border-black px-2 py-0.5 font-bold font-mono bg-white truncate">
                                        {{ $surat->telepon_tujuan ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- 3. JENIS KEPINDAHAN -->
                <tr>
                    <td class="font-semibold">3. Jenis Kepindahan</td>
                    <td>:</td>
                    <td class="font-bold">{{ $surat->jenis_kepindahan }}</td>
                </tr>

                <!-- 4. STATUS KK TDK PINDAH -->
                <tr>
                    <td class="font-semibold">4. Status KK Bagi Yang Tidak Pindah</td>
                    <td>:</td>
                    <td>{{ $surat->status_kk_tidak_pindah ?? '-' }}</td>
                </tr>

                <!-- 5. STATUS KK PINDAH -->
                <tr>
                    <td class="font-semibold">5. Status KK Bagi Yang Pindah</td>
                    <td>:</td>
                    <td class="font-bold">{{ $surat->status_kk_pindah }}</td>
                </tr>
            </table>
        </div>

        <!-- SEKSI 3: KELUARGA YANG PINDAH (TABEL DOKUMEN) -->
        <div class="border border-black p-2 space-y-2">
            <div class="font-extrabold uppercase bg-slate-200 px-2 py-0.5 border-b border-black text-[10px]">
                KELUARGA YANG PINDAH
            </div>

            <table class="w-full text-left border-collapse border border-black text-[10px]">
                <thead>
                    <tr class="bg-slate-100 text-center font-bold border-b border-black">
                        <th class="border border-black py-1 px-1.5 w-8">NO</th>
                        <th class="border border-black py-1 px-2 w-44">NIK (16 DIGIT)</th>
                        <th class="border border-black py-1 px-2">NAMA LENGKAP</th>
                        <th class="border border-black py-1 px-2 w-32">MASA BERLAKU KTP S/D</th>
                        <th class="border border-black py-1 px-2 w-36">SHDK</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $list = $surat->anggota_keluarga ?? [];
                        // Minimal tampilkan 5 baris kosong jika data sedikit
                        $totalRows = max(count($list), 5);
                    @endphp

                    @for($i = 0; $i < $totalRows; $i++)
                        @php
                            $row = $list[$i] ?? null;
                        @endphp
                        <tr class="border-b border-black">
                            <td class="border border-black py-1.5 px-1.5 text-center font-bold">{{ $i + 1 }}</td>
                            <td class="border border-black py-1.5 px-2 font-mono font-bold text-center">
                                {{ $row['nik'] ?? '' }}
                            </td>
                            <td class="border border-black py-1.5 px-2 uppercase font-semibold">
                                {{ $row['nama'] ?? '' }}
                            </td>
                            <td class="border border-black py-1.5 px-2 text-center">
                                {{ $row['masa_berlaku_ktp'] ?? '' }}
                            </td>
                            <td class="border border-black py-1.5 px-2 text-center uppercase">
                                {{ $row['shdk'] ?? '' }}
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <!-- TANDA TANGAN (FOOTER OFFICIAL DISDUKCAPIL) -->
        <div class="pt-2 grid grid-cols-2 gap-8 text-[9.5px] font-semibold text-center" style="break-inside: avoid; page-break-inside: avoid;">
            <div>
                <p>Mengetahui,</p>
                <p class="font-bold">Petugas Registrasi</p>
                <p class="text-[8.5px] text-slate-500 font-normal">Desa Lubuk Mandian Gajah</p>
                
                <div class="h-16 flex items-end justify-center">
                    <div class="flex flex-col items-center">
                        <span class="font-bold uppercase underline tracking-wide">
                            {{ $surat->nama_petugas ?? '( .................................................. )' }}
                        </span>
                        <span class="font-semibold tracking-wide mt-0.5">
                            NIP. {{ $surat->nip_petugas ?? '........................................' }}
                        </span>
                    </div>
                </div>
            </div>

            <div>
                <p>Lubuk Mandian Gajah, {{ $surat->created_at ? $surat->created_at->format('d F Y') : date('d F Y') }}</p>
                <p class="font-bold">Pemohon,</p>
                
                <div class="h-10 flex items-end justify-center">
                    <span class="font-extrabold uppercase underline tracking-wide">
                        ( {{ $surat->nama_pemohon }} )
                    </span>
                </div>
            </div>
        </div>

        <!-- CATATAN DOKUMEN -->
        <div class="text-[8.5px] text-slate-600 border-t border-slate-300 pt-1 font-medium" style="break-inside: avoid; page-break-inside: avoid;">
            <p><strong>Catatan:</strong> Dokumen ini dicetak dari Sistem Informasi Desa Lubuk Mandian Gajah sebagai Surat Permohonan Pindah Resmi WNI (F.1-29) untuk diteruskan ke Dinas Kependudukan dan Pencatatan Sipil.</p>
        </div>

    </div>

</body>
</html>
