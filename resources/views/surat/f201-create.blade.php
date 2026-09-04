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

            <!-- FORM CONTAINER PRESISI F-2.01 -->
            <form action="{{ route('surat.f201.store') }}" method="POST" id="formF201" x-data="f201Form()" class="bg-white shadow-xl rounded-2xl border border-slate-200 overflow-hidden">
                @csrf

                <!-- SEKSI HEADER DOKUMEN -->
                <div class="bg-slate-200/90 py-3.5 px-6 border-b border-slate-300 text-center">
                    <h2 class="text-lg font-black text-slate-800 tracking-wider uppercase">ISI DATA FORMULIR F-2.01</h2>
                    <p class="text-xs font-bold text-slate-600">SURAT KETERANGAN KELAHIRAN (DISDUKCAPIL)</p>
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
                               placeholder="Contoh: 474/LMG-F201/IX/001/2026">
                    </div>

                    <!-- HEADER & WILAYAH / KEPALA KELUARGA & KK -->
                    <div class="space-y-4 bg-slate-50 p-4 rounded-xl border border-slate-200 text-xs font-bold text-slate-700">
                        <h4 class="text-sm font-black text-slate-900 tracking-wider uppercase border-b border-slate-300 pb-1">
                            HEADER & KEPALA KELUARGA
                        </h4>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label class="block mb-1 tracking-wider uppercase">Pemerintah Desa/Kel.</label>
                                <input type="text" name="pemerintah_desa" value="{{ old('pemerintah_desa', 'Desa Lubuk Mandian Gajah') }}" required class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-900 font-extrabold uppercase">
                            </div>
                            <div>
                                <label class="block mb-1 tracking-wider uppercase">Kecamatan</label>
                                <input type="text" name="kecamatan" value="{{ old('kecamatan', 'Bunut') }}" required class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-900 font-extrabold uppercase">
                            </div>
                            <div>
                                <label class="block mb-1 tracking-wider uppercase">Kabupaten/Kota</label>
                                <input type="text" name="kabupaten" value="{{ old('kabupaten', 'Pelalawan') }}" required class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-900 font-extrabold uppercase">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                            <div>
                                <label class="block mb-1 tracking-wider uppercase text-slate-800">Nama Kepala Keluarga <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_kepala_keluarga" value="{{ old('nama_kepala_keluarga') }}" required placeholder="Contoh: AHMAD SUBARI" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-900 font-extrabold uppercase">
                            </div>
                            <div>
                                <label class="block mb-1 tracking-wider uppercase text-slate-800">Kode Wilayah</label>
                                <input type="text" name="kode_wilayah" value="{{ old('kode_wilayah') }}" placeholder="Contoh: 14.05.02.2005" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-900 font-extrabold font-mono">
                            </div>
                        </div>

                        <!-- KOTAK KARAKTER NO KK (16 DIGIT) -->
                        <div class="space-y-1.5 pt-2">
                            <label class="block text-xs font-extrabold text-slate-800">Nomor Kartu Keluarga (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="hidden" name="no_kk" :value="noKkStr">
                            
                            <div class="flex flex-wrap gap-1">
                                <template x-for="(digit, idx) in 16" :key="'kk_'+idx">
                                    <input type="text" maxlength="1" 
                                           x-model="noKk[idx]"
                                           @input="handleDigitInput($event, idx, noKk, 'kk_')"
                                           @keydown.backspace="handleBackspace($event, idx, noKk, 'kk_')"
                                           @paste="handlePaste($event, noKk, 16)"
                                           :id="'kk_'+idx"
                                           class="w-7 h-9 text-center font-mono font-black text-sm border-2 border-slate-400 rounded-md focus:border-[#235832] focus:ring-0 uppercase bg-white">
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- SEKSI 1: DATA BAYI / ANAK -->
                    <div class="space-y-4 pt-4 border-t-2 border-slate-300">
                        <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase border-b-2 border-[#235832] pb-1">
                            1. DATA BAYI / ANAK
                        </h4>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs font-bold">
                            <div class="sm:col-span-2">
                                <label class="block text-slate-800 mb-1">1. Nama Bayi / Anak <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_anak" value="{{ old('nama_anak') }}" required placeholder="Contoh: MUHAMMAD RIZKY" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">2. Jenis Kelamin <span class="text-red-500">*</span></label>
                                <select name="jenis_kelamin_anak" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold text-slate-800">
                                    <option value="1. Laki-laki">1. Laki-laki</option>
                                    <option value="2. Perempuan">2. Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">3. Tempat Dilahirkan <span class="text-red-500">*</span></label>
                                <select name="tempat_dilahirkan" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold text-slate-800">
                                    <option value="1. RS/RB">1. RS/RB</option>
                                    <option value="2. Puskesmas">2. Puskesmas</option>
                                    <option value="3. Polindes">3. Polindes</option>
                                    <option value="4. Rumah" selected>4. Rumah</option>
                                    <option value="5. Lainnya">5. Lainnya</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">4. Tempat Kelahiran (Kab/Kota) <span class="text-red-500">*</span></label>
                                <input type="text" name="tempat_kelahiran" value="{{ old('tempat_kelahiran', 'PELALAWAN') }}" required placeholder="Contoh: PELALAWAN" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold uppercase">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">5. Hari Lahir <span class="text-red-500">*</span></label>
                                <select name="hari_lahir" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold text-slate-800">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">Tanggal Lahir <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">6. Pukul Lahir (Jam:Menit)</label>
                                <input type="text" name="pukul_lahir" value="{{ old('pukul_lahir') }}" placeholder="08:30" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-mono font-bold">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">7. Jenis Kelahiran <span class="text-red-500">*</span></label>
                                <select name="jenis_kelahiran" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold text-slate-800">
                                    <option value="1. Tunggal" selected>1. Tunggal</option>
                                    <option value="2. Kembar 2">2. Kembar 2</option>
                                    <option value="3. Kembar 3">3. Kembar 3</option>
                                    <option value="4. Kembar 4">4. Kembar 4</option>
                                    <option value="5. Lainnya">5. Lainnya</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">8. Kelahiran Ke</label>
                                <input type="number" min="1" max="20" name="kelahiran_ke" value="{{ old('kelahiran_ke', 1) }}" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-mono font-bold">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">9. Penolong Kelahiran <span class="text-red-500">*</span></label>
                                <select name="penolong_kelahiran" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold text-slate-800">
                                    <option value="1. Dokter">1. Dokter</option>
                                    <option value="2. Bidan/Perawat" selected>2. Bidan/Perawat</option>
                                    <option value="3. Dukun">3. Dukun</option>
                                    <option value="4. Lainnya">4. Lainnya</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-2 sm:col-span-1">
                                <div>
                                    <label class="block text-slate-800 mb-1">10. Berat Bayi (kg)</label>
                                    <input type="text" name="berat_bayi" value="{{ old('berat_bayi') }}" placeholder="3.2" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono font-bold">
                                </div>
                                <div>
                                    <label class="block text-slate-800 mb-1">11. Panjang (cm)</label>
                                    <input type="text" name="panjang_bayi" value="{{ old('panjang_bayi') }}" placeholder="49" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono font-bold">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEKSI 2: DATA IBU -->
                    <div class="space-y-4 pt-4 border-t-2 border-slate-300">
                        <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase border-b-2 border-[#235832] pb-1">
                            2. DATA IBU
                        </h4>

                        <!-- NIK IBU 16 KOTAK -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-extrabold text-slate-800">1. NIK Ibu (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="hidden" name="nik_ibu" :value="nikIbuStr">
                            
                            <div class="flex flex-wrap gap-1">
                                <template x-for="(digit, idx) in 16" :key="'nik_ibu_'+idx">
                                    <input type="text" maxlength="1" 
                                           x-model="nikIbu[idx]"
                                           @input="handleDigitInput($event, idx, nikIbu, 'nik_ibu_')"
                                           @keydown.backspace="handleBackspace($event, idx, nikIbu, 'nik_ibu_')"
                                           @paste="handlePaste($event, nikIbu, 16)"
                                           :id="'nik_ibu_'+idx"
                                           class="w-7 h-9 text-center font-mono font-black text-sm border-2 border-slate-400 rounded-md focus:border-[#235832] focus:ring-0 uppercase bg-slate-50">
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs font-bold">
                            <div class="sm:col-span-2">
                                <label class="block text-slate-800 mb-1">2. Nama Lengkap Ibu <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" required placeholder="Contoh: SITI AMINAH" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">3. Tanggal Lahir Ibu</label>
                                <input type="date" name="tgl_lahir_ibu" value="{{ old('tgl_lahir_ibu') }}" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">Umur Ibu (Tahun)</label>
                                <input type="number" name="umur_ibu" value="{{ old('umur_ibu') }}" placeholder="28" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-mono font-bold">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-slate-800 mb-1">4. Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', 'MENGURUS RUMAH TANGGA') }}" placeholder="Contoh: MENGURUS RUMAH TANGGA" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                            </div>
                        </div>

                        <!-- ALAMAT IBU -->
                        <div class="space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200 text-xs font-bold">
                            <label class="block text-slate-800">5. Alamat Ibu Lengkap</label>
                            
                            <div>
                                <textarea name="alamat_ibu" rows="2" placeholder="Dusun / Jalan Alamat Ibu..." class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-semibold uppercase"></textarea>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">a. Desa / Kelurahan</label>
                                    <input type="text" name="desa_ibu" value="{{ old('desa_ibu', 'LUBUK MANDIAN GAJAH') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">b. Kecamatan</label>
                                    <input type="text" name="kec_ibu" value="{{ old('kec_ibu', 'BUNUT') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">c. Kab / Kota</label>
                                    <input type="text" name="kab_ibu" value="{{ old('kab_ibu', 'PELALAWAN') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">d. Provinsi</label>
                                    <input type="text" name="prov_ibu" value="{{ old('prov_ibu', 'RIAU') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs font-bold">
                            <div>
                                <label class="block text-slate-800 mb-1">6. Kewarganegaraan</label>
                                <select name="kewarganegaraan_ibu" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold text-slate-800">
                                    <option value="1. WNI" selected>1. WNI</option>
                                    <option value="2. WNA">2. WNA</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-slate-800 mb-1">7. Kebangsaan</label>
                                <input type="text" name="kebangsaan_ibu" value="{{ old('kebangsaan_ibu', 'INDONESIA') }}" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                            </div>
                            <div>
                                <label class="block text-slate-800 mb-1">8. Tgl. Pencatatan Perkawinan</label>
                                <input type="date" name="tgl_pencatatan_perkawinan" value="{{ old('tgl_pencatatan_perkawinan') }}" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold">
                            </div>
                        </div>
                    </div>

                    <!-- SEKSI 3: DATA AYAH -->
                    <div class="space-y-4 pt-4 border-t-2 border-slate-300">
                        <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase border-b-2 border-[#235832] pb-1">
                            3. DATA AYAH
                        </h4>

                        <!-- NIK AYAH 16 KOTAK -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-extrabold text-slate-800">1. NIK Ayah (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="hidden" name="nik_ayah" :value="nikAyahStr">
                            
                            <div class="flex flex-wrap gap-1">
                                <template x-for="(digit, idx) in 16" :key="'nik_ayah_'+idx">
                                    <input type="text" maxlength="1" 
                                           x-model="nikAyah[idx]"
                                           @input="handleDigitInput($event, idx, nikAyah, 'nik_ayah_')"
                                           @keydown.backspace="handleBackspace($event, idx, nikAyah, 'nik_ayah_')"
                                           @paste="handlePaste($event, nikAyah, 16)"
                                           :id="'nik_ayah_'+idx"
                                           class="w-7 h-9 text-center font-mono font-black text-sm border-2 border-slate-400 rounded-md focus:border-[#235832] focus:ring-0 uppercase bg-slate-50">
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs font-bold">
                            <div class="sm:col-span-2">
                                <label class="block text-slate-800 mb-1">2. Nama Lengkap Ayah <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" required placeholder="Contoh: AHMAD SUBARI" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">3. Tanggal Lahir Ayah</label>
                                <input type="date" name="tgl_lahir_ayah" value="{{ old('tgl_lahir_ayah') }}" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">Umur Ayah (Tahun)</label>
                                <input type="number" name="umur_ayah" value="{{ old('umur_ayah') }}" placeholder="32" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-mono font-bold">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-slate-800 mb-1">4. Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', 'PETANI / PEKEBUN') }}" placeholder="Contoh: PETANI / PEKEBUN" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                            </div>
                        </div>

                        <!-- ALAMAT AYAH -->
                        <div class="space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200 text-xs font-bold">
                            <label class="block text-slate-800">5. Alamat Ayah Lengkap</label>
                            
                            <div>
                                <textarea name="alamat_ayah" rows="2" placeholder="Dusun / Jalan Alamat Ayah..." class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-semibold uppercase"></textarea>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">a. Desa / Kelurahan</label>
                                    <input type="text" name="desa_ayah" value="{{ old('desa_ayah', 'LUBUK MANDIAN GAJAH') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">b. Kecamatan</label>
                                    <input type="text" name="kec_ayah" value="{{ old('kec_ayah', 'BUNUT') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">c. Kab / Kota</label>
                                    <input type="text" name="kab_ayah" value="{{ old('kab_ayah', 'PELALAWAN') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">d. Provinsi</label>
                                    <input type="text" name="prov_ayah" value="{{ old('prov_ayah', 'RIAU') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs font-bold">
                            <div>
                                <label class="block text-slate-800 mb-1">6. Kewarganegaraan</label>
                                <select name="kewarganegaraan_ayah" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold text-slate-800">
                                    <option value="1. WNI" selected>1. WNI</option>
                                    <option value="2. WNA">2. WNA</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-slate-800 mb-1">7. Kebangsaan</label>
                                <input type="text" name="kebangsaan_ayah" value="{{ old('kebangsaan_ayah', 'INDONESIA') }}" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                            </div>
                        </div>
                    </div>

                    <!-- SEKSI 4: DATA PELAPOR -->
                    <div class="space-y-4 pt-4 border-t-2 border-slate-300">
                        <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase border-b-2 border-[#235832] pb-1">
                            4. DATA PELAPOR
                        </h4>

                        <!-- NIK PELAPOR 16 KOTAK -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-extrabold text-slate-800">1. NIK Pelapor (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="hidden" name="nik_pelapor" :value="nikPelaporStr">
                            
                            <div class="flex flex-wrap gap-1">
                                <template x-for="(digit, idx) in 16" :key="'nik_pelapor_'+idx">
                                    <input type="text" maxlength="1" 
                                           x-model="nikPelapor[idx]"
                                           @input="handleDigitInput($event, idx, nikPelapor, 'nik_pelapor_')"
                                           @keydown.backspace="handleBackspace($event, idx, nikPelapor, 'nik_pelapor_')"
                                           @paste="handlePaste($event, nikPelapor, 16)"
                                           :id="'nik_pelapor_'+idx"
                                           class="w-7 h-9 text-center font-mono font-black text-sm border-2 border-slate-400 rounded-md focus:border-[#235832] focus:ring-0 uppercase bg-slate-50">
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs font-bold">
                            <div class="sm:col-span-2">
                                <label class="block text-slate-800 mb-1">2. Nama Lengkap Pelapor <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" required placeholder="Contoh: AHMAD SUBARI" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">3. Umur Pelapor (Tahun)</label>
                                <input type="number" name="umur_pelapor" value="{{ old('umur_pelapor') }}" placeholder="32" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-mono font-bold">
                            </div>

                            <div>
                                <label class="block text-slate-800 mb-1">4. Jenis Kelamin Pelapor</label>
                                <select name="jenis_kelamin_pelapor" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold text-slate-800">
                                    <option value="1. Laki-laki" selected>1. Laki-laki</option>
                                    <option value="2. Perempuan">2. Perempuan</option>
                                </select>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-slate-800 mb-1">5. Pekerjaan Pelapor</label>
                                <input type="text" name="pekerjaan_pelapor" value="{{ old('pekerjaan_pelapor') }}" placeholder="Contoh: PETANI / PEKEBUN" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                            </div>
                        </div>

                        <!-- ALAMAT PELAPOR -->
                        <div class="space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200 text-xs font-bold">
                            <label class="block text-slate-800">6. Alamat Pelapor Lengkap</label>
                            
                            <div>
                                <textarea name="alamat_pelapor" rows="2" placeholder="Dusun / Jalan Alamat Pelapor..." class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-semibold uppercase"></textarea>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">a. Desa / Kelurahan</label>
                                    <input type="text" name="desa_pelapor" value="{{ old('desa_pelapor', 'LUBUK MANDIAN GAJAH') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">b. Kecamatan</label>
                                    <input type="text" name="kec_pelapor" value="{{ old('kec_pelapor', 'BUNUT') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">c. Kab / Kota</label>
                                    <input type="text" name="kab_pelapor" value="{{ old('kab_pelapor', 'PELALAWAN') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">d. Provinsi</label>
                                    <input type="text" name="prov_pelapor" value="{{ old('prov_pelapor', 'RIAU') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEKSI 5: DATA SAKSI I & SAKSI II -->
                    <div class="space-y-6 pt-4 border-t-2 border-slate-300">
                        <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase border-b-2 border-[#235832] pb-1">
                            5. DATA SAKSI I & SAKSI II
                        </h4>

                        <!-- SAKSI I -->
                        <div class="space-y-4 bg-slate-50 p-4 rounded-xl border border-slate-200">
                            <h5 class="text-xs font-black text-slate-900 uppercase">SAKSI I</h5>

                            <!-- NIK SAKSI 1 16 KOTAK -->
                            <div class="space-y-1.5 text-xs font-bold">
                                <label class="block text-slate-800">1. NIK Saksi I (16 Digit)</label>
                                <input type="hidden" name="nik_saksi1" :value="nikSaksi1Str">
                                
                                <div class="flex flex-wrap gap-1">
                                    <template x-for="(digit, idx) in 16" :key="'nik_s1_'+idx">
                                        <input type="text" maxlength="1" 
                                               x-model="nikSaksi1[idx]"
                                               @input="handleDigitInput($event, idx, nikSaksi1, 'nik_s1_')"
                                               @keydown.backspace="handleBackspace($event, idx, nikSaksi1, 'nik_s1_')"
                                               @paste="handlePaste($event, nikSaksi1, 16)"
                                               :id="'nik_s1_'+idx"
                                               class="w-7 h-9 text-center font-mono font-black text-sm border-2 border-slate-400 rounded-md focus:border-[#235832] focus:ring-0 uppercase bg-white">
                                    </template>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs font-bold">
                                <div class="sm:col-span-2">
                                    <label class="block text-slate-800 mb-1">2. Nama Lengkap Saksi I</label>
                                    <input type="text" name="nama_saksi1" value="{{ old('nama_saksi1') }}" placeholder="Nama Lengkap Saksi I" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                                </div>
                                <div>
                                    <label class="block text-slate-800 mb-1">3. Umur (Tahun)</label>
                                    <input type="number" name="umur_saksi1" value="{{ old('umur_saksi1') }}" placeholder="40" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-mono font-bold">
                                </div>
                                <div class="sm:col-span-3">
                                    <label class="block text-slate-800 mb-1">4. Pekerjaan Saksi I</label>
                                    <input type="text" name="pekerjaan_saksi1" value="{{ old('pekerjaan_saksi1') }}" placeholder="Pekerjaan Saksi I" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                </div>
                            </div>

                            <div class="space-y-2 text-xs font-bold">
                                <label class="block text-slate-800">5. Alamat Saksi I</label>
                                <textarea name="alamat_saksi1" rows="1" placeholder="Dusun / Jalan Saksi I..." class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-semibold uppercase"></textarea>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">a. Desa / Kelurahan</label>
                                        <input type="text" name="desa_saksi1" value="{{ old('desa_saksi1', 'LUBUK MANDIAN GAJAH') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">b. Kecamatan</label>
                                        <input type="text" name="kec_saksi1" value="{{ old('kec_saksi1', 'BUNUT') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">c. Kab / Kota</label>
                                        <input type="text" name="kab_saksi1" value="{{ old('kab_saksi1', 'PELALAWAN') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">d. Provinsi</label>
                                        <input type="text" name="prov_saksi1" value="{{ old('prov_saksi1', 'RIAU') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SAKSI II -->
                        <div class="space-y-4 bg-slate-50 p-4 rounded-xl border border-slate-200">
                            <h5 class="text-xs font-black text-slate-900 uppercase">SAKSI II</h5>

                            <!-- NIK SAKSI 2 16 KOTAK -->
                            <div class="space-y-1.5 text-xs font-bold">
                                <label class="block text-slate-800">1. NIK Saksi II (16 Digit)</label>
                                <input type="hidden" name="nik_saksi2" :value="nikSaksi2Str">
                                
                                <div class="flex flex-wrap gap-1">
                                    <template x-for="(digit, idx) in 16" :key="'nik_s2_'+idx">
                                        <input type="text" maxlength="1" 
                                               x-model="nikSaksi2[idx]"
                                               @input="handleDigitInput($event, idx, nikSaksi2, 'nik_s2_')"
                                               @keydown.backspace="handleBackspace($event, idx, nikSaksi2, 'nik_s2_')"
                                               @paste="handlePaste($event, nikSaksi2, 16)"
                                               :id="'nik_s2_'+idx"
                                               class="w-7 h-9 text-center font-mono font-black text-sm border-2 border-slate-400 rounded-md focus:border-[#235832] focus:ring-0 uppercase bg-white">
                                    </template>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs font-bold">
                                <div class="sm:col-span-2">
                                    <label class="block text-slate-800 mb-1">2. Nama Lengkap Saksi II</label>
                                    <input type="text" name="nama_saksi2" value="{{ old('nama_saksi2') }}" placeholder="Nama Lengkap Saksi II" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                                </div>
                                <div>
                                    <label class="block text-slate-800 mb-1">3. Umur (Tahun)</label>
                                    <input type="number" name="umur_saksi2" value="{{ old('umur_saksi2') }}" placeholder="45" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-mono font-bold">
                                </div>
                                <div class="sm:col-span-3">
                                    <label class="block text-slate-800 mb-1">4. Pekerjaan Saksi II</label>
                                    <input type="text" name="pekerjaan_saksi2" value="{{ old('pekerjaan_saksi2') }}" placeholder="Pekerjaan Saksi II" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                </div>
                            </div>

                            <div class="space-y-2 text-xs font-bold">
                                <label class="block text-slate-800">5. Alamat Saksi II</label>
                                <textarea name="alamat_saksi2" rows="1" placeholder="Dusun / Jalan Saksi II..." class="w-full px-3.5 py-2 rounded-xl border border-slate-300 font-semibold uppercase"></textarea>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">a. Desa / Kelurahan</label>
                                        <input type="text" name="desa_saksi2" value="{{ old('desa_saksi2', 'LUBUK MANDIAN GAJAH') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">b. Kecamatan</label>
                                        <input type="text" name="kec_saksi2" value="{{ old('kec_saksi2', 'BUNUT') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">c. Kab / Kota</label>
                                        <input type="text" name="kab_saksi2" value="{{ old('kab_saksi2', 'PELALAWAN') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">d. Provinsi</label>
                                        <input type="text" name="prov_saksi2" value="{{ old('prov_saksi2', 'RIAU') }}" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 font-semibold uppercase">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL SUBMIT BIRU -->
                    <div class="pt-6 border-t-2 border-slate-200 flex justify-center">
                        <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-[#0284c7] hover:bg-[#0369a1] text-white font-black text-sm tracking-wider uppercase rounded-2xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center space-x-2">
                            <span>SIMPAN KE ARSIP & CETAK FORM F-2.01</span>
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <!-- ALPINE.JS LOGIC FOR DIGIT BOXES -->
    <script>
        function f201Form() {
            return {
                noKk: Array(16).fill(''),
                nikIbu: Array(16).fill(''),
                nikAyah: Array(16).fill(''),
                nikPelapor: Array(16).fill(''),
                nikSaksi1: Array(16).fill(''),
                nikSaksi2: Array(16).fill(''),

                get noKkStr() { return this.noKk.join(''); },
                get nikIbuStr() { return this.nikIbu.join(''); },
                get nikAyahStr() { return this.nikAyah.join(''); },
                get nikPelaporStr() { return this.nikPelapor.join(''); },
                get nikSaksi1Str() { return this.nikSaksi1.join(''); },
                get nikSaksi2Str() { return this.nikSaksi2.join(''); },

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
                }
            }
        }
    </script>
</x-app-layout>
