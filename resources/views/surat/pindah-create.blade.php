<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 rounded-2xl bg-[#235832] text-white flex items-center justify-center font-bold text-lg shadow-md ring-4 ring-emerald-100 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                </div>
                <div>
                    <span class="inline-block px-2.5 py-0.5 text-[10px] uppercase font-bold tracking-wider bg-emerald-100 text-[#235832] rounded-md mb-0.5">
                        BLANGKO RESMI [ F.1-29 ]
                    </span>
                    <h2 class="font-extrabold text-xl sm:text-2xl text-slate-800 leading-tight">
                        Formulir Permohonan Pindah WNI
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">
                        Antar Kabupaten/Kota Dalam Satu Provinsi atau Antar Provinsi
                    </p>
                </div>
            </div>

            <div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center space-x-2 text-xs font-bold text-slate-700 bg-white hover:bg-slate-100 border border-slate-300 px-4 py-2.5 rounded-xl transition-all shadow-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Kembali ke Dashboard</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Banner Petunjuk -->
            <div class="bg-gradient-to-r from-[#235832] to-[#1b4527] rounded-3xl p-6 text-white shadow-md relative overflow-hidden flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="relative z-10 space-y-1">
                    <h3 class="text-lg font-extrabold flex items-center space-x-2">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Input Data Permohonan Pindah WNI (Kode F.1-29)</span>
                    </h3>
                    <p class="text-xs text-emerald-100 max-w-2xl leading-relaxed">
                        Silakan isikan data daerah asal, data kepindahan, serta daftar anggota keluarga yang ikut pindah sesuai dengan dokumen Kartu Keluarga dan KTP pemohon.
                    </p>
                </div>
                <div class="shrink-0 bg-white/15 px-4 py-2 rounded-2xl backdrop-blur-xs text-center border border-white/20">
                    <span class="block text-[10px] uppercase font-bold text-emerald-200">KODE FORMULIR</span>
                    <span class="text-lg font-black text-white tracking-widest font-mono">F.1-29</span>
                </div>
            </div>

            <form action="{{ route('surat.pindah.store') }}" method="POST" class="space-y-6" x-data="suratPindahForm()">
                @csrf

                <!-- NOMOR SURAT RESMI DESA -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                    <label class="block text-sm font-semibold text-slate-700 mb-1">
                        Nomor Surat Resmi Desa <span class="text-slate-400 font-normal">(Bisa diedit manual sesuai buku register)</span>
                    </label>
                    <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $nomorSuratDefault ?? '') }}" 
                           class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm focus:border-emerald-500 focus:ring-emerald-500 font-mono font-bold text-slate-900" 
                           placeholder="Contoh: 475/LMG-F129/IX/001/2026">
                </div>

                <!-- BAGIAN 1: HEADER WILAYAH DESA PEMBUAT -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex items-center space-x-2">
                        <div class="w-7 h-7 rounded-xl bg-emerald-100 text-[#235832] flex items-center justify-center font-bold text-xs">1</div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">Data Wilayah Desa Pembuat Surat</h4>
                            <p class="text-[11px] text-slate-500">Informasi pemerintah daerah tempat permohonan diajukan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-xs">
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">1. Provinsi</label>
                            <input type="text" name="prov_asal" value="{{ old('prov_asal', 'RIAU') }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold uppercase">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">2. Kabupaten/Kota</label>
                            <input type="text" name="kab_asal" value="{{ old('kab_asal', 'PELALAWAN') }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold uppercase">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">3. Kecamatan</label>
                            <input type="text" name="kec_asal" value="{{ old('kec_asal', 'BUNUT') }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold uppercase">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">4. Desa/Kelurahan</label>
                            <input type="text" name="desa_asal" value="{{ old('desa_asal', 'LUBUK MANDIAN GAJAH') }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold uppercase">
                        </div>
                        <div class="sm:col-span-2 lg:col-span-2">
                            <label class="block font-bold text-slate-700 mb-1">5. Dusun/Dukuh/Kampung</label>
                            <input type="text" name="dusun_asal" value="{{ old('dusun_asal', 'DUSUN I') }}" placeholder="Contoh: DUSUN I / KAMPUNG UTAMA" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold uppercase">
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 2: DATA DAERAH ASAL -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex items-center space-x-2">
                        <div class="w-7 h-7 rounded-xl bg-emerald-100 text-[#235832] flex items-center justify-center font-bold text-xs">2</div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">Data Daerah Asal Pemohon</h4>
                            <p class="text-[11px] text-slate-500">Nomor Kartu Keluarga, NIK, dan alamat tempat tinggal pemohon asal</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nomor Kartu Keluarga (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="text" name="no_kk_asal" maxlength="16" required placeholder="Contoh: 1405021203090001" value="{{ old('no_kk_asal') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-mono font-bold tracking-wider">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nama Kepala Keluarga <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_kepala_keluarga" required placeholder="Contoh: AHMAD SUBARI" value="{{ old('nama_kepala_keluarga') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold uppercase">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block font-bold text-slate-700 mb-1">Alamat Asal Lengkap</label>
                            <textarea name="alamat_asal" rows="2" placeholder="Contoh: JL. POROS DESA LUBUK MANDIAN GAJAH RT 002 / RW 001" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium uppercase">{{ old('alamat_asal') }}</textarea>
                        </div>

                        <div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">RT Asal</label>
                                    <input type="text" name="rt_asal" placeholder="002" value="{{ old('rt_asal') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold text-center">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">RW Asal</label>
                                    <input type="text" name="rw_asal" placeholder="001" value="{{ old('rw_asal') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold text-center">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kode Pos Asal</label>
                                    <input type="text" name="kodepos_asal" placeholder="28382" value="{{ old('kodepos_asal', '28382') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-mono font-semibold text-center">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Telepon / WA Asal</label>
                                    <input type="text" name="telepon_asal" placeholder="08123456789" value="{{ old('telepon_asal') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-medium">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">NIK Pemohon (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="text" name="nik_pemohon" maxlength="16" required placeholder="Contoh: 1405022005920002" value="{{ old('nik_pemohon') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-mono font-bold tracking-wider">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nama Lengkap Pemohon <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_pemohon" required placeholder="Contoh: BUDI SANTOSO" value="{{ old('nama_pemohon') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold uppercase">
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 3: DATA KEPINDAHAN -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex items-center space-x-2">
                        <div class="w-7 h-7 rounded-xl bg-emerald-100 text-[#235832] flex items-center justify-center font-bold text-xs">3</div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">Data Kepindahan (Tujuan Pindah)</h4>
                            <p class="text-[11px] text-slate-500">Alasan kepindahan, alamat domisili baru, serta status KK baru</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        
                        <div class="sm:col-span-2">
                            <label class="block font-bold text-slate-700 mb-1">1. Alasan Pindah <span class="text-red-500">*</span></label>
                            <select name="alasan_pindah" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold">
                                <option value="1. Pekerjaan">1. Pekerjaan</option>
                                <option value="2. Pendidikan">2. Pendidikan</option>
                                <option value="3. Keamanan">3. Keamanan</option>
                                <option value="4. Kesehatan">4. Kesehatan</option>
                                <option value="5. Perumahan">5. Perumahan</option>
                                <option value="6. Keluarga" selected>6. Keluarga</option>
                                <option value="7. Lainnya">7. Lainnya</option>
                            </select>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block font-bold text-slate-700 mb-1">2. Alamat Tujuan Pindah Lengkap</label>
                            <textarea name="alamat_tujuan" rows="2" placeholder="Contoh: JL. KELAPA GADING NO. 45" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium uppercase">{{ old('alamat_tujuan') }}</textarea>
                        </div>

                        <div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">RT Tujuan</label>
                                    <input type="text" name="rt_tujuan" placeholder="001" value="{{ old('rt_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold text-center">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">RW Tujuan</label>
                                    <input type="text" name="rw_tujuan" placeholder="003" value="{{ old('rw_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold text-center">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Dusun / Kampung Tujuan</label>
                            <input type="text" name="dusun_tujuan" placeholder="Dusun Indah" value="{{ old('dusun_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold uppercase">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Desa / Kelurahan Tujuan</label>
                            <input type="text" name="desa_tujuan" placeholder="Pangkalan Kerinci Kota" value="{{ old('desa_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold uppercase">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Kecamatan Tujuan</label>
                            <input type="text" name="kec_tujuan" placeholder="Pangkalan Kerinci" value="{{ old('kec_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold uppercase">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Kabupaten / Kota Tujuan</label>
                            <input type="text" name="kab_tujuan" placeholder="PELALAWAN" value="{{ old('kab_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold uppercase">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Provinsi Tujuan</label>
                            <input type="text" name="prov_tujuan" placeholder="RIAU" value="{{ old('prov_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-semibold uppercase">
                        </div>

                        <div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kode Pos Tujuan</label>
                                    <input type="text" name="kodepos_tujuan" placeholder="28300" value="{{ old('kodepos_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-mono font-semibold text-center">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Telepon Tujuan</label>
                                    <input type="text" name="telepon_tujuan" placeholder="08123456789" value="{{ old('telepon_tujuan') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-800 font-medium">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-2 pt-2 border-t border-slate-100 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block font-bold text-slate-700 mb-1">3. Jenis Kepindahan <span class="text-red-500">*</span></label>
                                <select name="jenis_kepindahan" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold">
                                    <option value="1. Kep. Keluarga">1. Kep. Keluarga</option>
                                    <option value="2. Kep. Keluarga dan Seluruh Angg. Keluarga" selected>2. Kep. Keluarga & Seluruh Angg. Keluarga</option>
                                    <option value="3. Kep. Keluarga dan Sbg. Anggota Keluarga">3. Kep. Keluarga & Sbg. Anggota Keluarga</option>
                                    <option value="4. Angg. Keluarga">4. Angg. Keluarga</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-bold text-slate-700 mb-1">4. Status KK Bagi Yang Tidak Pindah</label>
                                <select name="status_kk_tidak_pindah" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold">
                                    <option value="">-- Pilih Option --</option>
                                    <option value="1. Numpang KK">1. Numpang KK</option>
                                    <option value="2. Membuat KK Baru">2. Membuat KK Baru</option>
                                    <option value="3. Nomor KK Tetap" selected>3. Nomor KK Tetap</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-bold text-slate-700 mb-1">5. Status KK Bagi Yang Pindah <span class="text-red-500">*</span></label>
                                <select name="status_kk_pindah" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-semibold">
                                    <option value="1. Numpang KK">1. Numpang KK</option>
                                    <option value="2. Membuat KK Baru" selected>2. Membuat KK Baru</option>
                                    <option value="3. Nomor KK Tetap">3. Nomor KK Tetap</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- BAGIAN 4: DATA ANGGOTA KELUARGA YANG PINDAH (DYNAMIC INTERACTIVE TABLE) -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center space-x-2">
                            <div class="w-7 h-7 rounded-xl bg-emerald-100 text-[#235832] flex items-center justify-center font-bold text-xs">4</div>
                            <div>
                                <h4 class="font-extrabold text-slate-800 text-sm">Keluarga Yang Pindah</h4>
                                <p class="text-[11px] text-slate-500">Tambahkan daftar nama anggota keluarga yang ikut pindah domisili</p>
                            </div>
                        </div>

                        <button type="button" @click="tambahAnggota()" class="px-3.5 py-2 bg-[#235832] hover:bg-[#1b4527] text-white text-xs font-bold rounded-xl transition-all shadow-xs inline-flex items-center space-x-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Tambah Anggota</span>
                        </button>
                    </div>

                    <div class="overflow-x-auto rounded-2xl border border-slate-200/80">
                        <table class="w-full text-left text-xs">
                            <thead class="bg-slate-50 text-slate-600 font-bold uppercase tracking-wider border-b border-slate-200/80">
                                <tr>
                                    <th class="py-3 px-3 w-10 text-center">NO</th>
                                    <th class="py-3 px-3 min-w-[160px]">NIK (16 DIGIT)</th>
                                    <th class="py-3 px-3 min-w-[180px]">NAMA LENGKAP</th>
                                    <th class="py-3 px-3 min-w-[150px]">MASA BERLAKU KTP S/D</th>
                                    <th class="py-3 px-3 min-w-[150px]">SHDK (STATUS HUBUNGAN)</th>
                                    <th class="py-3 px-3 w-12 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium">
                                <template x-for="(item, index) in anggota" :key="index">
                                    <tr class="hover:bg-slate-50/50">
                                        <td class="py-2.5 px-3 text-center font-bold text-slate-500" x-text="index + 1"></td>
                                        
                                        <td class="py-2.5 px-3">
                                            <input type="text" :name="'anggota_keluarga[' + index + '][nik]'" x-model="item.nik" maxlength="16" placeholder="NIK 16 Digit" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 focus:border-[#235832] font-mono text-xs">
                                        </td>

                                        <td class="py-2.5 px-3">
                                            <input type="text" :name="'anggota_keluarga[' + index + '][nama]'" x-model="item.nama" placeholder="Nama Lengkap" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 focus:border-[#235832] font-semibold uppercase text-xs">
                                        </td>

                                        <td class="py-2.5 px-3">
                                            <input type="text" :name="'anggota_keluarga[' + index + '][masa_berlaku_ktp]'" x-model="item.masa_berlaku_ktp" placeholder="SEUMUR HIDUP / TGL" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 focus:border-[#235832] text-xs">
                                        </td>

                                        <td class="py-2.5 px-3">
                                            <select :name="'anggota_keluarga[' + index + '][shdk]'" x-model="item.shdk" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 focus:border-[#235832] text-xs font-semibold">
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
                                        </td>

                                        <td class="py-2.5 px-3 text-center">
                                            <button type="button" @click="hapusAnggota(index)" class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 transition-all" title="Hapus Anggota">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SUBMIT BUTTON BAR -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-end gap-4">
                    <a href="{{ route('dashboard') }}" class="w-full sm:w-auto px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold rounded-xl text-xs transition-all text-center">
                        Batal
                    </a>
                    <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold rounded-xl shadow-lg hover:shadow-xl transition-all text-xs flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        <span>Simpan & Cetak Blangko F.1-29</span>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function suratPindahForm() {
            return {
                anggota: [
                    { nik: '', nama: '', masa_berlaku_ktp: 'SEUMUR HIDUP', shdk: 'KEPALA KELUARGA' },
                    { nik: '', nama: '', masa_berlaku_ktp: 'SEUMUR HIDUP', shdk: 'ISTRI' }
                ],
                tambahAnggota() {
                    this.anggota.push({
                        nik: '',
                        nama: '',
                        masa_berlaku_ktp: 'SEUMUR HIDUP',
                        shdk: 'ANAK'
                    });
                },
                hapusAnggota(index) {
                    if (this.anggota.length > 1) {
                        this.anggota.splice(index, 1);
                    } else {
                        alert('Minimal 1 anggota keluarga dimasukkan.');
                    }
                }
            }
        }
    </script>
</x-app-layout>
