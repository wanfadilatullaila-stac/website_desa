<x-app-layout>
    <x-slot name="header">
        <div class="hidden"></div>
    </x-slot>

    <!-- HEADER RESMI DESA PRESISI FIGMA (HIJAU DESA #235832) -->
    <div class="bg-[#235832] text-white shadow-lg border-b-4 border-emerald-800">
        <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-3.5">
                <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Pelalawan" class="w-12 h-14 object-contain">
                <div>
                    <h1 class="font-extrabold text-lg sm:text-xl tracking-wide leading-tight">Desa Lubuk Mandian Gajah</h1>
                    <p class="text-xs sm:text-sm font-medium text-emerald-100/90 tracking-wider uppercase">Kabupaten Pelalawan</p>
                </div>
            </div>

            <a href="{{ route('dashboard') }}" class="inline-flex items-center space-x-1.5 text-xs font-bold bg-white/10 hover:bg-white/20 text-white px-3.5 py-2 rounded-xl border border-white/20 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Dashboard</span>
            </a>
        </div>
    </div>

    <div class="py-8 bg-slate-100 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-6">

            <!-- FORM CONTAINER PRESISI FIGMA F.1-34 -->
            <form action="{{ route('surat.f134.store') }}" method="POST" id="formF134" x-data="f134Form()" class="bg-white shadow-xl rounded-2xl border border-slate-200 overflow-hidden">
                @csrf

                <!-- SEKSI HEADER DOKUMEN: ISI DATA -->
                <div class="bg-slate-200/90 py-3.5 px-6 border-b border-slate-300 text-center">
                    <h2 class="text-lg font-black text-slate-800 tracking-wider uppercase">ISI DATA FORMULIR F.1-34</h2>
                </div>

                <div class="p-6 space-y-6">

                    @if ($errors->any())
                        <div class="p-4 mb-4 bg-red-100 border border-red-400 text-red-700 rounded-xl text-xs">
                            <p class="font-bold">Mohon lengkapi isian berikut:</p>
                            <ul class="list-disc pl-5 mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- NOMOR SURAT RESMI DESA -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">
                            Nomor Surat Resmi Desa <span class="text-slate-400 font-normal">(Bisa diedit manual sesuai buku register)</span>
                        </label>
                        <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $nomorSuratDefault ?? '') }}" 
                               class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm focus:border-emerald-500 focus:ring-emerald-500 font-mono font-bold text-slate-900" 
                               placeholder="Contoh: 475/LMG-F134/IX/001/2026">
                    </div>

                    <!-- SEKSI 1: WILAYAH PEMBUAT -->
                    <div class="space-y-4 text-xs font-bold text-slate-700">
                        <div>
                            <label class="block mb-1 tracking-wider uppercase">PROVINSI</label>
                            <input type="text" name="prov_pembuat" value="{{ old('prov_pembuat', 'RIAU') }}" required class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 focus:border-[#235832] focus:ring-0 text-slate-900 font-extrabold uppercase">
                        </div>

                        <div>
                            <label class="block mb-1 tracking-wider uppercase">KABUPATEN/KOTA</label>
                            <input type="text" name="kab_pembuat" value="{{ old('kab_pembuat', 'PELALAWAN') }}" required class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 focus:border-[#235832] focus:ring-0 text-slate-900 font-extrabold uppercase">
                        </div>

                        <div>
                            <label class="block mb-1 tracking-wider uppercase">KECAMATAN</label>
                            <input type="text" name="kec_pembuat" value="{{ old('kec_pembuat', 'BUNUT') }}" required class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 focus:border-[#235832] focus:ring-0 text-slate-900 font-extrabold uppercase">
                        </div>

                        <div>
                            <label class="block mb-1 tracking-wider uppercase">DESA/KELURAHAN</label>
                            <input type="text" name="desa_pembuat" value="{{ old('desa_pembuat', 'LUBUK MANDIAN GAJAH') }}" required class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 focus:border-[#235832] focus:ring-0 text-slate-900 font-extrabold uppercase">
                        </div>

                        <div>
                            <label class="block mb-1 tracking-wider uppercase">DUSUN/DUKUH/KAMPUNG</label>
                            <input type="text" name="dusun_pembuat" value="{{ old('dusun_pembuat', 'DUSUN I') }}" placeholder="Contoh: DUSUN I" class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 focus:border-[#235832] focus:ring-0 text-slate-900 font-extrabold uppercase">
                        </div>
                    </div>

                    <!-- SUB-TITLE JUDUL DOKUMEN F.1-34 -->
                    <div class="py-4 border-y-2 border-slate-800 text-center space-y-1 my-6 bg-slate-50 rounded-xl">
                        <h3 class="text-base sm:text-lg font-black text-slate-900 tracking-wide uppercase">
                            FORMULIR PERMOHONAN PINDAH WNI
                        </h3>
                        <p class="text-xs sm:text-sm font-bold text-slate-700">
                            Antar Kabupaten/Kota atau Antar Provinsi (Kode Dokumen: F.1-34)
                        </p>
                    </div>

                    <!-- SEKSI 2: DATA DAERAH ASAL -->
                    <div class="space-y-5">
                        <h4 class="text-sm font-black text-slate-900 tracking-wider uppercase border-b-2 border-slate-300 pb-1">
                            DATA DAERAH ASAL
                        </h4>

                        <!-- 1. NOMOR KARTU KELUARGA (16 KOTAK DITAMPILKAN KOTAK-KOTAK KARAKTER) -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-extrabold text-slate-700">1. Nomor Kartu Keluarga (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="hidden" name="no_kk_asal" :value="noKkAsalStr">
                            
                            <div class="flex flex-wrap gap-1">
                                <template x-for="(digit, idx) in 16" :key="'kk_'+idx">
                                    <input type="text" maxlength="1" 
                                           x-model="noKkAsal[idx]"
                                           @input="handleDigitInput($event, idx, noKkAsal, 'kk_')"
                                           @keydown.backspace="handleBackspace($event, idx, noKkAsal, 'kk_')"
                                           @paste="handlePaste($event, noKkAsal, 16)"
                                           :id="'kk_'+idx"
                                           class="w-7 h-9 text-center font-mono font-black text-sm border-2 border-slate-400 rounded-md focus:border-[#235832] focus:ring-0 uppercase bg-slate-50">
                                </template>
                            </div>
                        </div>

                        <!-- 2. NAMA KEPALA KELUARGA -->
                        <div>
                            <label class="block text-xs font-extrabold text-slate-700 mb-1">2. Nama Kepala Keluarga <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_kepala_keluarga" required placeholder="Contoh: AHMAD SUBARI" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] text-xs font-bold uppercase">
                        </div>

                        <!-- 3. ALAMAT ASAL -->
                        <div class="space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200">
                            <label class="block text-xs font-extrabold text-slate-800">3. Alamat Asal Lengkap</label>
                            
                            <div>
                                <textarea name="alamat_asal" rows="2" placeholder="Dusun / Jalan Asal Lengkap..." class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] text-xs font-semibold uppercase"></textarea>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">RT Asal (3 Digit)</label>
                                    <input type="text" name="rt_asal" maxlength="3" placeholder="002" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-center font-mono font-bold">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">RW Asal (3 Digit)</label>
                                    <input type="text" name="rw_asal" maxlength="3" placeholder="001" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-center font-mono font-bold">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Dusun / Kampung</label>
                                    <input type="text" name="dusun_asal" value="DUSUN I" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Desa / Kelurahan</label>
                                    <input type="text" name="desa_asal" value="LUBUK MANDIAN GAJAH" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kecamatan</label>
                                    <input type="text" name="kec_asal" value="BUNUT" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kabupaten / Kota</label>
                                    <input type="text" name="kab_asal" value="PELALAWAN" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Provinsi</label>
                                    <input type="text" name="prov_asal" value="RIAU" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kode Pos Asal (5 Digit)</label>
                                    <input type="text" name="kodepos_asal" maxlength="5" value="28382" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-center font-mono font-bold">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block font-bold text-slate-700 mb-1">Telepon / No. HP</label>
                                    <input type="text" name="telepon_asal" placeholder="08123456789" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-medium">
                                </div>
                            </div>
                        </div>

                        <!-- 4. NIK PEMOHON (16 KOTAK CHARACTER) -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-extrabold text-slate-700">4. NIK Pemohon (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="hidden" name="nik_pemohon" :value="nikPemohonStr">
                            
                            <div class="flex flex-wrap gap-1">
                                <template x-for="(digit, idx) in 16" :key="'nik_'+idx">
                                    <input type="text" maxlength="1" 
                                           x-model="nikPemohon[idx]"
                                           @input="handleDigitInput($event, idx, nikPemohon, 'nik_')"
                                           @keydown.backspace="handleBackspace($event, idx, nikPemohon, 'nik_')"
                                           @paste="handlePaste($event, nikPemohon, 16)"
                                           :id="'nik_'+idx"
                                           class="w-7 h-9 text-center font-mono font-black text-sm border-2 border-slate-400 rounded-md focus:border-[#235832] focus:ring-0 uppercase bg-slate-50">
                                </template>
                            </div>
                        </div>

                        <!-- 5. NAMA LENGKAP PEMOHON -->
                        <div>
                            <label class="block text-xs font-extrabold text-slate-700 mb-1">5. Nama Lengkap Pemohon <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_pemohon" required placeholder="Contoh: BUDI SANTOSO" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] text-xs font-bold uppercase">
                        </div>
                    </div>

                    <!-- SEKSI 3: DATA KEPINDAHAN -->
                    <div class="space-y-5 pt-4 border-t-2 border-slate-300">
                        <h4 class="text-sm font-black text-slate-900 tracking-wider uppercase border-b-2 border-slate-300 pb-1">
                            DATA KEPINDAHAN
                        </h4>

                        <!-- 1. ALASAN PINDAH -->
                        <div class="space-y-2 text-xs">
                            <label class="block font-extrabold text-slate-800">1. Alasan Pindah <span class="text-red-500">*</span></label>
                            <select name="alasan_pindah" x-model="alasanPindah" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold text-slate-800">
                                <option value="1. Pekerjaan">1. Pekerjaan</option>
                                <option value="2. Pendidikan">2. Pendidikan</option>
                                <option value="3. Keamanan">3. Keamanan</option>
                                <option value="4. Kesehatan">4. Kesehatan</option>
                                <option value="5. Perumahan">5. Perumahan</option>
                                <option value="6. Keluarga">6. Keluarga</option>
                                <option value="7. Lainnya">7. Lainnya (sebutkan)</option>
                            </select>

                            <div x-show="alasanPindah === '7. Lainnya'" class="pt-1">
                                <input type="text" name="alasan_pindah_lainnya" placeholder="Sebutkan Alasan Pindah Lainnya..." class="w-full px-3.5 py-2 rounded-xl border border-amber-400 font-semibold text-xs uppercase">
                            </div>
                        </div>

                        <!-- 2. ALAMAT TUJUAN PINDAH -->
                        <div class="space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200 text-xs">
                            <label class="block font-extrabold text-slate-800">2. Alamat Tujuan Pindah Lengkap (Antar Kabupaten/Kota atau Antar Provinsi)</label>
                            
                            <div>
                                <textarea name="alamat_tujuan" rows="2" placeholder="Alamat Tujuan Pindah (Jalan / Dusun / RT / RW)..." class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-semibold uppercase"></textarea>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">RT Tujuan (3 Digit)</label>
                                    <input type="text" name="rt_tujuan" maxlength="3" placeholder="001" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-center font-mono font-bold">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">RW Tujuan (3 Digit)</label>
                                    <input type="text" name="rw_tujuan" maxlength="3" placeholder="003" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-center font-mono font-bold">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Dusun / Kampung Tujuan</label>
                                    <input type="text" name="dusun_tujuan" placeholder="Contoh: Dusun Meranti" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Desa / Kelurahan Tujuan</label>
                                    <input type="text" name="desa_tujuan" placeholder="Contoh: Kelurahan Pekanbaru Kota" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kecamatan Tujuan</label>
                                    <input type="text" name="kec_tujuan" placeholder="Contoh: Tampan" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kabupaten / Kota Tujuan</label>
                                    <input type="text" name="kab_tujuan" placeholder="Contoh: KOTA PEKANBARU" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Provinsi Tujuan</label>
                                    <input type="text" name="prov_tujuan" placeholder="Contoh: RIAU" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kode Pos Tujuan (5 Digit)</label>
                                    <input type="text" name="kodepos_tujuan" maxlength="5" placeholder="28292" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-center font-mono font-bold">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block font-bold text-slate-700 mb-1">Telepon / HP Tujuan</label>
                                    <input type="text" name="telepon_tujuan" placeholder="08123456789" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-medium">
                                </div>
                            </div>
                        </div>

                        <!-- 3. JENIS KEPINDAHAN -->
                        <div class="text-xs space-y-1">
                            <label class="block font-extrabold text-slate-800">3. Jenis Kepindahan <span class="text-red-500">*</span></label>
                            <select name="jenis_kepindahan" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold text-slate-800">
                                <option value="1. Kep. Keluarga">1. Kep. Keluarga</option>
                                <option value="2. Kep. Keluarga dan Seluruh Angg. Keluarga" selected>2. Kep. Keluarga dan Seluruh Angg. Keluarga</option>
                                <option value="3. Kep. Keluarga dan Sbg. Anggota Keluarga">3. Kep. Keluarga dan Sbg. Anggota Keluarga</option>
                                <option value="4. Angg. Keluarga">4. Angg. Keluarga</option>
                            </select>
                        </div>

                        <!-- 4 & 5. STATUS KK -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                            <div>
                                <label class="block font-extrabold text-slate-800 mb-1">4. Status KK Bagi Yang Tidak Pindah</label>
                                <select name="status_kk_tidak_pindah" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold text-slate-800">
                                    <option value="">-- Pilih Option --</option>
                                    <option value="1. Numpang KK">1. Numpang KK</option>
                                    <option value="2. Membuat KK Baru">2. Membuat KK Baru</option>
                                    <option value="3. Nomor KK Tetap" selected>3. Nomor KK Tetap</option>
                                </select>
                            </div>
                            <div>
                                <label class="block font-extrabold text-slate-800 mb-1">5. Status KK Bagi Yang Pindah <span class="text-red-500">*</span></label>
                                <select name="status_kk_pindah" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold text-slate-800">
                                    <option value="1. Numpang KK">1. Numpang KK</option>
                                    <option value="2. Membuat KK Baru" selected>2. Membuat KK Baru</option>
                                    <option value="3. Nomor KK Tetap">3. Nomor KK Tetap</option>
                                </select>
                            </div>
                        </div>

                        <!-- 6. KELUARGA YANG PINDAH (INPUT DENGAN JUMLAH ANGGOTA + TOMBOL OK) -->
                        <div class="pt-4 border-t border-slate-200 space-y-4">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                                <label class="text-xs font-black text-slate-900 uppercase">
                                    6. KELUARGA YANG PINDAH
                                </label>

                                <div class="flex items-center space-x-2 text-xs">
                                    <span class="font-extrabold text-slate-700">JUMLAH ANGGOTA:</span>
                                    <input type="number" min="1" max="10" x-model="jumlahAnggotaInput" class="w-16 px-2 py-1 rounded-lg border-2 border-slate-400 font-mono font-bold text-center">
                                    <button type="button" @click="generateAnggotaList()" class="px-4 py-1.5 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold rounded-lg shadow-xs transition-all uppercase">
                                        OK
                                    </button>
                                </div>
                            </div>

                            <!-- BARIS ANGGOTA KELUARGA -->
                            <div class="space-y-4">
                                <template x-for="(item, index) in anggota" :key="index">
                                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-300 space-y-3 relative">
                                        <div class="flex items-center justify-between border-b border-slate-200 pb-2">
                                            <span class="font-extrabold text-xs text-[#235832]" x-text="'ANGGOTA NO. ' + (index + 1)"></span>
                                            
                                            <button type="button" @click="hapusAnggota(index)" class="text-red-500 hover:text-red-700 text-xs font-bold flex items-center space-x-1" x-show="anggota.length > 1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                <span>Hapus</span>
                                            </button>
                                        </div>

                                        <div class="space-y-2 text-xs">
                                            <!-- NIK ANGGOTA (16 DIGIT KOTAK PETAK) -->
                                            <div>
                                                <label class="block font-extrabold text-slate-700 mb-1">NIK (16 Digit)</label>
                                                <input type="text" :name="'anggota_keluarga[' + index + '][nik]'" x-model="item.nik" maxlength="16" placeholder="Masukkan 16 Digit NIK" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-mono font-bold tracking-wider">
                                            </div>

                                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                                <div class="sm:col-span-1">
                                                    <label class="block font-bold text-slate-700 mb-1">Nama Lengkap</label>
                                                    <input type="text" :name="'anggota_keluarga[' + index + '][nama]'" x-model="item.nama" placeholder="Nama Lengkap" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                                </div>

                                                <div>
                                                    <label class="block font-bold text-slate-700 mb-1">Masa Berlaku KTP S/D</label>
                                                    <input type="text" :name="'anggota_keluarga[' + index + '][masa_berlaku_ktp]'" x-model="item.masa_berlaku_ktp" placeholder="SEUMUR HIDUP" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-medium">
                                                </div>

                                                <div>
                                                    <label class="block font-bold text-slate-700 mb-1">SHDK (Status Hubungan)</label>
                                                    <select :name="'anggota_keluarga[' + index + '][shdk]'" x-model="item.shdk" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold">
                                                        <option value="KEPALA KELUARGA">KEPALA KELUARGA</option>
                                                        <option value="SUAMI">SUAMI</option>
                                                        <option value="ISTRI">ISTRI</option>
                                                        <option value="ANAK">ANAK</option>
                                                        <option value="MENANTU">MENANTU</option>
                                                        <option value="CUCU">CUCU</option>
                                                        <option value="ORANG TUA">ORANG TUA</option>
                                                        <option value="MERTUA">MERTUA</option>
                                                        <option value="FAMILI LAIN">FAMILI LAIN</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>

                    <!-- TOMBOL AKSIS INPUT PRESISI FIGMA (BIRU #0284c7 BERTULISKAN INPUT) -->
                    <div class="pt-6 border-t-2 border-slate-200 flex justify-center">
                        <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-[#0284c7] hover:bg-[#0369a1] text-white font-black text-sm tracking-wider uppercase rounded-2xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center space-x-2">
                            <span>SIMPAN KE ARSIP & CETAK DOKUMEN F.1-34</span>
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <!-- ALPINE.JS LOGIC FOR DIGIT BOXES & DYNAMIC ANGGOTA -->
    <script>
        function f134Form() {
            return {
                noKkAsal: Array(16).fill(''),
                nikPemohon: Array(16).fill(''),
                alasanPindah: '1. Pekerjaan',
                jumlahAnggotaInput: 2,
                anggota: [
                    { nik: '', nama: '', masa_berlaku_ktp: 'SEUMUR HIDUP', shdk: 'KEPALA KELUARGA' },
                    { nik: '', nama: '', masa_berlaku_ktp: 'SEUMUR HIDUP', shdk: 'ISTRI' }
                ],

                get noKkAsalStr() {
                    return this.noKkAsal.join('');
                },
                get nikPemohonStr() {
                    return this.nikPemohon.join('');
                },

                handleDigitInput(e, idx, arr, prefix) {
                    const val = e.target.value;
                    arr[idx] = val;
                    if (val && idx < arr.length - 1) {
                        const nextEl = document.getElementById(prefix + (idx + 1));
                        if (nextEl) nextEl.focus();
                    }
                },

                handleBackspace(e, idx, arr, prefix) {
                    if (!arr[idx] && idx > 0) {
                        const prevEl = document.getElementById(prefix + (idx - 1));
                        if (prevEl) prevEl.focus();
                    }
                },

                handlePaste(e, arr, maxLen) {
                    e.preventDefault();
                    const pasteData = (e.clipboardData || window.clipboardData).getData('text').trim();
                    const digits = pasteData.replace(/\D/g, '').split('');
                    for (let i = 0; i < maxLen; i++) {
                        arr[i] = digits[i] || '';
                    }
                },

                generateAnggotaList() {
                    const targetCount = parseInt(this.jumlahAnggotaInput) || 1;
                    if (targetCount < 1) return;
                    
                    if (targetCount > this.anggota.length) {
                        const diff = targetCount - this.anggota.length;
                        for (let i = 0; i < diff; i++) {
                            this.anggota.push({
                                nik: '',
                                nama: '',
                                masa_berlaku_ktp: 'SEUMUR HIDUP',
                                shdk: 'ANAK'
                            });
                        }
                    } else if (targetCount < this.anggota.length) {
                        this.anggota = this.anggota.slice(0, targetCount);
                    }
                },

                hapusAnggota(index) {
                    if (this.anggota.length > 1) {
                        this.anggota.splice(index, 1);
                        this.jumlahAnggotaInput = this.anggota.length;
                    }
                }
            }
        }
    </script>
</x-app-layout>
