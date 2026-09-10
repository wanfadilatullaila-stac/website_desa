<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Formulir Biodata WNI F-1.01 - {{ $surat->nama_kepala_keluarga }}</title>
    <style>
        @page {
            size: 215mm 330mm portrait;
            margin: 4mm 6mm;
        }

        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            margin: 0;
            padding: 15px;
            color: #000;
        }

        .print-container {
            background-color: #fff;
            width: 285mm;
            min-height: 195mm;
            margin: 0 auto;
            padding: 8px 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            font-size: 8.5pt;
            line-height: 1.15;
            position: relative;
        }

        @media print {
            body {
                background-color: #fff;
                padding: 0;
                font-size: 8px !important;
                line-height: 1.1 !important;
            }
            .print-container {
                box-shadow: none;
                width: 100%;
                transform: scale(0.86);
                transform-origin: top center;
                margin: 0 !important;
                padding: 0 !important;
            }
            table td, table th {
                padding-top: 1px !important;
                padding-bottom: 1px !important;
                font-size: 8px !important;
            }
            .no-print {
                display: none !important;
            }
        }

        /* HEADER DOKUMEN */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2px;
        }
        .header-logo {
            width: 45px;
            height: auto;
            vertical-align: top;
        }
        .header-title {
            text-align: center;
            font-weight: bold;
        }
        .header-title h2 {
            margin: 0;
            font-size: 11pt;
            font-weight: 900;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .header-title h3 {
            margin: 2px 0 0 0;
            font-size: 10pt;
            font-weight: 800;
            text-transform: uppercase;
        }
        .header-code {
            text-align: right;
            vertical-align: top;
            width: 90px;
        }
        .code-box {
            border: 2px solid #000;
            font-weight: 900;
            font-size: 11pt;
            padding: 3px 8px;
            display: inline-block;
            text-align: center;
            background: #fff;
        }

        /* HEADER INFO BOX (DATAKEPALA KELUARGA & KODE WILAYAH) */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2px;
            font-size: 8pt;
        }
        .info-table td {
            vertical-align: top;
            padding: 1px 2px;
        }

        /* DIGIT BOX STYLING */
        .digit-box {
            display: inline-block;
            width: 13px;
            height: 15px;
            border: 1px solid #000;
            text-align: center;
            line-height: 14px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            font-size: 8pt;
            margin-right: 1px;
            background: #fff;
        }

        .text-dots {
            border-bottom: 1px dotted #000;
            display: inline-block;
            min-width: 150px;
            font-weight: bold;
            padding-left: 4px;
        }

        /* MATRIKS TABEL DISDUKCAPIL */
        .section-title {
            font-weight: bold;
            font-size: 8.5pt;
            margin-top: 2px;
            margin-bottom: 1px;
            text-transform: uppercase;
            background: #e5e7eb;
            padding: 2px 5px;
            border: 1px solid #000;
        }

        .matrix-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2px;
            font-size: 7.5pt;
            table-layout: fixed;
        }

        .matrix-table th, .matrix-table td {
            border: 1px solid #000;
            padding: 2px 2px;
            text-align: center;
            vertical-align: middle;
            word-wrap: break-word;
            overflow: hidden;
        }

        .matrix-table th {
            background-color: #f3f4f6;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 7pt;
        }

        .matrix-table td.text-left {
            text-align: left;
            padding-left: 4px;
        }

        .col-num {
            background-color: #e5e7eb;
            font-weight: bold;
            font-size: 6.5pt;
        }

        /* TANDA TANGAN */
        .ttd-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2px;
            font-size: 8pt;
            text-align: center;
        }

        .ttd-table td {
            vertical-align: top;
            padding: 2px;
        }

        .ttd-space {
            height: 25px;
        }

        .ttd-name {
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
        }

        /* FLOATING ACTION BUTTON */
        .floating-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #235832;
            color: #fff;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 13px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            cursor: pointer;
            border: none;
            display: flex;
            items-center: center;
            gap: 8px;
            z-index: 9999;
            transition: all 0.2s ease;
        }

        .floating-btn:hover {
            background-color: #1b4527;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="floating-btn no-print">
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
        </svg>
        <span>PRINT / CETAK FORM F-1.01</span>
    </button>

    <div class="print-container">

        <!-- HEADER DOKUMEN -->
        <table class="header-table">
            <tr>
                <td style="width: 50px; vertical-align: top;">
                    <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo" class="header-logo">
                </td>
                <td class="header-title">
                    <div style="font-size: 9pt; font-weight: bold;">PEMERINTAH KABUPATEN PELALAWAN</div>
                    <h2>FORMULIR ISIAN BIODATA PENDUDUK UNTUK WNI (PER KELUARGA)</h2>
                    <div style="font-size: 8pt; font-weight: bold; margin-top: 2px;">
                        Nomor Surat : {{ !empty($surat->nomor_surat) ? $surat->nomor_surat : 'No. ........................................................' }}
                    </div>
                </td>
                <td class="header-code">
                    <div class="code-box">F-1.01</div>
                </td>
            </tr>
        </table>

        <!-- KOTAK HEADER ATAS: DATA KEPALA KELUARGA & KODE WILAYAH -->
        <table class="info-table" style="border: 1px solid #000; padding: 4px;">
            <tr>
                <!-- KIRI: DATA KEPALA KELUARGA -->
                <td style="width: 55%; border-right: 1px solid #000; padding-right: 8px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 140px; font-weight: bold;">Nama Kepala Keluarga</td>
                            <td>: <span class="text-dots" style="min-width: 220px;">{{ strtoupper($surat->nama_kepala_keluarga) }}</span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Alamat Keluarga</td>
                            <td>: <span class="text-dots" style="min-width: 220px;">{{ strtoupper($surat->alamat_keluarga) }}</span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">RT / RW</td>
                            <td>: 
                                RT 
                                @foreach(str_split(str_pad($surat->rt ?? '001', 3, '0', STR_PAD_LEFT)) as $digit)
                                    <span class="digit-box">{{ $digit }}</span>
                                @endforeach
                                &nbsp; RW 
                                @foreach(str_split(str_pad($surat->rw ?? '001', 3, '0', STR_PAD_LEFT)) as $digit)
                                    <span class="digit-box">{{ $digit }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Kode Pos / Telepon</td>
                            <td>: 
                                Pos: 
                                @foreach(str_split(str_pad($surat->kode_pos ?? '28382', 5, '0', STR_PAD_LEFT)) as $digit)
                                    <span class="digit-box">{{ $digit }}</span>
                                @endforeach
                                &nbsp; Telp: <span style="font-weight: bold; font-family: monospace;">{{ $surat->telepon ?? '-' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Jumlah Anggota Keluarga</td>
                            <td>: <span style="font-weight: bold; font-size: 9pt;">{{ $surat->jumlah_anggota_keluarga ?? count($surat->anggota_keluarga ?? []) }}</span> Orang</td>
                        </tr>
                    </table>
                </td>

                <!-- KANAN: KODE & NAMA WILAYAH -->
                <td style="width: 45%; padding-left: 8px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 130px; font-weight: bold;">Kode / Nama Provinsi</td>
                            <td>: 
                                @foreach(str_split(str_pad($surat->kode_provinsi ?? '14', 2, '0', STR_PAD_LEFT)) as $digit)
                                    <span class="digit-box">{{ $digit }}</span>
                                @endforeach
                                &nbsp; <span style="font-weight: bold;">{{ strtoupper($surat->nama_provinsi ?? 'RIAU') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Kode / Nama Kabupaten</td>
                            <td>: 
                                @foreach(str_split(str_pad($surat->kode_kabupaten ?? '04', 2, '0', STR_PAD_LEFT)) as $digit)
                                    <span class="digit-box">{{ $digit }}</span>
                                @endforeach
                                &nbsp; <span style="font-weight: bold;">{{ strtoupper($surat->nama_kabupaten ?? 'PELALAWAN') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Kode / Nama Kecamatan</td>
                            <td>: 
                                @foreach(str_split(str_pad($surat->kode_kecamatan ?? '06', 2, '0', STR_PAD_LEFT)) as $digit)
                                    <span class="digit-box">{{ $digit }}</span>
                                @endforeach
                                &nbsp; <span style="font-weight: bold;">{{ strtoupper($surat->nama_kecamatan ?? 'BUNUT') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Kode / Nama Desa</td>
                            <td>: 
                                @foreach(str_split(str_pad($surat->kode_desa ?? '2005', 4, '0', STR_PAD_LEFT)) as $digit)
                                    <span class="digit-box">{{ $digit }}</span>
                                @endforeach
                                &nbsp; <span style="font-weight: bold;">{{ strtoupper($surat->nama_desa ?? 'LUBUK MANDIAN GAJAH') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Dusun / Kampung</td>
                            <td>: <span style="font-weight: bold;">{{ strtoupper($surat->dusun_dukuh_kampung ?? '-') }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        @php
            $members = $surat->anggota_keluarga ?? [];
            // Ensure exactly 10 rows for official Disdukcapil matrix format
            $totalRows = 10;
        @endphp

        <!-- MATRIKS TABEL DISDUKCAPIL (BAGIAN I) -->
        <div class="section-title">DATA KELUARGA (BAGIAN I)</div>
        <table class="matrix-table">
            <thead>
                <tr>
                    <th style="width: 4%;">No</th>
                    <th style="width: 30%;">Nama Lengkap</th>
                    <th style="width: 22%;">Nomor KTP / NIK</th>
                    <th style="width: 24%;">Alamat Sebelumnya</th>
                    <th style="width: 10%;">Nomor Paspor</th>
                    <th style="width: 10%;">Tgl Berakhir Paspor</th>
                </tr>
                <tr class="col-num">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < $totalRows; $i++)
                    @php $m = $members[$i] ?? null; @endphp
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="text-left font-bold">{{ $m['nama_lengkap'] ?? '' }}</td>
                        <td style="font-family: monospace; font-weight: bold;">{{ $m['nomor_ktp_nik'] ?? '' }}</td>
                        <td class="text-left">{{ $m['alamat_sebelumnya'] ?? '' }}</td>
                        <td>{{ $m['nomor_paspor'] ?? '' }}</td>
                        <td>{{ $m['tgl_berakhir_paspor'] ?? '' }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <!-- MATRIKS TABEL DISDUKCAPIL (BAGIAN II) -->
        <div class="section-title">DATA KELUARGA (BAGIAN II)</div>
        <table class="matrix-table" style="font-size: 7pt;">
            <thead>
                <tr>
                    <th style="width: 3%;">No</th>
                    <th style="width: 7%;">JK</th>
                    <th style="width: 10%;">Tempat Lahir</th>
                    <th style="width: 8%;">Tgl Lahir</th>
                    <th style="width: 4%;">Umur</th>
                    <th style="width: 6%;">Akta Lhr</th>
                    <th style="width: 9%;">No Akta Lahir</th>
                    <th style="width: 6%;">Gol Drh</th>
                    <th style="width: 7%;">Agama</th>
                    <th style="width: 9%;">Status Kawin</th>
                    <th style="width: 6%;">Akta Kwn</th>
                    <th style="width: 9%;">No Akta Perkawinan</th>
                    <th style="width: 8%;">Tgl Kwn</th>
                    <th style="width: 8%;">No Akta Cerai</th>
                </tr>
                <tr class="col-num">
                    <td>1</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>20</td>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < $totalRows; $i++)
                    @php $m = $members[$i] ?? null; @endphp
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ isset($m['jenis_kelamin']) ? substr($m['jenis_kelamin'], 0, 1) : '' }}</td>
                        <td>{{ $m['tempat_lahir'] ?? '' }}</td>
                        <td>{{ $m['tgl_lahir'] ?? '' }}</td>
                        <td>{{ $m['umur'] ?? '' }}</td>
                        <td>{{ isset($m['akta_lahir']) ? substr($m['akta_lahir'], 0, 1) : '' }}</td>
                        <td style="font-size: 6.5pt;">{{ $m['no_akta_lahir'] ?? '' }}</td>
                        <td>{{ isset($m['gol_darah']) ? str_replace(['13. ', 'Tidak Tahu'], ['-','-'], $m['gol_darah']) : '' }}</td>
                        <td>{{ isset($m['agama']) ? str_replace(['1. ', '2. ', '3. ', '4. ', '5. ', '6. '], '', $m['agama']) : '' }}</td>
                        <td style="font-size: 6.5pt;">{{ isset($m['status_perkawinan']) ? str_replace(['1. ', '2. ', '3. ', '4. '], '', $m['status_perkawinan']) : '' }}</td>
                        <td>{{ isset($m['akta_perkawinan']) ? substr($m['akta_perkawinan'], 0, 1) : '' }}</td>
                        <td style="font-size: 6.5pt;">{{ $m['no_akta_perkawinan'] ?? '' }}</td>
                        <td>{{ $m['tgl_perkawinan'] ?? '' }}</td>
                        <td style="font-size: 6.5pt;">{{ $m['no_akta_cerai'] ?? '' }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <!-- MATRIKS TABEL DISDUKCAPIL (BAGIAN III) -->
        <div class="section-title">DATA KELUARGA (BAGIAN III)</div>
        <table class="matrix-table">
            <thead>
                <tr>
                    <th style="width: 3%;">No</th>
                    <th style="width: 10%;">SHDK</th>
                    <th style="width: 8%;">Kelainan Fisik</th>
                    <th style="width: 9%;">Penyandang Cacat</th>
                    <th style="width: 12%;">Pendidikan Terakhir</th>
                    <th style="width: 14%;">Pekerjaan</th>
                    <th style="width: 12%;">NIK Ibu</th>
                    <th style="width: 10%;">Nama Ibu</th>
                    <th style="width: 12%;">NIK Ayah</th>
                    <th style="width: 10%;">Nama Ayah</th>
                </tr>
                <tr class="col-num">
                    <td>1</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < $totalRows; $i++)
                    @php $m = $members[$i] ?? null; @endphp
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="text-left font-bold" style="font-size: 6.5pt;">{{ isset($m['shdk']) ? str_replace(['1. ', '2. ', '3. ', '4. ', '5. ', '6. ', '7. ', '8. ', '9. ', '10. ', '11. '], '', $m['shdk']) : '' }}</td>
                        <td>{{ isset($m['kelainan_fisik_mental']) ? substr($m['kelainan_fisik_mental'], 0, 1) : '' }}</td>
                        <td style="font-size: 6.5pt;">{{ isset($m['penyandang_cacat']) ? str_replace(['1. ', '2. ', '3. ', '4. ', '5. ', '6. ', '7. '], '', $m['penyandang_cacat']) : '' }}</td>
                        <td class="text-left" style="font-size: 6.5pt;">{{ isset($m['pendidikan_terakhir']) ? str_replace(['1. ', '2. ', '3. ', '4. ', '5. ', '6. ', '7. ', '8. ', '9. ', '10. '], '', $m['pendidikan_terakhir']) : '' }}</td>
                        <td class="text-left" style="font-size: 6.5pt;">{{ $m['pekerjaan'] ?? '' }}</td>
                        <td style="font-family: monospace;">{{ $m['nik_ibu'] ?? '' }}</td>
                        <td class="text-left" style="font-size: 6.5pt;">{{ $m['nama_lengkap_ibu'] ?? '' }}</td>
                        <td style="font-family: monospace;">{{ $m['nik_ayah'] ?? '' }}</td>
                        <td class="text-left" style="font-size: 6.5pt;">{{ $m['nama_lengkap_ayah'] ?? '' }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <!-- BAGIAN TANDA TANGAN -->
        <table class="ttd-table">
            <tr>
                <td style="width: 16%;">
                    <div>Ketua RT</div>
                    <div class="ttd-space"></div>
                    <div class="ttd-name">( {{ $surat->nama_ketua_rt ?? '.........................' }} )</div>
                </td>
                <td style="width: 16%;">
                    <div>Ketua RW</div>
                    <div class="ttd-space"></div>
                    <div class="ttd-name">( {{ $surat->nama_ketua_rw ?? '.........................' }} )</div>
                </td>
                <td style="width: 22%;">
                    <div>Petugas Registrasi Desa</div>
                    <div class="ttd-space"></div>
                    <div class="ttd-name">( {{ $surat->nama_petugas_registrasi ?? 'PETUGAS REGISTRASI' }} )</div>
                </td>
                <td style="width: 15%;">
                    <div>Mengetahui,<br>Camat Bunut</div>
                    <div class="ttd-space"></div>
                    <div class="ttd-name">( ......................... )</div>
                </td>
                <td style="width: 16%;">
                    <div>Mengetahui,<br>Kepala Desa</div>
                    <div class="ttd-space"></div>
                    <div class="ttd-name">MUSLICH, SE</div>
                </td>
                <td style="width: 15%;">
                    <div>Lubuk Mandian Gajah, {{ date('d M Y') }}<br>Kepala Keluarga</div>
                    <div class="ttd-space"></div>
                    <div class="ttd-name">{{ strtoupper($surat->nama_kepala_keluarga) }}</div>
                </td>
            </tr>
        </table>

    </div>

</body>
</html>
