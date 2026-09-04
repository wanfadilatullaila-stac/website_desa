<x-app-layout>
    <x-slot name="header">
        <div class="hidden"></div>
    </x-slot>

    <!-- HEADER RESMI DESA PRESISI FIGMA (HIJAU DESA #235832) -->
    <div class="bg-[#235832] text-white shadow-lg border-b-4 border-emerald-800">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
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

    <div class="py-8 bg-slate-100 min-h-screen" x-data="f101Form()">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 space-y-6">

            <!-- FORM CONTAINER PRESISI F-1.01 -->
            <form action="{{ route('surat.f101.store') }}" method="POST" id="formF101" class="bg-white shadow-xl rounded-2xl border border-slate-200 overflow-hidden">
                @csrf

                <!-- SEKSI HEADER DOKUMEN -->
                <div class="bg-slate-200/90 py-3.5 px-6 border-b border-slate-300 flex flex-col sm:flex-row items-center justify-between gap-2">
                    <div>
                        <h2 class="text-lg font-black text-slate-800 tracking-wider uppercase">FORMULIR ISIAN BIODATA PENDUDUK UNTUK WNI (PER KELUARGA)</h2>
                        <p class="text-xs font-bold text-slate-600">DOKUMEN RESMI DISDUKCAPIL KABUPATEN PELALAWAN</p>
                    </div>
                    <div class="border-2 border-slate-800 px-3 py-1 bg-white font-mono font-black text-sm text-slate-900 rounded-md shrink-0">
                        Kode: F-1.01
                    </div>
                </div>

                <div class="p-6 space-y-6">

                    @if ($errors->any())
                        <div class="p-4 mb-4 bg-red-100 border border-red-400 text-red-700 rounded-xl text-xs">
                            <p class="font-bold">Mohon periksa isian formulir berikut:</p>
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
                               placeholder="Contoh: 470/LMG-F101/IX/001/2026">
                    </div>

                    <!-- CARD 1: DATA KEPALA KELUARGA & ALAMAT -->
                    <div class="space-y-4 bg-slate-50 p-5 rounded-2xl border border-slate-200 text-xs font-bold text-slate-700">
                        <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase border-b-2 border-[#235832] pb-1 flex items-center justify-between">
                            <span>CARD 1: DATA KEPALA KELUARGA & ALAMAT</span>
                            <span class="text-[10px] text-slate-500 font-normal">Identitas Alamat Penduduk</span>
                        </h4>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="sm:col-span-2">
                                <label class="block mb-1 text-slate-800 uppercase">Nama Kepala Keluarga <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_kepala_keluarga" value="{{ old('nama_kepala_keluarga') }}" required placeholder="Contoh: AHMAD SUBARI" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-900 font-extrabold uppercase">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block mb-1 text-slate-800 uppercase">Alamat Keluarga Lengkap <span class="text-red-500">*</span></label>
                                <textarea name="alamat_keluarga" rows="2" required placeholder="Contoh: Dusun I Sukajadi, RT 002 RW 001" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-[#235832] text-slate-900 font-bold uppercase">{{ old('alamat_keluarga') }}</textarea>
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">RT (3 Digit)</label>
                                <input type="text" maxlength="3" name="rt" value="{{ old('rt', '001') }}" placeholder="001" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-mono font-bold text-slate-900">
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">RW (3 Digit)</label>
                                <input type="text" maxlength="3" name="rw" value="{{ old('rw', '001') }}" placeholder="001" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-mono font-bold text-slate-900">
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Dusun / Dukuh / Kampung</label>
                                <input type="text" name="dusun_dukuh_kampung" value="{{ old('dusun_dukuh_kampung') }}" placeholder="Contoh: DUSUN I SUKAJADI" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-bold text-slate-900 uppercase">
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Kode Pos (5 Digit)</label>
                                <input type="text" maxlength="5" name="kode_pos" value="{{ old('kode_pos', '28382') }}" placeholder="28382" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-mono font-bold text-slate-900">
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Telepon / HP</label>
                                <input type="text" name="telepon" value="{{ old('telepon') }}" placeholder="Contoh: 081234567890" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-mono font-bold text-slate-900">
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Jumlah Anggota Keluarga</label>
                                <input type="number" min="1" max="10" name="jumlah_anggota_keluarga" :value="anggota.length" readonly class="w-full px-3.5 py-2 rounded-xl border border-slate-300 bg-slate-200/60 font-mono font-black text-slate-900">
                            </div>
                        </div>
                    </div>

                    <!-- CARD 2: KODE & WILAYAH PEMERINTAHAN -->
                    <div class="space-y-4 bg-slate-50 p-5 rounded-2xl border border-slate-200 text-xs font-bold text-slate-700">
                        <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase border-b-2 border-[#235832] pb-1 flex items-center justify-between">
                            <span>CARD 2: KODE & WILAYAH PEMERINTAHAN</span>
                            <span class="text-[10px] text-slate-500 font-normal">Data Wilayah Administrasi</span>
                        </h4>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Kode & Nama Provinsi</label>
                                <div class="flex gap-2">
                                    <input type="text" name="kode_provinsi" value="{{ old('kode_provinsi', '14') }}" class="w-16 px-2.5 py-2 rounded-xl border border-slate-300 font-mono font-bold uppercase text-center">
                                    <input type="text" name="nama_provinsi" value="{{ old('nama_provinsi', 'RIAU') }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                </div>
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Kode & Nama Kabupaten</label>
                                <div class="flex gap-2">
                                    <input type="text" name="kode_kabupaten" value="{{ old('kode_kabupaten', '04') }}" class="w-16 px-2.5 py-2 rounded-xl border border-slate-300 font-mono font-bold uppercase text-center">
                                    <input type="text" name="nama_kabupaten" value="{{ old('nama_kabupaten', 'PELALAWAN') }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                </div>
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Kode & Nama Kecamatan</label>
                                <div class="flex gap-2">
                                    <input type="text" name="kode_kecamatan" value="{{ old('kode_kecamatan', '06') }}" class="w-16 px-2.5 py-2 rounded-xl border border-slate-300 font-mono font-bold uppercase text-center">
                                    <input type="text" name="nama_kecamatan" value="{{ old('nama_kecamatan', 'BUNUT') }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                </div>
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Kode & Nama Desa/Kel.</label>
                                <div class="flex gap-2">
                                    <input type="text" name="kode_desa" value="{{ old('kode_desa', '2005') }}" class="w-20 px-2.5 py-2 rounded-xl border border-slate-300 font-mono font-bold uppercase text-center">
                                    <input type="text" name="nama_desa" value="{{ old('nama_desa', 'LUBUK MANDIAN GAJAH') }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARD 3: DYNAMIC TABLE ANGGOTA KELUARGA (MATRIKS DISDUKCAPIL 30 KOLOM) -->
                    <div class="space-y-4 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b-2 border-[#235832] pb-2">
                            <div>
                                <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase">
                                    CARD 3: DATA ANGGOTA KELUARGA (KOLOM 1 S/D 30 MATRIKS DISDUKCAPIL)
                                </h4>
                                <p class="text-xs text-slate-500 font-medium">Bisa menambah 1 s/d 10 anggota keluarga secara interaktif.</p>
                            </div>
                            <button type="button" @click="tambahAnggota()" x-show="anggota.length < 10" class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#235832] hover:bg-[#1b4527] text-white text-xs font-bold rounded-xl transition-all shadow-xs shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>+ Tambah Anggota Keluarga</span>
                            </button>
                        </div>

                        <!-- LOOP LIST ANGGOTA KELUARGA -->
                        <div class="space-y-4">
                            <template x-for="(item, idx) in anggota" :key="idx">
                                <div class="bg-white p-4 sm:p-5 rounded-2xl border-2 border-slate-200 space-y-4 shadow-xs relative">
                                    
                                    <!-- ROW TITLE & ACTION -->
                                    <div class="flex items-center justify-between border-b border-slate-200 pb-2">
                                        <div class="flex items-center space-x-2">
                                            <span class="w-7 h-7 bg-[#235832] text-white font-black text-xs rounded-full flex items-center justify-center font-mono" x-text="idx + 1"></span>
                                            <h5 class="font-extrabold text-sm text-slate-900 uppercase" x-text="item.nama_lengkap ? item.nama_lengkap : 'Anggota Keluarga Ke-' + (idx + 1)"></h5>
                                        </div>

                                        <button type="button" @click="hapusAnggota(idx)" x-show="anggota.length > 1" class="px-2.5 py-1 text-xs font-bold text-red-600 hover:bg-red-50 rounded-lg border border-red-200 transition-all">
                                            Hapus Baris
                                        </button>
                                    </div>

                                    <!-- FORM GRID 30 KOLOM DISDUKCAPIL PER ANGGOTA -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 text-xs font-bold text-slate-700">
                                        
                                        <!-- BAGIAN I: IDENTITAS & PASPOR -->
                                        <div class="lg:col-span-3 bg-emerald-50/60 p-2.5 rounded-xl border border-emerald-200/80 text-[11px] text-emerald-900 font-extrabold uppercase tracking-wide">
                                            [Bagian I] Nama, NIK, Alamat Sebelum, & Paspor
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label class="block mb-1">2. Nama Lengkap <span class="text-red-500">*</span></label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][nama_lengkap]'" x-model="item.nama_lengkap" required placeholder="Contoh: AHMAD SUBARI" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-extrabold uppercase focus:border-[#235832]">
                                        </div>

                                        <div>
                                            <label class="block mb-1">3. Nomor KTP / NIK (16 Digit) <span class="text-red-500">*</span></label>
                                            <input type="text" maxlength="16" :name="'anggota_keluarga['+idx+'][nomor_ktp_nik]'" x-model="item.nomor_ktp_nik" required placeholder="16 Digit NIK" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono font-bold focus:border-[#235832]">
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label class="block mb-1">4. Alamat Sebelumnya</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][alamat_sebelumnya]'" x-model="item.alamat_sebelumnya" placeholder="Alamat asal sebelum buat/pindah KK" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-medium uppercase">
                                        </div>

                                        <div>
                                            <label class="block mb-1">5. Nomor Paspor</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][nomor_paspor]'" x-model="item.nomor_paspor" placeholder="A1234567" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono uppercase">
                                        </div>

                                        <div>
                                            <label class="block mb-1">6. Tgl Berakhir Paspor</label>
                                            <input type="date" :name="'anggota_keluarga['+idx+'][tgl_berakhir_paspor]'" x-model="item.tgl_berakhir_paspor" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-semibold">
                                        </div>

                                        <!-- BAGIAN II: LAHIR, AGAMA, PERKAWINAN & PERCERAAN -->
                                        <div class="lg:col-span-3 bg-blue-50/60 p-2.5 rounded-xl border border-blue-200/80 text-[11px] text-blue-900 font-extrabold uppercase tracking-wide mt-2">
                                            [Bagian II] Kelahiran, Agama, Status Perkawinan & Perceraian
                                        </div>

                                        <div>
                                            <label class="block mb-1">7. Jenis Kelamin <span class="text-red-500">*</span></label>
                                            <select :name="'anggota_keluarga['+idx+'][jenis_kelamin]'" x-model="item.jenis_kelamin" required class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Laki-Laki">1. Laki-Laki</option>
                                                <option value="2. Perempuan">2. Perempuan</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">8. Tempat Lahir</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][tempat_lahir]'" x-model="item.tempat_lahir" placeholder="Contoh: PELALAWAN" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                        </div>

                                        <div>
                                            <label class="block mb-1">9. Tanggal Lahir</label>
                                            <input type="date" :name="'anggota_keluarga['+idx+'][tgl_lahir]'" x-model="item.tgl_lahir" @change="hitungUmur(idx)" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-semibold">
                                        </div>

                                        <div>
                                            <label class="block mb-1">10. Umur (Tahun)</label>
                                            <input type="number" :name="'anggota_keluarga['+idx+'][umur]'" x-model="item.umur" placeholder="30" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono font-bold">
                                        </div>

                                        <div>
                                            <label class="block mb-1">11. Akta Lahir</label>
                                            <select :name="'anggota_keluarga['+idx+'][akta_lahir]'" x-model="item.akta_lahir" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Tidak Ada">1. Tidak Ada</option>
                                                <option value="2. Ada">2. Ada</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">12. No Akta Lahir</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][no_akta_lahir]'" x-model="item.no_akta_lahir" placeholder="No Surat Akta" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono uppercase">
                                        </div>

                                        <div>
                                            <label class="block mb-1">13. Gol. Darah</label>
                                            <select :name="'anggota_keluarga['+idx+'][gol_darah]'" x-model="item.gol_darah" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. A">1. A</option>
                                                <option value="2. B">2. B</option>
                                                <option value="3. AB">3. AB</option>
                                                <option value="4. O">4. O</option>
                                                <option value="5. A+">5. A+</option>
                                                <option value="6. A-">6. A-</option>
                                                <option value="7. B+">7. B+</option>
                                                <option value="8. B-">8. B-</option>
                                                <option value="9. AB+">9. AB+</option>
                                                <option value="10. AB-">10. AB-</option>
                                                <option value="11. O+">11. O+</option>
                                                <option value="12. O-">12. O-</option>
                                                <option value="13. Tidak Tahu" selected>13. Tidak Tahu</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">14. Agama</label>
                                            <select :name="'anggota_keluarga['+idx+'][agama]'" x-model="item.agama" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Islam" selected>1. Islam</option>
                                                <option value="2. Kristen">2. Kristen</option>
                                                <option value="3. Katholik">3. Katholik</option>
                                                <option value="4. Hindu">4. Hindu</option>
                                                <option value="5. Budha">5. Budha</option>
                                                <option value="6. Khonghucu">6. Khonghucu</option>
                                                <option value="7. Kepercayaan Lain">7. Kepercayaan Lain</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">15. Status Perkawinan</label>
                                            <select :name="'anggota_keluarga['+idx+'][status_perkawinan]'" x-model="item.status_perkawinan" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Belum Kawin">1. Belum Kawin</option>
                                                <option value="2. Kawin">2. Kawin</option>
                                                <option value="3. Cerai Hidup">3. Cerai Hidup</option>
                                                <option value="4. Cerai Mati">4. Cerai Mati</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">16. Akta Perkawinan</label>
                                            <select :name="'anggota_keluarga['+idx+'][akta_perkawinan]'" x-model="item.akta_perkawinan" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Tidak Ada">1. Tidak Ada</option>
                                                <option value="2. Ada">2. Ada</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">17. No Akta Perkawinan</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][no_akta_perkawinan]'" x-model="item.no_akta_perkawinan" placeholder="No Buku Nikah/Akta" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono uppercase">
                                        </div>

                                        <div>
                                            <label class="block mb-1">18. Tgl Perkawinan</label>
                                            <input type="date" :name="'anggota_keluarga['+idx+'][tgl_perkawinan]'" x-model="item.tgl_perkawinan" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-semibold">
                                        </div>

                                        <div>
                                            <label class="block mb-1">19. Akta Cerai</label>
                                            <select :name="'anggota_keluarga['+idx+'][akta_cerai]'" x-model="item.akta_cerai" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Tidak Ada" selected>1. Tidak Ada</option>
                                                <option value="2. Ada">2. Ada</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">20. No Akta Cerai</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][no_akta_cerai]'" x-model="item.no_akta_cerai" placeholder="No Akta Perceraian" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono uppercase">
                                        </div>

                                        <div>
                                            <label class="block mb-1">21. Tgl Perceraian</label>
                                            <input type="date" :name="'anggota_keluarga['+idx+'][tgl_perceraian]'" x-model="item.tgl_perceraian" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-semibold">
                                        </div>

                                        <!-- BAGIAN III: SHDK, PENDIDIKAN, PEKERJAAN, KECACATAN & ORANG TUA -->
                                        <div class="lg:col-span-3 bg-purple-50/60 p-2.5 rounded-xl border border-purple-200/80 text-[11px] text-purple-900 font-extrabold uppercase tracking-wide mt-2">
                                            [Bagian III] SHDK, Pendidikan, Pekerjaan, Cacat, NIK & Nama Orang Tua
                                        </div>

                                        <div>
                                            <label class="block mb-1">22. Status Hub. Dlm Keluarga (SHDK) <span class="text-red-500">*</span></label>
                                            <select :name="'anggota_keluarga['+idx+'][shdk]'" x-model="item.shdk" required class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Kepala Keluarga">1. Kepala Keluarga</option>
                                                <option value="2. Suami">2. Suami</option>
                                                <option value="3. Istri">3. Istri</option>
                                                <option value="4. Anak">4. Anak</option>
                                                <option value="5. Menantu">5. Menantu</option>
                                                <option value="6. Cucu">6. Cucu</option>
                                                <option value="7. Orangtua">7. Orangtua</option>
                                                <option value="8. Mertua">8. Mertua</option>
                                                <option value="9. Famili Lain">9. Famili Lain</option>
                                                <option value="10. Pembantu">10. Pembantu</option>
                                                <option value="11. Lainnya">11. Lainnya</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">23. Kelainan Fisik & Mental</label>
                                            <select :name="'anggota_keluarga['+idx+'][kelainan_fisik_mental]'" x-model="item.kelainan_fisik_mental" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Tidak Ada" selected>1. Tidak Ada</option>
                                                <option value="2. Ada">2. Ada</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">24. Penyandang Cacat</label>
                                            <select :name="'anggota_keluarga['+idx+'][penyandang_cacat]'" x-model="item.penyandang_cacat" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Tidak Cacat" selected>1. Tidak Cacat</option>
                                                <option value="2. Cacat Fisik">2. Cacat Fisik</option>
                                                <option value="3. Cacat Netra/Kebutaan">3. Cacat Netra/Kebutaan</option>
                                                <option value="4. Cacat Rungu/Wicara">4. Cacat Rungu/Wicara</option>
                                                <option value="5. Cacat Mental/Jiwa">5. Cacat Mental/Jiwa</option>
                                                <option value="6. Cacat Fisik & Mental">6. Cacat Fisik & Mental</option>
                                                <option value="7. Cacat Lainnya">7. Cacat Lainnya</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-1">25. Pendidikan Terakhir</label>
                                            <select :name="'anggota_keluarga['+idx+'][pendidikan_terakhir]'" x-model="item.pendidikan_terakhir" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold">
                                                <option value="1. Tidak/Belum Sekolah">1. Tidak/Belum Sekolah</option>
                                                <option value="2. Belum Tamat SD/Sederajat">2. Belum Tamat SD/Sederajat</option>
                                                <option value="3. Tamat SD/Sederajat">3. Tamat SD/Sederajat</option>
                                                <option value="4. SLTP/Sederajat">4. SLTP/Sederajat</option>
                                                <option value="5. SLTA/Sederajat" selected>5. SLTA/Sederajat</option>
                                                <option value="6. Diploma I/II">6. Diploma I/II</option>
                                                <option value="7. Akademi/Diploma III/S. Muda">7. Akademi/Diploma III/S. Muda</option>
                                                <option value="8. Diploma IV/Strata I">8. Diploma IV/Strata I</option>
                                                <option value="9. Strata II">9. Strata II</option>
                                                <option value="10. Strata III">10. Strata III</option>
                                            </select>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label class="block mb-1">26. Pekerjaan</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][pekerjaan]'" x-model="item.pekerjaan" placeholder="Contoh: PETANI / PEKEBUN" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                        </div>

                                        <div>
                                            <label class="block mb-1">27. NIK Ibu (16 Digit)</label>
                                            <input type="text" maxlength="16" :name="'anggota_keluarga['+idx+'][nik_ibu]'" x-model="item.nik_ibu" placeholder="NIK Ibu" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono">
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label class="block mb-1">28. Nama Lengkap Ibu</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][nama_lengkap_ibu]'" x-model="item.nama_lengkap_ibu" placeholder="Nama Ibu Kandung" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                        </div>

                                        <div>
                                            <label class="block mb-1">29. NIK Ayah (16 Digit)</label>
                                            <input type="text" maxlength="16" :name="'anggota_keluarga['+idx+'][nik_ayah]'" x-model="item.nik_ayah" placeholder="NIK Ayah" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-mono">
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label class="block mb-1">30. Nama Lengkap Ayah</label>
                                            <input type="text" :name="'anggota_keluarga['+idx+'][nama_lengkap_ayah]'" x-model="item.nama_lengkap_ayah" placeholder="Nama Ayah Kandung" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold uppercase">
                                        </div>

                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- CARD 4: PENGESAHAN & TANDA TANGAN -->
                    <div class="space-y-4 bg-slate-50 p-5 rounded-2xl border border-slate-200 text-xs font-bold text-slate-700">
                        <h4 class="text-sm font-black text-[#235832] tracking-wider uppercase border-b-2 border-[#235832] pb-1 flex items-center justify-between">
                            <span>CARD 4: TANDA TANGAN & PENGESAHAN</span>
                            <span class="text-[10px] text-slate-500 font-normal">Nama Petugas & Pengesahan RT/RW</span>
                        </h4>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Nama Ketua RT</label>
                                <input type="text" name="nama_ketua_rt" value="{{ old('nama_ketua_rt') }}" placeholder="Nama Ketua RT" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Nama Ketua RW</label>
                                <input type="text" name="nama_ketua_rw" value="{{ old('nama_ketua_rw') }}" placeholder="Nama Ketua RW" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                            </div>

                            <div>
                                <label class="block mb-1 text-slate-800 uppercase">Petugas Registrasi Desa</label>
                                <input type="text" name="nama_petugas_registrasi" value="{{ old('nama_petugas_registrasi', Auth::user()->name ?? 'PETUGAS DESA') }}" placeholder="Nama Petugas Registrasi" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 focus:border-[#235832] font-extrabold uppercase">
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL SUBMIT BIRU -->
                    <div class="pt-6 border-t-2 border-slate-200 flex justify-center">
                        <button type="submit" class="w-full sm:w-auto px-10 py-4 bg-[#0284c7] hover:bg-[#0369a1] text-white font-black text-sm tracking-wider uppercase rounded-2xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            <span>SIMPAN KE ARSIP & CETAK FORMULIR F-1.01</span>
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <!-- ALPINE.JS DYNAMIC FORM LOGIC -->
    <script>
        function f101Form() {
            return {
                anggota: [
                    {
                        nama_lengkap: '',
                        nomor_ktp_nik: '',
                        alamat_sebelumnya: '',
                        nomor_paspor: '',
                        tgl_berakhir_paspor: '',
                        jenis_kelamin: '1. Laki-Laki',
                        tempat_lahir: 'PELALAWAN',
                        tgl_lahir: '',
                        umur: '',
                        akta_lahir: '1. Tidak Ada',
                        no_akta_lahir: '',
                        gol_darah: '13. Tidak Tahu',
                        agama: '1. Islam',
                        status_perkawinan: '1. Belum Kawin',
                        akta_perkawinan: '1. Tidak Ada',
                        no_akta_perkawinan: '',
                        tgl_perkawinan: '',
                        akta_cerai: '1. Tidak Ada',
                        no_akta_cerai: '',
                        tgl_perceraian: '',
                        shdk: '1. Kepala Keluarga',
                        kelainan_fisik_mental: '1. Tidak Ada',
                        penyandang_cacat: '1. Tidak Cacat',
                        pendidikan_terakhir: '5. SLTA/Sederajat',
                        pekerjaan: 'PETANI / PEKEBUN',
                        nik_ibu: '',
                        nama_lengkap_ibu: '',
                        nik_ayah: '',
                        nama_lengkap_ayah: ''
                    }
                ],

                tambahAnggota() {
                    if (this.anggota.length < 10) {
                        this.anggota.push({
                            nama_lengkap: '',
                            nomor_ktp_nik: '',
                            alamat_sebelumnya: '',
                            nomor_paspor: '',
                            tgl_berakhir_paspor: '',
                            jenis_kelamin: '1. Laki-Laki',
                            tempat_lahir: 'PELALAWAN',
                            tgl_lahir: '',
                            umur: '',
                            akta_lahir: '1. Tidak Ada',
                            no_akta_lahir: '',
                            gol_darah: '13. Tidak Tahu',
                            agama: '1. Islam',
                            status_perkawinan: '1. Belum Kawin',
                            akta_perkawinan: '1. Tidak Ada',
                            no_akta_perkawinan: '',
                            tgl_perkawinan: '',
                            akta_cerai: '1. Tidak Ada',
                            no_akta_cerai: '',
                            tgl_perceraian: '',
                            shdk: this.anggota.length === 1 ? '3. Istri' : '4. Anak',
                            kelainan_fisik_mental: '1. Tidak Ada',
                            penyandang_cacat: '1. Tidak Cacat',
                            pendidikan_terakhir: '5. SLTA/Sederajat',
                            pekerjaan: '',
                            nik_ibu: '',
                            nama_lengkap_ibu: '',
                            nik_ayah: '',
                            nama_lengkap_ayah: ''
                        });
                    }
                },

                hapusAnggota(idx) {
                    if (this.anggota.length > 1) {
                        this.anggota.splice(idx, 1);
                    }
                },

                hitungUmur(idx) {
                    const tgl = this.anggota[idx].tgl_lahir;
                    if (tgl) {
                        const birth = new Date(tgl);
                        const today = new Date();
                        let age = today.getFullYear() - birth.getFullYear();
                        const m = today.getMonth() - birth.getMonth();
                        if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) {
                            age--;
                        }
                        this.anggota[idx].umur = age >= 0 ? age : 0;
                    }
                }
            }
        }
    </script>
</x-app-layout>
