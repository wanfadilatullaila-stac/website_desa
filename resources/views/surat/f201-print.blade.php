<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kelahiran F-2.01 - {{ $surat->nama_anak }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        @page {
            size: A4 portrait;
            margin: 5mm 8mm;
        }

        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .print-container {
            width: 100%;
            max-width: 200mm;
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
        }

        @media print {
            body {
                background: white !important;
                color: black !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .print-container {
                max-width: 100% !important;
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
                border: none !important;
                box-shadow: none !important;
                page-break-after: avoid !important;
                page-break-inside: avoid !important;
                break-after: avoid !important;
                break-inside: avoid !important;
            }
        }

        /* Digit box character cell for Disdukcapil official forms */
        .digit-box {
            display: inline-flex;
            width: 13px;
            height: 16px;
            border: 1px solid #000;
            align-items: center;
            justify-content: center;
            font-family: monospace;
            font-weight: bold;
            font-size: 9.5px;
            margin-right: 1px;
            background-color: #fff;
            color: #000;
        }

        .code-box {
            border: 2px solid #000;
            padding: 2px 8px;
            font-weight: 900;
            font-family: monospace;
            font-size: 12px;
            background: #fff;
        }

        .check-box {
            display: inline-block;
            width: 13px;
            height: 13px;
            border: 1px solid #000;
            text-align: center;
            line-height: 11px;
            font-weight: bold;
            font-size: 9.5px;
            margin-right: 2px;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-900 font-sans text-[9.5px] leading-tight min-h-screen py-4 print:py-0">

    <!-- TOP ACTION BUTTON BAR (NO-PRINT) -->
    <div class="no-print max-w-[200mm] mx-auto mb-3 flex items-center justify-between bg-white p-2.5 rounded-xl shadow border border-slate-300">
        <div class="flex items-center space-x-2">
            <a href="{{ route('surat.f201.create') }}" class="px-3 py-1.5 bg-slate-700 hover:bg-slate-800 text-white font-bold rounded-lg text-xs flex items-center space-x-1.5 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Input Baru</span>
            </a>
            <a href="{{ route('dashboard') }}" class="px-3 py-1.5 bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold rounded-lg text-xs transition-all">
                Dashboard
            </a>
        </div>
        <button onclick="window.print()" class="px-5 py-1.5 bg-[#0284c7] hover:bg-[#0369a1] text-white font-black rounded-lg text-xs shadow flex items-center space-x-1.5 transition-all">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
            </svg>
            <span>PRINT / CETAK DOKUMEN</span>
        </button>
    </div>

    <!-- DOCUMENT CONTAINER A4 SIZE -->
    <div class="print-container bg-white p-3 sm:p-4 print:p-0 shadow-lg print:shadow-none border border-slate-300 print:border-none space-y-1">
        
        <!-- HEADER TOP & BOX KODE DOKUMEN -->
        <div class="flex justify-between items-start border-b border-black pb-1">
            <div class="space-y-0.5 text-[9px]">
                <table class="font-bold">
                    <tr>
                        <td class="w-32 uppercase">Pemerintah Desa/Kelurahan</td>
                        <td class="w-2">:</td>
                        <td class="uppercase">{{ $surat->pemerintah_desa }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">Kecamatan</td>
                        <td>:</td>
                        <td class="uppercase">{{ $surat->kecamatan }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase">Kabupaten/Kota</td>
                        <td>:</td>
                        <td class="uppercase">{{ $surat->kabupaten }}</td>
                    </tr>
                    <tr>
                        <td class="uppercase py-0.5">Kode Wilayah</td>
                        <td class="py-0.5">:</td>
                        <td class="py-0.5">
                            <div class="flex items-center">
                                @php
                                    $kwDigits = str_split(str_pad(preg_replace('/\D/', '', $surat->kode_wilayah ?? ''), 10, ' '));
                                @endphp
                                @foreach($kwDigits as $d)
                                    <span class="digit-box">{{ trim($d) }}</span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="text-right space-y-0.5">
                <div class="code-box inline-block">
                    Kode . F-2.01
                </div>
                <div class="text-[8px] font-bold text-left border border-black p-1 leading-tight bg-white">
                    <p>Ket :</p>
                    <p>Lembar 1 : UPTD/Instansi Pelaksana</p>
                    <p>Lembar 2 : Untuk yang bersangkutan</p>
                    <p>Lembar 3 : Desa/Kelurahan</p>
                    <p>Lembar 4 : Kecamatan</p>
                </div>
            </div>
        </div>

        <!-- JUDUL SURAT KETERANGAN KELAHIRAN -->
        <div class="text-center py-0.5 border-b border-black">
            <h1 class="text-xs font-black tracking-widest uppercase">
                SURAT KETERANGAN KELAHIRAN
            </h1>
            <div class="flex items-center justify-center mt-0.5 space-x-1">
                <span class="font-bold text-[9px]">Nomor Surat :</span>
                <div class="flex items-center">
                    @php
                        $nomorSuratVal = !empty($surat->nomor_surat) ? $surat->nomor_surat : '............................';
                        $numChars = str_split(str_pad($nomorSuratVal, 28, ' '));
                    @endphp
                    @foreach($numChars as $char)
                        <span class="digit-box">{{ trim($char) }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- NAMA KEPALA KELUARGA & NO KK -->
        <div class="border border-black p-1 space-y-0.5">
            <table class="w-full text-[9px] font-bold">
                <tr>
                    <td class="w-32">Nama Kepala Keluarga</td>
                    <td class="w-2">:</td>
                    <td>
                        <div class="flex items-center flex-wrap">
                            @php
                                $kkNamaChars = str_split(str_pad(strtoupper($surat->nama_kepala_keluarga ?? ''), 30, ' '));
                            @endphp
                            @foreach($kkNamaChars as $ch)
                                <span class="digit-box">{{ trim($ch) }}</span>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr class="pt-0.5">
                    <td>Nomor Kartu Keluarga</td>
                    <td>:</td>
                    <td>
                        <div class="flex items-center">
                            @php
                                $kkDigits = str_split(str_pad($surat->no_kk, 16, ' '));
                            @endphp
                            @foreach($kkDigits as $d)
                                <span class="digit-box">{{ trim($d) }}</span>
                            @endforeach
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- 1. BAYI / ANAK -->
        <div class="border border-black p-1 space-y-0.5">
            <div class="font-extrabold uppercase bg-slate-100 px-1 py-0.5 border-b border-black text-[9px]">
                BAYI / ANAK
            </div>

            <table class="w-full text-[9px] leading-tight">
                <tr>
                    <td class="w-32 font-bold">1. Nama</td>
                    <td class="w-2">:</td>
                    <td class="font-extrabold uppercase">{{ $surat->nama_anak }}</td>
                </tr>
                <tr>
                    <td class="font-bold">2. Jenis Kelamin</td>
                    <td>:</td>
                    <td class="flex items-center space-x-3">
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelamin_anak, '1') ? '✓' : '' }}</span> 1. Laki-laki</span>
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelamin_anak, '2') ? '✓' : '' }}</span> 2. Perempuan</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">3. Tempat Dilahirkan</td>
                    <td>:</td>
                    <td class="flex items-center space-x-2 flex-wrap">
                        <span><span class="check-box">{{ str_contains($surat->tempat_dilahirkan, '1') ? '✓' : '' }}</span> 1. RS/RB</span>
                        <span><span class="check-box">{{ str_contains($surat->tempat_dilahirkan, '2') ? '✓' : '' }}</span> 2. Puskesmas</span>
                        <span><span class="check-box">{{ str_contains($surat->tempat_dilahirkan, '3') ? '✓' : '' }}</span> 3. Polindes</span>
                        <span><span class="check-box">{{ str_contains($surat->tempat_dilahirkan, '4') ? '✓' : '' }}</span> 4. Rumah</span>
                        <span><span class="check-box">{{ str_contains($surat->tempat_dilahirkan, '5') ? '✓' : '' }}</span> 5. Lainnya</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">4. Tempat Kelahiran</td>
                    <td>:</td>
                    <td class="font-bold uppercase">{{ $surat->tempat_kelahiran }}</td>
                </tr>
                <tr>
                    <td class="font-bold">5. Hari dan Tanggal Lahir</td>
                    <td>:</td>
                    <td>
                        <div class="flex items-center space-x-1.5 font-bold">
                            <span>Hari: <span class="uppercase font-extrabold">{{ $surat->hari_lahir }}</span></span>
                            <span>Tgl</span>
                            <div class="flex items-center">
                                @php
                                    $tglLahirObj = $surat->tanggal_lahir ? \Carbon\Carbon::parse($surat->tanggal_lahir) : null;
                                    $tglD = $tglLahirObj ? str_split(str_pad($tglLahirObj->format('d'), 2, '0', STR_PAD_LEFT)) : ['',''];
                                    $tglM = $tglLahirObj ? str_split(str_pad($tglLahirObj->format('m'), 2, '0', STR_PAD_LEFT)) : ['',''];
                                    $tglY = $tglLahirObj ? str_split(str_pad($tglLahirObj->format('Y'), 4, '0', STR_PAD_LEFT)) : ['','','',''];
                                @endphp
                                @foreach($tglD as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span>Bln</span>
                            <div class="flex items-center">
                                @foreach($tglM as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span>Thn</span>
                            <div class="flex items-center">
                                @foreach($tglY as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">6. Pukul</td>
                    <td>:</td>
                    <td class="font-mono font-bold">{{ $surat->pukul_lahir ?? '-' }} WIB</td>
                </tr>
                <tr>
                    <td class="font-bold">7. Jenis Kelahiran</td>
                    <td>:</td>
                    <td class="flex items-center space-x-2 flex-wrap">
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelahiran, '1') ? '✓' : '' }}</span> 1. Tunggal</span>
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelahiran, '2') ? '✓' : '' }}</span> 2. Kembar 2</span>
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelahiran, '3') ? '✓' : '' }}</span> 3. Kembar 3</span>
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelahiran, '4') ? '✓' : '' }}</span> 4. Kembar 4</span>
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelahiran, '5') ? '✓' : '' }}</span> 5. Lainnya</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">8. Kelahiran Ke</td>
                    <td>:</td>
                    <td class="font-mono font-bold">{{ $surat->kelahiran_ke ?? 1 }}</td>
                </tr>
                <tr>
                    <td class="font-bold">9. Penolong Kelahiran</td>
                    <td>:</td>
                    <td class="flex items-center space-x-2 flex-wrap">
                        <span><span class="check-box">{{ str_contains($surat->penolong_kelahiran, '1') ? '✓' : '' }}</span> 1. Dokter</span>
                        <span><span class="check-box">{{ str_contains($surat->penolong_kelahiran, '2') ? '✓' : '' }}</span> 2. Bidan/Perawat</span>
                        <span><span class="check-box">{{ str_contains($surat->penolong_kelahiran, '3') ? '✓' : '' }}</span> 3. Dukun</span>
                        <span><span class="check-box">{{ str_contains($surat->penolong_kelahiran, '4') ? '✓' : '' }}</span> 4. Lainnya</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">10. Berat & Panjang Bayi</td>
                    <td>:</td>
                    <td class="font-bold">Berat: {{ $surat->berat_bayi ?? '-' }} kg &nbsp;|&nbsp; Panjang: {{ $surat->panjang_bayi ?? '-' }} cm</td>
                </tr>
            </table>
        </div>

        <!-- 2. IBU -->
        <div class="border border-black p-1 space-y-0.5">
            <div class="font-extrabold uppercase bg-slate-100 px-1 py-0.5 border-b border-black text-[9px]">
                IBU
            </div>

            <table class="w-full text-[9px] leading-tight">
                <tr>
                    <td class="w-32 font-bold">1. NIK</td>
                    <td class="w-2">:</td>
                    <td>
                        <div class="flex items-center">
                            @foreach(str_split(str_pad($surat->nik_ibu, 16, ' ')) as $d)
                                <span class="digit-box">{{ trim($d) }}</span>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">2. Nama Lengkap</td>
                    <td>:</td>
                    <td class="font-extrabold uppercase">{{ $surat->nama_ibu }}</td>
                </tr>
                <tr>
                    <td class="font-bold">3. Tanggal Lahir/Umur</td>
                    <td>:</td>
                    <td>
                        <div class="flex items-center space-x-1.5 font-bold">
                            <span>Tgl</span>
                            <div class="flex items-center">
                                @php
                                    $tglIbuObj = $surat->tgl_lahir_ibu ? \Carbon\Carbon::parse($surat->tgl_lahir_ibu) : null;
                                    $ibuD = $tglIbuObj ? str_split(str_pad($tglIbuObj->format('d'), 2, '0', STR_PAD_LEFT)) : ['',''];
                                    $ibuM = $tglIbuObj ? str_split(str_pad($tglIbuObj->format('m'), 2, '0', STR_PAD_LEFT)) : ['',''];
                                    $ibuY = $tglIbuObj ? str_split(str_pad($tglIbuObj->format('Y'), 4, '0', STR_PAD_LEFT)) : ['','','',''];
                                @endphp
                                @foreach($ibuD as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span>Bln</span>
                            <div class="flex items-center">
                                @foreach($ibuM as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span>Thn</span>
                            <div class="flex items-center">
                                @foreach($ibuY as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span class="ml-2">Umur: <span class="font-mono font-bold">{{ $surat->umur_ibu ?? '-' }}</span> Thn</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">4. Pekerjaan</td>
                    <td>:</td>
                    <td class="font-bold uppercase">{{ $surat->pekerjaan_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-bold align-top py-0.5">5. Alamat</td>
                    <td class="align-top py-0.5">:</td>
                    <td class="py-0.5">
                        @if($surat->alamat_ibu)
                            <div class="font-bold uppercase mb-0.5">{{ $surat->alamat_ibu }}</div>
                        @endif
                        <div class="grid grid-cols-2 gap-x-2 gap-y-0.5 w-full">
                            <div class="flex items-center">
                                <span class="w-24 font-bold shrink-0">a. Desa/Kel.</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->desa_ibu ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 font-bold shrink-0">c. Kab/Kota</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->kab_ibu ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-24 font-bold shrink-0">b. Kecamatan</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->kec_ibu ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 font-bold shrink-0">d. Provinsi</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->prov_ibu ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">6. Kewarganegaraan</td>
                    <td>:</td>
                    <td class="flex items-center space-x-3">
                        <span><span class="check-box">{{ str_contains($surat->kewarganegaraan_ibu ?? 'WNI', '1') || str_contains($surat->kewarganegaraan_ibu ?? '', 'WNI') ? '✓' : '' }}</span> 1. WNI</span>
                        <span><span class="check-box">{{ str_contains($surat->kewarganegaraan_ibu ?? '', '2') || str_contains($surat->kewarganegaraan_ibu ?? '', 'WNA') ? '✓' : '' }}</span> 2. WNA</span>
                        <span class="ml-3">Kebangsaan: <strong class="uppercase">{{ $surat->kebangsaan_ibu ?? 'INDONESIA' }}</strong></span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">7. Tgl. Pencatatan Perkawinan</td>
                    <td>:</td>
                    <td>
                        <div class="flex items-center space-x-1.5 font-bold">
                            <span>Tgl</span>
                            <div class="flex items-center">
                                @php
                                    $tglKawinObj = $surat->tgl_pencatatan_perkawinan ? \Carbon\Carbon::parse($surat->tgl_pencatatan_perkawinan) : null;
                                    $kawinD = $tglKawinObj ? str_split(str_pad($tglKawinObj->format('d'), 2, '0', STR_PAD_LEFT)) : ['',''];
                                    $kawinM = $tglKawinObj ? str_split(str_pad($tglKawinObj->format('m'), 2, '0', STR_PAD_LEFT)) : ['',''];
                                    $kawinY = $tglKawinObj ? str_split(str_pad($tglKawinObj->format('Y'), 4, '0', STR_PAD_LEFT)) : ['','','',''];
                                @endphp
                                @foreach($kawinD as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span>Bln</span>
                            <div class="flex items-center">
                                @foreach($kawinM as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span>Thn</span>
                            <div class="flex items-center">
                                @foreach($kawinY as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- 3. AYAH -->
        <div class="border border-black p-1 space-y-0.5">
            <div class="font-extrabold uppercase bg-slate-100 px-1 py-0.5 border-b border-black text-[9px]">
                AYAH
            </div>

            <table class="w-full text-[9px] leading-tight">
                <tr>
                    <td class="w-32 font-bold">1. NIK</td>
                    <td class="w-2">:</td>
                    <td>
                        <div class="flex items-center">
                            @foreach(str_split(str_pad($surat->nik_ayah, 16, ' ')) as $d)
                                <span class="digit-box">{{ trim($d) }}</span>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">2. Nama Lengkap</td>
                    <td>:</td>
                    <td class="font-extrabold uppercase">{{ $surat->nama_ayah }}</td>
                </tr>
                <tr>
                    <td class="font-bold">3. Tanggal Lahir/Umur</td>
                    <td>:</td>
                    <td>
                        <div class="flex items-center space-x-1.5 font-bold">
                            <span>Tgl</span>
                            <div class="flex items-center">
                                @php
                                    $tglAyahObj = $surat->tgl_lahir_ayah ? \Carbon\Carbon::parse($surat->tgl_lahir_ayah) : null;
                                    $ayahD = $tglAyahObj ? str_split(str_pad($tglAyahObj->format('d'), 2, '0', STR_PAD_LEFT)) : ['',''];
                                    $ayahM = $tglAyahObj ? str_split(str_pad($tglAyahObj->format('m'), 2, '0', STR_PAD_LEFT)) : ['',''];
                                    $ayahY = $tglAyahObj ? str_split(str_pad($tglAyahObj->format('Y'), 4, '0', STR_PAD_LEFT)) : ['','','',''];
                                @endphp
                                @foreach($ayahD as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span>Bln</span>
                            <div class="flex items-center">
                                @foreach($ayahM as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span>Thn</span>
                            <div class="flex items-center">
                                @foreach($ayahY as $d)<span class="digit-box">{{ $d }}</span>@endforeach
                            </div>
                            <span class="ml-2">Umur: <span class="font-mono font-bold">{{ $surat->umur_ayah ?? '-' }}</span> Thn</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">4. Pekerjaan</td>
                    <td>:</td>
                    <td class="font-bold uppercase">{{ $surat->pekerjaan_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-bold align-top py-0.5">5. Alamat</td>
                    <td class="align-top py-0.5">:</td>
                    <td class="py-0.5">
                        @if($surat->alamat_ayah)
                            <div class="font-bold uppercase mb-0.5">{{ $surat->alamat_ayah }}</div>
                        @endif
                        <div class="grid grid-cols-2 gap-x-2 gap-y-0.5 w-full">
                            <div class="flex items-center">
                                <span class="w-24 font-bold shrink-0">a. Desa/Kel.</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->desa_ayah ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 font-bold shrink-0">c. Kab/Kota</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->kab_ayah ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-24 font-bold shrink-0">b. Kecamatan</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->kec_ayah ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 font-bold shrink-0">d. Provinsi</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->prov_ayah ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">6. Kewarganegaraan</td>
                    <td>:</td>
                    <td class="flex items-center space-x-3">
                        <span><span class="check-box">{{ str_contains($surat->kewarganegaraan_ayah ?? 'WNI', '1') || str_contains($surat->kewarganegaraan_ayah ?? '', 'WNI') ? '✓' : '' }}</span> 1. WNI</span>
                        <span><span class="check-box">{{ str_contains($surat->kewarganegaraan_ayah ?? '', '2') || str_contains($surat->kewarganegaraan_ayah ?? '', 'WNA') ? '✓' : '' }}</span> 2. WNA</span>
                        <span class="ml-3">Kebangsaan: <strong class="uppercase">{{ $surat->kebangsaan_ayah ?? 'INDONESIA' }}</strong></span>
                    </td>
                </tr>
            </table>
        </div>

        <!-- 4. PELAPOR -->
        <div class="border border-black p-1 space-y-0.5">
            <div class="font-extrabold uppercase bg-slate-100 px-1 py-0.5 border-b border-black text-[9px]">
                PELAPOR
            </div>

            <table class="w-full text-[9px] leading-tight">
                <tr>
                    <td class="w-32 font-bold">1. NIK</td>
                    <td class="w-2">:</td>
                    <td>
                        <div class="flex items-center">
                            @foreach(str_split(str_pad($surat->nik_pelapor, 16, ' ')) as $d)
                                <span class="digit-box">{{ trim($d) }}</span>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">2. Nama Lengkap</td>
                    <td>:</td>
                    <td class="font-extrabold uppercase">{{ $surat->nama_pelapor }}</td>
                </tr>
                <tr>
                    <td class="font-bold">3. Umur & Jenis Kelamin</td>
                    <td>:</td>
                    <td class="flex items-center space-x-4">
                        <span><strong class="font-mono">{{ $surat->umur_pelapor ?? '-' }}</strong> Tahun</span>
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelamin_pelapor ?? '', '1') || str_contains($surat->jenis_kelamin_pelapor ?? '', 'Laki') ? '✓' : '' }}</span> 1. Laki-laki</span>
                        <span><span class="check-box">{{ str_contains($surat->jenis_kelamin_pelapor ?? '', '2') || str_contains($surat->jenis_kelamin_pelapor ?? '', 'Perempuan') ? '✓' : '' }}</span> 2. Perempuan</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">4. Pekerjaan</td>
                    <td>:</td>
                    <td class="font-bold uppercase">{{ $surat->pekerjaan_pelapor ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-bold align-top py-0.5">5. Alamat</td>
                    <td class="align-top py-0.5">:</td>
                    <td class="py-0.5">
                        @if($surat->alamat_pelapor)
                            <div class="font-bold uppercase mb-0.5">{{ $surat->alamat_pelapor }}</div>
                        @endif
                        <div class="grid grid-cols-2 gap-x-2 gap-y-0.5 w-full">
                            <div class="flex items-center">
                                <span class="w-24 font-bold shrink-0">a. Desa/Kel.</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->desa_pelapor ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 font-bold shrink-0">c. Kab/Kota</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->kab_pelapor ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-24 font-bold shrink-0">b. Kecamatan</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->kec_pelapor ?? '-' }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 font-bold shrink-0">d. Provinsi</span>
                                <span class="mr-1 font-bold">:</span>
                                <div class="flex-1 border border-black px-1 py-0.5 font-bold uppercase bg-white truncate">
                                    {{ $surat->prov_pelapor ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- 5. SAKSI I & SAKSI II (DAMPINGAN DUA KOLOM AGAR HEMAT KERTAS) -->
        <div class="grid grid-cols-2 gap-1">
            <!-- SAKSI I -->
            <div class="border border-black p-1 space-y-0.5">
                <div class="font-extrabold uppercase bg-slate-100 px-1 py-0.5 border-b border-black text-[9px]">
                    SAKSI I
                </div>
                <table class="w-full text-[8.5px] leading-tight">
                    <tr>
                        <td class="w-20 font-bold">1. NIK</td>
                        <td class="w-1">:</td>
                        <td>
                            <div class="flex items-center flex-wrap">
                                @foreach(str_split(str_pad($surat->nik_saksi1 ?? '', 16, ' ')) as $d)
                                    <span class="digit-box" style="width:10.5px; height:14px; font-size:8.5px;">{{ trim($d) }}</span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold">2. Nama</td>
                        <td>:</td>
                        <td class="font-extrabold uppercase truncate">{{ $surat->nama_saksi1 ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">3. Umur</td>
                        <td>:</td>
                        <td><strong class="font-mono">{{ $surat->umur_saksi1 ?? '-' }}</strong> Thn</td>
                    </tr>
                    <tr>
                        <td class="font-bold">4. Pekerjaan</td>
                        <td>:</td>
                        <td class="font-bold uppercase truncate">{{ $surat->pekerjaan_saksi1 ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">5. Alamat</td>
                        <td>:</td>
                        <td class="font-bold uppercase truncate">{{ $surat->desa_saksi1 ?? ($surat->alamat_saksi1 ?? '-') }}</td>
                    </tr>
                </table>
            </div>

            <!-- SAKSI II -->
            <div class="border border-black p-1 space-y-0.5">
                <div class="font-extrabold uppercase bg-slate-100 px-1 py-0.5 border-b border-black text-[9px]">
                    SAKSI II
                </div>
                <table class="w-full text-[8.5px] leading-tight">
                    <tr>
                        <td class="w-20 font-bold">1. NIK</td>
                        <td class="w-1">:</td>
                        <td>
                            <div class="flex items-center flex-wrap">
                                @foreach(str_split(str_pad($surat->nik_saksi2 ?? '', 16, ' ')) as $d)
                                    <span class="digit-box" style="width:10.5px; height:14px; font-size:8.5px;">{{ trim($d) }}</span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold">2. Nama</td>
                        <td>:</td>
                        <td class="font-extrabold uppercase truncate">{{ $surat->nama_saksi2 ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">3. Umur</td>
                        <td>:</td>
                        <td><strong class="font-mono">{{ $surat->umur_saksi2 ?? '-' }}</strong> Thn</td>
                    </tr>
                    <tr>
                        <td class="font-bold">4. Pekerjaan</td>
                        <td>:</td>
                        <td class="font-bold uppercase truncate">{{ $surat->pekerjaan_saksi2 ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">5. Alamat</td>
                        <td>:</td>
                        <td class="font-bold uppercase truncate">{{ $surat->desa_saksi2 ?? ($surat->alamat_saksi2 ?? '-') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- AREA TANDA TANGAN DISDUKCAPIL -->
        <div class="pt-1 grid grid-cols-2 gap-6 text-[9px] font-bold text-center" style="break-inside: avoid; page-break-inside: avoid;">
            <div>
                <p>&nbsp;</p>
                <p class="font-black">Mengetahui :</p>
                <p class="font-black">Kepala Desa/Lurah</p>
                
                <div class="h-9 flex items-end justify-center">
                    <span class="font-extrabold uppercase underline tracking-wide">
                        ( MUSLICH, SE )
                    </span>
                </div>
            </div>

            <div>
                <p>Lubuk Mandian Gajah, {{ $surat->created_at ? $surat->created_at->translatedFormat('d F Y') : date('d F Y') }}</p>
                <p class="font-black">Pelapor</p>
                
                <div class="h-9 flex items-end justify-center">
                    <span class="font-black uppercase underline tracking-wide">
                        ( {{ $surat->nama_pelapor }} )
                    </span>
                </div>
            </div>
        </div>

    </div>

    <!-- TOMBOL CETAK BAWAH (NO-PRINT) -->
    <div class="no-print max-w-[200mm] mx-auto mt-3 mb-6 flex flex-col items-center space-y-2 px-4 sm:px-0">
        @if(session('success'))
            <div class="w-full bg-emerald-600 text-white font-extrabold px-4 py-2.5 rounded-xl shadow text-center text-xs flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <button onclick="window.print()" class="w-full sm:w-72 py-2.5 bg-[#0284c7] hover:bg-[#0369a1] text-white font-black text-xs tracking-widest uppercase rounded-xl shadow-lg transition-all flex items-center justify-center space-x-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
            </svg>
            <span>PRINT / CETAK DOKUMEN</span>
        </button>
    </div>

</body>
</html>