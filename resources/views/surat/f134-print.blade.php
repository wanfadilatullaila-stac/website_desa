<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pindah WNI F.1-34 - {{ $surat->nama_pemohon }}</title>
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
            .print-border {
                border-color: #000 !important;
            }
        }

        /* Digit box character cell for Disdukcapil official forms */
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
            color: #000;
        }

        .code-box {
            border: 2px solid #000;
            padding: 1px 8px;
            font-weight: 900;
            font-family: monospace;
            font-size: 13px;
            background: #fff;
        }

        .check-box {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 1.5px solid #000;
            text-align: center;
            line-height: 12px;
            font-weight: bold;
            font-size: 10px;
            margin-right: 3px;
        }
    </style>
</head>
<body class="text-slate-900 font-sans text-xs" style="background-color: #f3f4f6; min-height: 100vh; padding: 20px 0;">

    <!-- FLOATING ACTION BUTTON BAR (NO-PRINT) PRESISI FIGMA -->
    <div class="no-print fixed top-4 right-4 z-50 flex items-center space-x-3 bg-white/90 backdrop-blur-md p-3 rounded-2xl shadow-2xl border border-slate-300">
        <a href="{{ route('surat.f134.create') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white font-bold rounded-xl text-xs flex items-center space-x-1.5 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Input Form Baru</span>
        </a>
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold rounded-xl text-xs transition-all">
            Dashboard
        </a>
        <button onclick="window.print()" class="px-6 py-2.5 bg-[#0284c7] hover:bg-[#0369a1] text-white font-black rounded-xl text-xs shadow-lg flex items-center space-x-2 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
            </svg>
            <span>PRINT / CETAK DOKUMEN</span>
        </button>
    </div>

    <!-- DOCUMENT CONTAINER A4 SIZE SIMULATION -->
    <div class="print-container space-y-1.5 text-[9.5px] leading-tight" style="max-width: 215mm; width: 100%; margin: 0 auto; background: #ffffff; padding: 15mm; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); box-sizing: border-box;">
        
        <!-- HEADER KOP DISDUKCAPIL & WILAYAH -->
        <div class="flex justify-between items-start border-b-2 border-black pb-2">
            <div class="space-y-0.5">
                <table class="text-[10px] font-bold">
                    <tr>
                        <td class="w-36 uppercase">PROVINSI</td>
                        <td class="w-2">:</td>
                        <td class="uppercase">{{ $surat->prov_pembuat }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">KABUPATEN/KOTA</td>
                        <td>:</td>
                        <td class="uppercase">{{ $surat->kab_pembuat }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">KECAMATAN</td>
                        <td>:</td>
                        <td class="uppercase">{{ $surat->kec_pembuat }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">DESA/KELURAHAN</td>
                        <td>:</td>
                        <td class="uppercase">{{ $surat->desa_pembuat }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">DUSUN/DUKUH/KAMPUNG</td>
                        <td>:</td>
                        <td class="uppercase">{{ $surat->dusun_pembuat ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <div class="text-right">
                <div class="code-box inline-block">
                    F.1-34
                </div>
            </div>
        </div>

        <!-- JUDUL FORMULIR DISDUKCAPIL PRESISI FIGMA (F.1-34) -->
        <div class="text-center py-0.5">
            <h1 class="text-xs sm:text-sm font-black tracking-wider uppercase">
                FORMULIR PERMOHONAN PINDAH WNI
            </h1>
            <p class="text-[11px] font-extrabold tracking-tight">
                Antar Kabupaten/Kota atau Antar Provinsi
            </p>
            <p class="text-[10px] font-bold tracking-tight text-slate-800">
                No. {{ !empty($surat->nomor_surat) ? $surat->nomor_surat : '........................................................' }}
            </p>
        </div>

        <!-- SEKSI 1: DATA DAERAH ASAL -->
        <div class="border border-black p-2 space-y-1.5">
            <div class="font-extrabold uppercase bg-slate-100 px-2 py-0.5 border-b border-black text-[10px]">
                DATA DAERAH ASAL
            </div>

            <table class="w-full text-[10px] leading-snug">
                <!-- 1. NO KK ASAL -->
                <tr>
                    <td class="w-40 font-bold">1. Nomor Kartu Keluarga</td>
                    <td class="w-2">:</td>
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
                    <td class="font-bold">2. Nama Kepala Keluarga</td>
                    <td>:</td>
                    <td class="font-extrabold uppercase">{{ $surat->nama_kepala_keluarga }}</td>
                </tr>

                <!-- 3. ALAMAT ASAL -->
                <tr>
                    <td class="font-bold align-top py-0.5">3. Alamat</td>
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
                    <td class="font-bold">4. NIK Pemohon</td>
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

                <!-- 5. NAMA LENGKAP PEMOHON -->
                <tr>
                    <td class="font-bold">5. Nama Lengkap</td>
                    <td>:</td>
                    <td class="font-extrabold uppercase">{{ $surat->nama_pemohon }}</td>
                </tr>
            </table>
        </div>

        <!-- SEKSI 2: DATA KEPINDAHAN -->
        <div class="border border-black p-2 space-y-1.5">
            <div class="font-extrabold uppercase bg-slate-100 px-2 py-0.5 border-b border-black text-[10px]">
                DATA KEPINDAHAN
            </div>

            <table class="w-full text-[10px] leading-snug">
                <!-- 1. ALASAN PINDAH -->
                <tr>
                    <td class="w-40 font-bold align-top">1. Alasan Pindah</td>
                    <td class="w-2 align-top">:</td>
                    <td>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-1 text-[9.5px]">
                            <span><span class="check-box">{{ str_contains($surat->alasan_pindah, '1') ? '✓' : '' }}</span> 1. Pekerjaan</span>
                            <span><span class="check-box">{{ str_contains($surat->alasan_pindah, '3') ? '✓' : '' }}</span> 3. Keamanan</span>
                            <span><span class="check-box">{{ str_contains($surat->alasan_pindah, '5') ? '✓' : '' }}</span> 5. Perumahan</span>
                            <span><span class="check-box">{{ str_contains($surat->alasan_pindah, '7') ? '✓' : '' }}</span> 7. Lainnya</span>
                            <span><span class="check-box">{{ str_contains($surat->alasan_pindah, '2') ? '✓' : '' }}</span> 2. Pendidikan</span>
                            <span><span class="check-box">{{ str_contains($surat->alasan_pindah, '4') ? '✓' : '' }}</span> 4. Kesehatan</span>
                            <span><span class="check-box">{{ str_contains($surat->alasan_pindah, '6') ? '✓' : '' }}</span> 6. Keluarga</span>
                        </div>
                        @if($surat->alasan_pindah_lainnya)
                            <div class="text-[9px] font-bold italic mt-0.5">Sebutkan: {{ $surat->alasan_pindah_lainnya }}</div>
                        @endif
                    </td>
                </tr>

                <!-- 2. ALAMAT TUJUAN PINDAH -->
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
                    <td class="font-bold align-top">3. Jenis Kepindahan</td>
                    <td class="align-top">:</td>
                    <td>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 text-[9.5px]">
                            <span><span class="check-box">{{ str_contains($surat->jenis_kepindahan, '1.') ? '✓' : '' }}</span> 1. Kep. Keluarga</span>
                            <span><span class="check-box">{{ str_contains($surat->jenis_kepindahan, '3.') ? '✓' : '' }}</span> 3. Kep. Keluarga dan Sbg. Angg. Keluarga</span>
                            <span><span class="check-box">{{ str_contains($surat->jenis_kepindahan, '2.') ? '✓' : '' }}</span> 2. Kep. Keluarga dan Seluruh Angg. Keluarga</span>
                            <span><span class="check-box">{{ str_contains($surat->jenis_kepindahan, '4.') ? '✓' : '' }}</span> 4. Angg. Keluarga</span>
                        </div>
                    </td>
                </tr>

                <!-- 4. STATUS KK BAGI YANG TIDAK PINDAH -->
                <tr>
                    <td class="font-bold align-top">4. Status KK Bagi Yang Tidak Pindah</td>
                    <td class="align-top">:</td>
                    <td>
                        <div class="flex space-x-4 text-[9.5px]">
                            <span><span class="check-box">{{ str_contains($surat->status_kk_tidak_pindah ?? '', '1.') ? '✓' : '' }}</span> 1. Numpang KK</span>
                            <span><span class="check-box">{{ str_contains($surat->status_kk_tidak_pindah ?? '', '2.') ? '✓' : '' }}</span> 2. Membuat KK Baru</span>
                            <span><span class="check-box">{{ str_contains($surat->status_kk_tidak_pindah ?? '', '3.') ? '✓' : '' }}</span> 3. Nomor KK Tetap</span>
                        </div>
                    </td>
                </tr>

                <!-- 5. STATUS KK BAGI YANG PINDAH -->
                <tr>
                    <td class="font-bold align-top">5. Status KK Bagi Yang Pindah</td>
                    <td class="align-top">:</td>
                    <td>
                        <div class="flex space-x-4 text-[9.5px]">
                            <span><span class="check-box">{{ str_contains($surat->status_kk_pindah, '1.') ? '✓' : '' }}</span> 1. Numpang KK</span>
                            <span><span class="check-box">{{ str_contains($surat->status_kk_pindah, '2.') ? '✓' : '' }}</span> 2. Membuat KK Baru</span>
                            <span><span class="check-box">{{ str_contains($surat->status_kk_pindah, '3.') ? '✓' : '' }}</span> 3. Nomor KK Tetap</span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- SEKSI 3: KELUARGA YANG PINDAH (TABEL PETAK CHARACTER DISDUKCAPIL) -->
        <div class="border border-black p-2 space-y-1">
            <div class="font-extrabold uppercase bg-slate-100 px-2 py-0.5 border-b border-black text-[10px]">
                6. KELUARGA YANG PINDAH
            </div>

            <table class="w-full text-left border-collapse border border-black text-[9.5px]">
                <thead>
                    <tr class="bg-slate-100 text-center font-black border-b border-black">
                        <th class="border border-black py-1 px-1 w-7">NO.</th>
                        <th class="border border-black py-1 px-1">NIK (16 KOTAK PETAK)</th>
                        <th class="border border-black py-1 px-1 w-44">NAMA</th>
                        <th class="border border-black py-1 px-1 w-24">MASA BERLAKU KTP S/D</th>
                        <th class="border border-black py-1 px-1 w-20">SHDK</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $list = $surat->anggota_keluarga ?? [];
                        $totalRows = max(count($list), 5);
                    @endphp

                    @for($i = 0; $i < $totalRows; $i++)
                        @php
                            $row = $list[$i] ?? null;
                            $nikRaw = $row['nik'] ?? '';
                            $nikChars = str_split(str_pad($nikRaw, 16, ' '));
                        @endphp
                        <tr class="border-b border-black">
                            <td class="border border-black py-1 px-1 text-center font-bold">{{ $i + 1 }}</td>
                            <td class="border border-black py-1 px-1 text-center">
                                <div class="flex items-center justify-center">
                                    @foreach($nikChars as $digit)
                                        <span class="digit-box">{{ trim($digit) }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="border border-black py-1 px-1 uppercase font-bold text-[9px]">
                                {{ $row['nama'] ?? '' }}
                            </td>
                            <td class="border border-black py-1 px-1 text-center font-semibold text-[9px]">
                                {{ $row['masa_berlaku_ktp'] ?? '' }}
                            </td>
                            <td class="border border-black py-1 px-1 text-center uppercase font-bold text-[9px]">
                                {{ $row['shdk'] ?? '' }}
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <!-- AREA TANDA TANGAN DISDUKCAPIL PRESISI FIGMA -->
        <div class="pt-2 grid grid-cols-2 gap-8 text-[9.5px] font-bold text-center" style="break-inside: avoid; page-break-inside: avoid;">
            <div>
                <p>&nbsp;</p>
                <p class="font-black">Petugas Registrasi</p>
                
                <div class="h-16 flex items-end justify-center">
                    <div class="flex flex-col items-center">
                        <span class="font-extrabold uppercase tracking-wide underline">
                            {{ $surat->nama_petugas ?? '( .................................................. )' }}
                        </span>
                        <span class="font-bold tracking-wide mt-0.5">
                            NIP. {{ $surat->nip_petugas ?? '........................................' }}
                        </span>
                    </div>
                </div>
            </div>

            <div>
                <p>Lubuk Mandian Gajah, {{ $surat->created_at ? $surat->created_at->format('d F Y') : date('d F Y') }}</p>
                <p class="font-black">Pemohon</p>
                
                <div class="h-10 flex items-end justify-center">
                    <span class="font-black uppercase underline tracking-wide">
                        ( {{ $surat->nama_pemohon }} )
                    </span>
                </div>
            </div>
        </div>

        <!-- FOOTNOTE KETERANGAN PETUGAS & CATATAN BLANGKO RESMI -->
        <div class="text-[8.5px] text-slate-800 pt-1 border-t border-slate-300 font-bold space-y-0.5" style="break-inside: avoid; page-break-inside: avoid;">
            <p>Keterangan:</p>
            <p>*) Diisi Oleh Petugas</p>
            <p>- Formulir ini diisi di Desa/Kelurahan</p>
            <p>- Lembar 1: dibawa oleh pemohon dan diarsipkan di Kecamatan</p>
            <p>- Lembar 2: untuk pemohon</p>
            <p>- Lembar 3: diarsipkan di Desa/Kelurahan</p>
        </div>

    </div>

    <!-- TOMBOL BIRU BESAR "PRINT" DI BAGIAN BAWAH DOKUMEN (NO-PRINT) PRESISI FIGMA -->
    <div class="no-print max-w-[215mm] w-full mx-auto mt-6 mb-10 flex flex-col items-center space-y-4 px-4 sm:px-0">
        @if(session('success'))
            <div class="w-full bg-emerald-600 text-white font-extrabold px-6 py-3.5 rounded-2xl shadow-lg text-center text-sm flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <button onclick="window.print()" class="w-full sm:w-80 py-3.5 bg-[#0284c7] hover:bg-[#0369a1] text-white font-black text-sm tracking-widest uppercase rounded-2xl shadow-xl hover:shadow-2xl transition-all flex items-center justify-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
            </svg>
            <span>PRINT</span>
        </button>
    </div>

</body>
</html>
