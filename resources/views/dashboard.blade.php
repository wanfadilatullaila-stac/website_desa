<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center shrink-0">
                    <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Pelalawan" class="w-full h-full object-contain">
                </div>
                <div>
                    <h2 class="font-extrabold text-xl sm:text-2xl text-slate-800 leading-tight">
                        Panel Administrasi & Pengelolaan Desa
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium mt-0.5">
                        Pemerintah Desa Lubuk Mandian Gajah, Kecamatan Bunut
                    </p>
                </div>
            </div>

            <!-- Quick Navigation & Logout Bar -->
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}" class="inline-flex items-center space-x-1.5 text-xs font-bold text-[#235832] bg-emerald-50 hover:bg-emerald-100 border border-emerald-200/80 px-3.5 py-2 rounded-xl transition-all shadow-2xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="hidden sm:inline">Lihat Website Utama</span>
                </a>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 px-4 py-2 text-xs font-semibold text-red-600 bg-red-50 hover:bg-red-100 rounded-xl transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-slate-50 min-h-screen" x-data="dashboardAdmin()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- NOTIFIKASI SUCCESS SESSION -->
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" class="p-4 text-xs sm:text-sm text-emerald-900 bg-emerald-100/90 border border-emerald-300 rounded-2xl flex items-center justify-between shadow-xs">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-[#235832]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-extrabold">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="text-emerald-700 hover:text-emerald-900 font-bold text-xs">✕</button>
                </div>
            @endif

            <!-- HEADER BANNER & STATS -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <!-- Banner Admin -->
                <div class="lg:col-span-6 bg-gradient-to-r from-[#235832] to-[#1b4527] rounded-3xl p-6 text-white shadow-md relative overflow-hidden flex flex-col justify-between">
                    <div class="absolute -right-6 -bottom-6 w-44 h-44 bg-emerald-400/10 rounded-full blur-2xl pointer-events-none"></div>
                    
                    <div class="relative z-10 flex items-center space-x-4">
                        <div class="relative flex-shrink-0">
                            <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Pelalawan" class="w-14 h-14 object-contain rounded-full">
                            <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-400 border-2 border-emerald-800 rounded-full"></span>
                        </div>
                        <div>
                            <span class="inline-block px-3 py-0.5 text-[10px] uppercase font-bold tracking-wider bg-white/20 text-emerald-100 rounded-full backdrop-blur-xs">
                                Administrator Desa
                            </span>
                            <h3 class="text-xl sm:text-2xl font-extrabold text-white mt-1">
                                Hallo, {{ Auth::user()->name ?? 'Admin' }}!
                            </h3>
                            <p class="text-xs text-emerald-100/90 mt-1">
                                Sistem Informasi & Pelayanan Administrasi Desa Lubuk Mandian Gajah
                            </p>
                        </div>
                    </div>

                    <div class="relative z-10 mt-6 pt-4 border-t border-white/15 flex items-center justify-between text-xs text-emerald-100">
                        <span class="flex items-center space-x-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="font-semibold">Sistem Siap Pelayanan</span>
                        </span>
                        <span class="font-mono text-white/90 font-bold">{{ date('d M Y') }}</span>
                    </div>
                </div>

                <!-- 3 Quick Stat Cards -->
                <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs flex flex-col justify-between hover:border-emerald-500/40 transition-all">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Pelayanan Surat</span>
                            <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-[#235832] flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-3xl font-black text-slate-900" x-text="stats.suratCount">{{ $totalSurat ?? 0 }}</p>
                            <p class="text-xs text-emerald-700 font-bold mt-0.5">Surat Permohonan Dibuat</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs flex flex-col justify-between hover:border-emerald-500/40 transition-all">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Berkas Kantor</span>
                            <div class="w-10 h-10 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V8zm14 0l-2-4H7L5 8"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-3xl font-black text-slate-900" x-text="stats.arsipCount">{{ $totalBerkas ?? 0 }}</p>
                            <p class="text-xs text-blue-700 font-bold mt-0.5">Dokumen SK / Perdes</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs flex flex-col justify-between hover:border-emerald-500/40 transition-all">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Statistik Warga</span>
                            <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-3xl font-black text-slate-900">2,845</p>
                            <p class="text-xs text-emerald-700 font-bold mt-0.5">Total Jiwa Terdata</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MAIN TAB NAVIGATION (DESAIN CARD NAVIGASI) -->
            <div class="flex overflow-x-auto p-1.5 bg-white rounded-2xl border border-slate-200/80 shadow-xs gap-1.5 scrollbar-none">
                <button @click="activeTab = 'dokumen'" :class="activeTab === 'dokumen' ? 'bg-[#235832] text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100'" class="px-4 py-2.5 rounded-xl font-extrabold text-xs sm:text-sm transition-all whitespace-nowrap flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>Pengurusan Dokumen Warga</span>
                </button>

                <button @click="activeTab = 'konten'" :class="activeTab === 'konten' ? 'bg-[#235832] text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100'" class="px-4 py-2.5 rounded-xl font-extrabold text-xs sm:text-sm transition-all whitespace-nowrap flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Update Konten Website Desa</span>
                </button>

                <button @click="activeTab = 'arsip'" :class="activeTab === 'arsip' ? 'bg-[#235832] text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100'" class="px-4 py-2.5 rounded-xl font-extrabold text-xs sm:text-sm transition-all whitespace-nowrap flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V8zm14 0l-2-4H7L5 8"></path>
                    </svg>
                    <span>Arsip Dokumen Internal</span>
                </button>
            </div>

            <!-- ========================================================= -->
            <!-- TAB 1: MODUL PENGURUSAN DOKUMEN (FIGMA "Pengurusan Dokumen") -->
            <!-- ========================================================= -->
            <div x-show="activeTab === 'dokumen'" class="space-y-6" x-transition:enter="transition ease-out duration-200">
                
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <span class="text-xs uppercase font-bold text-emerald-700 tracking-wider">MODUL PENGURUSAN DOKUMEN</span>
                        <h3 class="text-xl font-extrabold text-slate-900 mt-0.5">Daftar Layanan Dokumen Warga</h3>
                        <p class="text-xs text-slate-500 mt-1">Pilih kartu permohonan di bawah untuk membuka formulir input data pemohon dan mencetak blanko/surat resmi.</p>
                    </div>

                    <!-- GRID 5 KARTU DOKUMEN SESUAI FIGMA "Input Dokumen" -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <!-- 1. Formulir Permohonan Pindah Antar Desa/Kelurahan (Kode: F.1-25) -->
                        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md hover:border-emerald-600/40 transition-all flex flex-col justify-between space-y-4 group relative">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] group-hover:bg-[#235832] group-hover:text-white flex items-center justify-center transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                        </svg>
                                    </div>
                                    <span class="px-2.5 py-1 text-[11px] font-black tracking-wider bg-emerald-50 text-[#235832] border border-emerald-200/80 rounded-xl font-mono">
                                        F.1-25
                                    </span>
                                </div>

                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-[#235832] transition-colors">
                                        Formulir Permohonan Pindah Antar Desa/Kelurahan
                                    </h4>
                                    
                                    <div class="mt-3 space-y-1.5 text-xs text-slate-600 font-medium">
                                        <p class="flex items-center space-x-1.5">
                                            <svg class="w-4 h-4 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Pengurusan Pindah Antar Desa/Kelurahan</span>
                                        </p>
                                        <p class="flex items-center space-x-1.5 text-slate-500">
                                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>Dokumen Resmi Disdukcapil</span>
                                        </p>
                                    </div>

                                    <div class="mt-3 p-3 bg-slate-50 rounded-xl border border-slate-200/60 text-[11px] text-slate-700 italic">
                                        "Blanko permohonan pindah domisili WNI antar desa/kelurahan dalam 1 kec."
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2 pt-2">
                                <a href="{{ route('surat.f125.create') }}" class="w-full bg-[#235832] hover:bg-[#1b4527] text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-xs transition-all flex items-center justify-center space-x-2">
                                    <span>Form Input & Cetak Blangko F.1-25</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                                <a href="{{ url('/dokumen') }}" class="w-full inline-flex justify-center text-[11px] font-bold text-[#235832] hover:underline py-1">
                                    Lihat Persyaratan & Blanko
                                </a>
                            </div>
                        </div>

                        <!-- 2. Formulir Permohonan Pindah Antar Kecamatan (Kode: F.1-29) -->
                        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md hover:border-emerald-600/40 transition-all flex flex-col justify-between space-y-4 group relative">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] group-hover:bg-[#235832] group-hover:text-white flex items-center justify-center transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="px-2.5 py-1 text-[11px] font-black tracking-wider bg-emerald-50 text-[#235832] border border-emerald-200/80 rounded-xl font-mono">
                                        F.1-29
                                    </span>
                                </div>

                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-[#235832] transition-colors">
                                        Formulir Permohonan Pindah Antar Kecamatan
                                    </h4>
                                    
                                    <div class="mt-3 space-y-1.5 text-xs text-slate-600 font-medium">
                                        <p class="flex items-center space-x-1.5">
                                            <svg class="w-4 h-4 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Pengurusan Pindah Antar Kecamatan</span>
                                        </p>
                                        <p class="flex items-center space-x-1.5 text-slate-500">
                                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>Dokumen Resmi Disdukcapil</span>
                                        </p>
                                    </div>

                                    <div class="mt-3 p-3 bg-slate-50 rounded-xl border border-slate-200/60 text-[11px] text-slate-700 italic">
                                        "Blanko surat keterangan pindah domisili WNI antar kecamatan dalam 1 kab."
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2 pt-2">
                                <a href="{{ route('surat.f129.create') }}" class="w-full bg-[#235832] hover:bg-[#1b4527] text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-xs transition-all flex items-center justify-center space-x-2">
                                    <span>Form Input & Cetak Blangko F.1-29</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                                <a href="{{ url('/dokumen') }}" class="w-full inline-flex justify-center text-[11px] font-bold text-[#235832] hover:underline py-1">
                                    Lihat Persyaratan & Blanko
                                </a>
                            </div>
                        </div>

                        <!-- 3. Formulir Permohonan Pindah Antar Kabupaten/Kota (Kode: F.1-34) -->
                        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md hover:border-emerald-600/40 transition-all flex flex-col justify-between space-y-4 group relative">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] group-hover:bg-[#235832] group-hover:text-white flex items-center justify-center transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                    </div>
                                    <span class="px-2.5 py-1 text-[11px] font-black tracking-wider bg-emerald-50 text-[#235832] border border-emerald-200/80 rounded-xl font-mono">
                                        F.1-34
                                    </span>
                                </div>

                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-[#235832] transition-colors">
                                        Formulir Permohonan Pindah Antar Kabupaten/Kota
                                    </h4>
                                    
                                    <div class="mt-3 space-y-1.5 text-xs text-slate-600 font-medium">
                                        <p class="flex items-center space-x-1.5">
                                            <svg class="w-4 h-4 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Pengurusan Pindah Antar Kab/Kota/Provinsi</span>
                                        </p>
                                        <p class="flex items-center space-x-1.5 text-slate-500">
                                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>Dokumen Resmi Disdukcapil</span>
                                        </p>
                                    </div>

                                    <div class="mt-3 p-3 bg-slate-50 rounded-xl border border-slate-200/60 text-[11px] text-slate-700 italic">
                                        "Blanko permohonan kepindahan warga keluar kabupaten / luar provinsi."
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2 pt-2">
                                <a href="{{ route('surat.f134.create') }}" class="w-full bg-[#235832] hover:bg-[#1b4527] text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-xs transition-all flex items-center justify-center space-x-2">
                                    <span>Form Input & Cetak Blangko F.1-34</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                                <a href="{{ url('/dokumen') }}" class="w-full inline-flex justify-center text-[11px] font-bold text-[#235832] hover:underline py-1">
                                    Lihat Persyaratan & Blanko
                                </a>
                            </div>
                        </div>

                        <!-- 4. Surat Keterangan Kelahiran (Kode: F-2.01) -->
                        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md hover:border-emerald-600/40 transition-all flex flex-col justify-between space-y-4 group relative">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] group-hover:bg-[#235832] group-hover:text-white flex items-center justify-center transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="px-2.5 py-1 text-[11px] font-black tracking-wider bg-emerald-50 text-[#235832] border border-emerald-200/80 rounded-xl font-mono">
                                        F-2.01
                                    </span>
                                </div>

                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-[#235832] transition-colors">
                                        Surat Keterangan Kelahiran
                                    </h4>
                                    
                                    <div class="mt-3 space-y-1.5 text-xs text-slate-600 font-medium">
                                        <p class="flex items-center space-x-1.5">
                                            <svg class="w-4 h-4 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Pengurusan Akta Kelahiran Anak Warga</span>
                                        </p>
                                        <p class="flex items-center space-x-1.5 text-slate-500">
                                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>Dokumen Resmi Disdukcapil</span>
                                        </p>
                                    </div>

                                    <div class="mt-3 p-3 bg-slate-50 rounded-xl border border-slate-200/60 text-[11px] text-slate-700 italic">
                                        "Surat keterangan permohonan penerbitan Akta Kelahiran bayi/anak."
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2 pt-2">
                                <a href="{{ route('surat.f201.create') }}" class="w-full bg-[#235832] hover:bg-[#1b4527] text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-xs transition-all flex items-center justify-center space-x-2">
                                    <span>Form Input & Cetak Blangko F-2.01</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                                <a href="{{ url('/dokumen') }}" class="w-full inline-flex justify-center text-[11px] font-bold text-[#235832] hover:underline py-1">
                                    Lihat Persyaratan & Blanko
                                </a>
                            </div>
                        </div>

                        <!-- 5. Formulir Isian Biodata Penduduk / KK (Kode: F-1.01) -->
                        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md hover:border-emerald-600/40 transition-all flex flex-col justify-between space-y-4 group relative">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] group-hover:bg-[#235832] group-hover:text-white flex items-center justify-center transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 012-2h2a2 2 0 012 2v1m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <span class="px-2.5 py-1 text-[11px] font-black tracking-wider bg-emerald-50 text-[#235832] border border-emerald-200/80 rounded-xl font-mono">
                                        F-1.01
                                    </span>
                                </div>

                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-[#235832] transition-colors">
                                        Formulir Isian Biodata Penduduk / KK
                                    </h4>
                                    
                                    <div class="mt-3 space-y-1.5 text-xs text-slate-600 font-medium">
                                        <p class="flex items-center space-x-1.5">
                                            <svg class="w-4 h-4 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Pengurusan Kartu Keluarga & Pecah KK</span>
                                        </p>
                                        <p class="flex items-center space-x-1.5 text-slate-500">
                                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>Dokumen Resmi Disdukcapil</span>
                                        </p>
                                    </div>

                                    <div class="mt-3 p-3 bg-slate-50 rounded-xl border border-slate-200/60 text-[11px] text-slate-700 italic">
                                        "Formulir isian biodata pembaruan Kartu Keluarga (KK) baru / perbaikan."
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2 pt-2">
                                <a href="{{ route('surat.f101.create') }}" class="w-full bg-[#235832] hover:bg-[#1b4527] text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-xs transition-all flex items-center justify-center space-x-2">
                                    <span>Form Input & Cetak Blangko F.1-01 &rarr;</span>
                                </a>
                                <a href="{{ url('/dokumen') }}" class="w-full inline-flex justify-center text-[11px] font-bold text-[#235832] hover:underline py-1">
                                    Lihat Persyaratan & Blanko
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- TABEL RIWAYAT SURAT TERBARU -->
                    <div class="pt-6 border-t border-slate-100 space-y-4">
                        <div class="flex items-center justify-between">
                            <h4 class="font-extrabold text-slate-900 text-base">Riwayat Surat Dibuat</h4>
                            <span class="text-xs text-slate-500 font-medium">Daftar permohonan surat warga terakhir</span>
                        </div>

                        <div class="overflow-x-auto rounded-2xl border border-slate-200/80">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-200/80">
                                    <tr>
                                        <th class="py-3 px-4">Nomor Surat</th>
                                        <th class="py-3 px-4">Nama Pemohon</th>
                                        <th class="py-3 px-4">Jenis Surat</th>
                                        <th class="py-3 px-4">Tanggal Buat</th>
                                        <th class="py-3 px-4 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-medium text-slate-800">
                                    <template x-for="(item, index) in riwayatSurat" :key="index">
                                        <tr class="hover:bg-slate-50/80 transition-colors">
                                            <td class="py-3 px-4 font-mono font-bold text-[#235832]" x-text="item.nomor"></td>
                                            <td class="py-3 px-4 font-extrabold text-slate-900" x-text="item.nama"></td>
                                            <td class="py-3 px-4">
                                                <span class="px-2.5 py-1 bg-emerald-50 text-[#235832] text-[10px] font-bold rounded-lg border border-emerald-200/60" x-text="item.jenis"></span>
                                            </td>
                                            <td class="py-3 px-4 text-slate-500" x-text="item.tanggal"></td>
                                            <td class="py-3 px-4 text-center">
                                                <button @click="reprintSurat(item)" class="px-3 py-1 bg-[#235832] hover:bg-[#1b4527] text-white text-[11px] font-bold rounded-lg transition-all shadow-xs inline-flex items-center space-x-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                                    </svg>
                                                    <span>Cetak Ulang</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ========================================================= -->
            <!-- TAB 2: KELOLA / UPDATE KONTEN WEBSITE (SUB-FRAMES FIGMA)  -->
            <!-- ========================================================= -->
            <div x-show="activeTab === 'konten'" class="space-y-6" x-transition:enter="transition ease-out duration-200">
                
                <!-- NAVIGATION SUB-TAB -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <span class="text-xs uppercase font-bold text-emerald-700 tracking-wider">MODUL KELOLA KONTEN</span>
                        <h3 class="text-xl font-extrabold text-slate-900 mt-0.5">Pengelolaan Informasi Website Desa</h3>
                        <p class="text-xs text-slate-500 mt-1">Pilih sub-menu di bawah untuk memperbarui Profil, Berita, Galeri, Struktur Organisasi, atau Infografis Desa.</p>
                    </div>

                    <!-- Sub Tab Pills -->
                    <div class="flex flex-wrap gap-2">
                        <button @click="kontenTab = 'profil'" :class="kontenTab === 'profil' ? 'bg-[#235832] text-white shadow-xs font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'" class="px-4 py-2 rounded-xl text-xs transition-all">
                            Update Profil Desa
                        </button>
                        <button @click="kontenTab = 'berita'" :class="kontenTab === 'berita' ? 'bg-[#235832] text-white shadow-xs font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'" class="px-4 py-2 rounded-xl text-xs transition-all">
                            Update Berita Desa
                        </button>
                        <button @click="kontenTab = 'galeri'" :class="kontenTab === 'galeri' ? 'bg-[#235832] text-white shadow-xs font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'" class="px-4 py-2 rounded-xl text-xs transition-all">
                            Update Galeri Desa
                        </button>
                        <button @click="kontenTab = 'struktur'" :class="kontenTab === 'struktur' ? 'bg-[#235832] text-white shadow-xs font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'" class="px-4 py-2 rounded-xl text-xs transition-all">
                            Update Struktur Desa
                        </button>
                        <button @click="kontenTab = 'infografis'" :class="kontenTab === 'infografis' ? 'bg-[#235832] text-white shadow-xs font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'" class="px-4 py-2 rounded-xl text-xs transition-all">
                            Update Infografis Desa
                        </button>
                    </div>

                    <!-- ============================================== -->
                    <!-- SUB 1: UPDATE PROFIL DESA (FIGMA "iPhone 16 - 20") -->
                    <!-- ============================================== -->
                    <div x-show="kontenTab === 'profil'" class="pt-2 space-y-6" x-transition:enter="transition ease-out duration-150">
                        <div class="bg-slate-50/80 rounded-2xl p-6 border border-slate-200/80">
                            <h4 class="font-extrabold text-slate-900 text-base mb-4 flex items-center space-x-2">
                                <span class="w-3 h-3 rounded-full bg-[#235832]"></span>
                                <span>Form Update Profil Desa Lubuk Mandian Gajah</span>
                            </h4>

                            <form action="{{ route('admin.update-profil') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                                @csrf
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Foto Kantor / Banner Utama Desa</label>
                                    @if(isset($profil) && $profil->foto_banner)
                                        <div class="mb-3 flex items-center space-x-3 bg-white p-2.5 rounded-xl border border-slate-200">
                                            <img src="{{ asset($profil->foto_banner) }}" alt="Banner Desa" class="w-24 h-14 object-cover rounded-lg shadow-xs">
                                            <div>
                                                <span class="text-xs font-bold text-slate-700 block">Banner Terpasang saat ini</span>
                                                <span class="text-[10px] text-slate-400">Pilih file baru jika ingin mengganti</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="border-2 border-dashed border-slate-300 rounded-2xl p-4 bg-white text-center hover:border-emerald-500 transition-colors">
                                        <input type="file" name="foto_kantor" class="text-xs text-slate-500 mx-auto file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:bg-emerald-100 file:text-[#235832] file:font-bold hover:file:bg-emerald-200">
                                    </div>
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Gambaran Umum & Deskripsi Profil Desa</label>
                                    <textarea name="deskripsi" rows="3" placeholder="Deskripsi profil desa..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">{{ old('deskripsi', $profil->deskripsi_singkat ?? 'Desa Lubuk Mandian Gajah adalah desa berdaya di Kecamatan Bunut, Kabupaten Pelalawan, Provinsi Riau yang kaya akan potensi pertanian dan perkebunan.') }}</textarea>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Visi Desa</label>
                                        <textarea name="visi" rows="3" placeholder="Visi desa..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">{{ old('visi', $profil->visi ?? 'Terwujudnya Desa Lubuk Mandian Gajah yang Maju, Sejahtera, Berkarakter, dan Mandiri.') }}</textarea>
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Misi Desa</label>
                                        <textarea name="misi" rows="3" placeholder="Misi desa..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">{{ old('misi', $profil->misi ?? 'Meningkatkan tata kelola pemerintahan yang transparan, pelayanan publik yang responsif, dan pemberdayaan ekonomi warga.') }}</textarea>
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold rounded-xl shadow-md transition-all flex items-center justify-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>Update Profil Desa</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- ============================================== -->
                    <!-- SUB 2: UPDATE BERITA DESA (FIGMA "iPhone 16 - 23") -->
                    <!-- ============================================== -->
                    <div x-show="kontenTab === 'berita'" x-data="{ editBeritaModal: false, editBerita: {} }" class="pt-2 space-y-6" x-transition:enter="transition ease-out duration-150">
                        <!-- FORM TAMBAH BERITA -->
                        <div class="bg-slate-50/80 rounded-2xl p-6 border border-slate-200/80">
                            <h4 class="font-extrabold text-slate-900 text-base mb-4 flex items-center space-x-2">
                                <span class="w-3 h-3 rounded-full bg-[#235832]"></span>
                                <span>Form Input & Publish Berita Desa</span>
                            </h4>

                            <form action="{{ route('admin.store-berita') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Judul Berita <span class="text-red-500">*</span></label>
                                        <input type="text" name="judul" required placeholder="Contoh: Musrenbangdesa Pembahasan APBD 2026" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Kategori Berita</label>
                                        <select name="kategori" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                            <option value="Pengumuman">Pengumuman Resmi</option>
                                            <option value="Pembangunan">Pembangunan Desa</option>
                                            <option value="Kesehatan">Kesehatan & Posyandu</option>
                                            <option value="Kegiatan">Kegiatan Masyarakat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Penulis / Author</label>
                                        <input type="text" name="penulis" value="Admin Desa" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Tanggal Publikasi</label>
                                        <input type="date" name="tanggal_publikasi" value="{{ date('Y-m-d') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 text-slate-800 font-medium">
                                    </div>
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Input Gambar Thumbnail Berita</label>
                                    <div class="border-2 border-dashed border-slate-300 rounded-2xl p-4 bg-white text-center hover:border-emerald-500 transition-colors">
                                        <input type="file" name="gambar" class="text-xs text-slate-500 mx-auto file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:bg-emerald-100 file:text-[#235832] file:font-bold hover:file:bg-emerald-200">
                                    </div>
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Deskripsi / Isi Berita Desa <span class="text-red-500">*</span></label>
                                    <textarea name="isi" required rows="4" placeholder="Tulis isi berita lengkap di sini..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium"></textarea>
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold rounded-xl shadow-md transition-all flex items-center justify-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        <span>Publish Berita</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- TABEL DAFTAR BERITA -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                            <h4 class="font-extrabold text-slate-900 text-sm uppercase tracking-wider flex items-center justify-between">
                                <span>Daftar Berita Terpublikasi</span>
                                <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">{{ count($beritas ?? []) }} Berita</span>
                            </h4>

                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs text-slate-700">
                                    <thead class="bg-slate-100/80 text-slate-600 font-bold uppercase tracking-wider text-[10px]">
                                        <tr>
                                            <th class="p-3">Thumbnail</th>
                                            <th class="p-3">Judul Berita</th>
                                            <th class="p-3">Kategori</th>
                                            <th class="p-3">Tanggal & Penulis</th>
                                            <th class="p-3 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @forelse($beritas ?? [] as $item)
                                            <tr class="hover:bg-slate-50/80">
                                                <td class="p-3">
                                                    @if($item->gambar)
                                                        <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="w-12 h-12 object-cover rounded-xl border border-slate-200 shadow-2xs">
                                                    @else
                                                        <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-[10px]">No Pic</div>
                                                    @endif
                                                </td>
                                                <td class="p-3 font-bold text-slate-900 max-w-xs truncate">
                                                    {{ $item->judul }}
                                                    <span class="block text-[10px] font-normal text-slate-400 truncate">{{ Str::limit($item->isi_berita, 50) }}</span>
                                                </td>
                                                <td class="p-3">
                                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-[#235832] border border-emerald-200">
                                                        {{ $item->kategori }}
                                                    </span>
                                                </td>
                                                <td class="p-3 text-slate-500 font-medium">
                                                    <div>{{ \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d M Y') }}</div>
                                                    <div class="text-[10px] text-slate-400">Oleh: {{ $item->penulis }}</div>
                                                </td>
                                                <td class="p-3 text-center">
                                                    <div class="flex items-center justify-center space-x-2">
                                                        <button @click="editBeritaModal = true; editBerita = { id: {{ $item->id }}, judul: '{{ addslashes($item->judul) }}', kategori: '{{ addslashes($item->kategori) }}', isi: '{{ addslashes(str_replace(["\r", "\n"], ' ', $item->isi_berita)) }}', penulis: '{{ addslashes($item->penulis) }}', tanggal: '{{ $item->tanggal_publikasi }}' }" class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition-all font-bold" title="Edit Berita">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                        </button>
                                                        <form action="{{ route('admin.destroy-berita', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-xl transition-all font-bold" title="Hapus Berita">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="p-6 text-center text-slate-400 italic">
                                                    Belum ada berita desa yang terpublikasi. Silakan tambah berita pada form di atas.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- MODAL EDIT BERITA -->
                        <div x-show="editBeritaModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4">
                            <div @click.away="editBeritaModal = false" class="bg-white rounded-3xl p-6 w-full max-w-xl shadow-2xl space-y-4 relative text-xs">
                                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                    <h3 class="font-extrabold text-slate-800 text-sm">Edit Data Berita Desa</h3>
                                    <button @click="editBeritaModal = false" class="text-slate-400 hover:text-slate-600 font-bold">✕</button>
                                </div>
                                <form :action="'{{ url('/admin/update-berita') }}/' + editBerita.id" method="POST" enctype="multipart/form-data" class="space-y-3">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Judul Berita</label>
                                        <input type="text" name="judul" x-model="editBerita.judul" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-slate-800 font-medium">
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label class="block font-bold text-slate-700 mb-1">Kategori</label>
                                            <select name="kategori" x-model="editBerita.kategori" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-slate-800 font-medium">
                                                <option value="Pengumuman">Pengumuman Resmi</option>
                                                <option value="Pembangunan">Pembangunan Desa</option>
                                                <option value="Kesehatan">Kesehatan & Posyandu</option>
                                                <option value="Kegiatan">Kegiatan Masyarakat</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block font-bold text-slate-700 mb-1">Tanggal Publikasi</label>
                                            <input type="date" name="tanggal_publikasi" x-model="editBerita.tanggal" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-slate-800 font-medium">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Ganti Gambar (Opsional)</label>
                                        <input type="file" name="gambar" class="w-full text-xs text-slate-500 file:py-1 file:px-3 file:rounded-xl file:border-0 file:bg-emerald-100 file:text-[#235832] file:font-bold">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Isi Berita</label>
                                        <textarea name="isi" x-model="editBerita.isi" rows="4" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-slate-800 font-medium"></textarea>
                                    </div>
                                    <div class="pt-2 flex justify-end space-x-2">
                                        <button type="button" @click="editBeritaModal = false" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl">Batal</button>
                                        <button type="submit" class="px-5 py-2 bg-[#235832] hover:bg-[#1b4527] text-white font-bold rounded-xl shadow-md">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================== -->
                    <!-- SUB 3: UPDATE GALERI DESA (FIGMA "iPhone 16 - 22") -->
                    <!-- ============================================== -->
                    <div x-show="kontenTab === 'galeri'" class="pt-2 space-y-6" x-transition:enter="transition ease-out duration-150">
                        <div class="bg-slate-50/80 rounded-2xl p-6 border border-slate-200/80">
                            <h4 class="font-extrabold text-slate-900 text-base mb-4 flex items-center space-x-2">
                                <span class="w-3 h-3 rounded-full bg-[#235832]"></span>
                                <span>Form Tambah Foto Galeri Desa</span>
                            </h4>

                            @if ($errors->any())
                                <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded-xl text-sm">
                                    <ul class="list-disc pl-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Judul / Nama Kegiatan Foto <span class="text-red-500">*</span></label>
                                        <input type="text" name="judul_kegiatan" required placeholder="Contoh: Gotong Royong Kebersihan Desa" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Tanggal Dokumentasi <span class="text-red-500">*</span></label>
                                        <input type="date" name="tanggal_dokumentasi" value="{{ date('Y-m-d') }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Input Gambar Foto Galeri <span class="text-red-500">*</span></label>
                                    <div class="border-2 border-dashed border-slate-300 rounded-2xl p-4 bg-white text-center hover:border-emerald-500 transition-colors">
                                        <input type="file" name="foto" id="foto" accept="image/*" required class="text-xs text-slate-500 mx-auto file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:bg-emerald-100 file:text-[#235832] file:font-bold hover:file:bg-emerald-200">
                                    </div>
                                    <small class="text-slate-400 text-xs mt-1 block">* Format yang didukung: JPG, PNG, WEBP. Maksimal ukuran file: 15 MB (foto akan dioptimalkan otomatis).</small>
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold rounded-xl shadow-md transition-all flex items-center justify-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Input / Simpan Galeri</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- TABEL DAFTAR GALERI -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                            <h4 class="font-extrabold text-slate-900 text-sm uppercase tracking-wider flex items-center justify-between">
                                <span>Daftar Dokumen Galeri Foto Desa</span>
                                <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">{{ count($galeris ?? []) }} Foto</span>
                            </h4>

                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                                @forelse($galeris ?? [] as $foto)
                                    <div class="bg-slate-50 border border-slate-200 rounded-2xl overflow-hidden shadow-2xs group relative">
                                        <div class="h-32 w-full overflow-hidden relative">
                                            <img src="{{ asset($foto->foto) }}" alt="{{ $foto->judul_kegiatan }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            <div class="absolute top-2 right-2">
                                                <form action="{{ route('admin.destroy-galeri', $foto->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto galeri ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-8 h-8 rounded-full bg-red-600 text-white flex items-center justify-center shadow-md hover:bg-red-700 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="p-3 text-xs">
                                            <h5 class="font-extrabold text-slate-900 truncate">{{ $foto->judul_kegiatan }}</h5>
                                            <p class="text-[10px] text-slate-500 mt-0.5">{{ \Carbon\Carbon::parse($foto->tanggal_kegiatan)->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-span-full p-6 text-center text-slate-400 italic">
                                        Belum ada dokumentasi galeri foto desa.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- ============================================== -->
                    <!-- SUB 4: UPDATE STRUKTUR DESA (FIGMA "iPhone 16 - 24") -->
                    <!-- ============================================== -->
                    <div x-show="kontenTab === 'struktur'" x-data="{ editAparaturModal: false, editAparatur: {} }" class="pt-2 space-y-6" x-transition:enter="transition ease-out duration-150">
                        <div class="bg-slate-50/80 rounded-2xl p-6 border border-slate-200/80">
                            <h4 class="font-extrabold text-slate-900 text-base mb-4 flex items-center space-x-2">
                                <span class="w-3 h-3 rounded-full bg-[#235832]"></span>
                                <span>Form Input Aparatur & Struktur Organisasi Desa</span>
                            </h4>

                            <form action="{{ route('aparatur.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Nama Lengkap Perangkat <span class="text-red-500">*</span></label>
                                        <input type="text" name="nama" required placeholder="Contoh: Muslich, SE" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Jabatan <span class="text-red-500">*</span></label>
                                        <input type="text" name="jabatan" required placeholder="Contoh: Kepala Desa / Sekdes / Kaur Keuangan" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">NIP (Jika Ada)</label>
                                        <input type="text" name="nip" placeholder="Contoh: 19780412 200501 1 004" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Nomor Kontak / WhatsApp</label>
                                        <input type="text" name="kontak" placeholder="Contoh: 0812-3456-7890" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Input Gambar Foto Perangkat</label>
                                    <div class="border-2 border-dashed border-slate-300 rounded-2xl p-4 bg-white text-center hover:border-emerald-500 transition-colors">
                                        <input type="file" name="foto" class="text-xs text-slate-500 mx-auto file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:bg-emerald-100 file:text-[#235832] file:font-bold hover:file:bg-emerald-200">
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold rounded-xl shadow-md transition-all flex items-center justify-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        <span>Update / Simpan Perangkat</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- TABEL DAFTAR APARATUR -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                            <h4 class="font-extrabold text-slate-900 text-sm uppercase tracking-wider flex items-center justify-between">
                                <span>Daftar Aparatur Pemerintah Desa</span>
                                <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">{{ count($aparaturs ?? []) }} Perangkat</span>
                            </h4>

                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs text-slate-700">
                                    <thead class="bg-slate-100/80 text-slate-600 font-bold uppercase tracking-wider text-[10px]">
                                        <tr>
                                            <th class="p-3">Foto</th>
                                            <th class="p-3">Nama Lengkap</th>
                                            <th class="p-3">Jabatan</th>
                                            <th class="p-3">NIP / Kontak</th>
                                            <th class="p-3 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @forelse($aparaturs ?? [] as $item)
                                            <tr class="hover:bg-slate-50/80">
                                                <td class="p-3">
                                                    @if($item->foto)
                                                        <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" class="w-10 h-10 object-cover rounded-full border border-slate-200 shadow-2xs">
                                                    @else
                                                        <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-[10px]">No Pic</div>
                                                    @endif
                                                </td>
                                                <td class="p-3 font-extrabold text-slate-900">{{ $item->nama }}</td>
                                                <td class="p-3 font-semibold text-emerald-800">{{ $item->jabatan }}</td>
                                                <td class="p-3 text-slate-500">
                                                    <div>NIP: {{ $item->nip ?? '-' }}</div>
                                                    <div class="text-[10px] text-slate-400">Kontak: {{ $item->kontak ?? '-' }}</div>
                                                </td>
                                                <td class="p-3 text-center">
                                                    <div class="flex items-center justify-center space-x-2">
                                                        <button @click="editAparaturModal = true; editAparatur = { id: {{ $item->id }}, nama: '{{ addslashes($item->nama) }}', jabatan: '{{ addslashes($item->jabatan) }}', nip: '{{ addslashes($item->nip ?? '') }}', kontak: '{{ addslashes($item->kontak ?? '') }}' }" class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition-all font-bold" title="Edit Aparatur">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                        </button>
                                                        <form action="{{ route('admin.destroy-struktur', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data aparatur ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-xl transition-all font-bold" title="Hapus Aparatur">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="p-6 text-center text-slate-400 italic">
                                                    Belum ada data aparatur desa.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- MODAL EDIT APARATUR -->
                        <div x-show="editAparaturModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4">
                            <div @click.away="editAparaturModal = false" class="bg-white rounded-3xl p-6 w-full max-w-md shadow-2xl space-y-4 relative text-xs">
                                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                    <h3 class="font-extrabold text-slate-800 text-sm">Edit Data Aparatur Desa</h3>
                                    <button @click="editAparaturModal = false" class="text-slate-400 hover:text-slate-600 font-bold">✕</button>
                                </div>
                                <form :action="'{{ url('/admin/update-struktur') }}/' + editAparatur.id" method="POST" enctype="multipart/form-data" class="space-y-3">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Nama Lengkap</label>
                                        <input type="text" name="nama" x-model="editAparatur.nama" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Jabatan</label>
                                        <input type="text" name="jabatan" x-model="editAparatur.jabatan" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-slate-800 font-medium">
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label class="block font-bold text-slate-700 mb-1">NIP</label>
                                            <input type="text" name="nip" x-model="editAparatur.nip" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-slate-800 font-medium">
                                        </div>
                                        <div>
                                            <label class="block font-bold text-slate-700 mb-1">Kontak</label>
                                            <input type="text" name="kontak" x-model="editAparatur.kontak" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-slate-800 font-medium">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Ganti Foto (Opsional)</label>
                                        <input type="file" name="foto" class="w-full text-xs text-slate-500 file:py-1 file:px-3 file:rounded-xl file:border-0 file:bg-emerald-100 file:text-[#235832] file:font-bold">
                                    </div>
                                    <div class="pt-2 flex justify-end space-x-2">
                                        <button type="button" @click="editAparaturModal = false" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl">Batal</button>
                                        <button type="submit" class="px-5 py-2 bg-[#235832] hover:bg-[#1b4527] text-white font-bold rounded-xl shadow-md">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================== -->
                    <!-- SUB 5: UPDATE INFOGRAFIS DESA                  -->
                    <!-- ============================================== -->
                    <div x-show="kontenTab === 'infografis'" class="pt-2 space-y-6" x-transition:enter="transition ease-out duration-150">
                        <div class="bg-slate-50/80 rounded-2xl p-6 border border-slate-200/80">
                            <h4 class="font-extrabold text-slate-900 text-base mb-4 flex items-center space-x-2">
                                <span class="w-3 h-3 rounded-full bg-[#235832]"></span>
                                <span>Form Update Statistik Kependudukan & Infografis</span>
                            </h4>

                            <form action="{{ route('infografis.store') }}" method="POST" class="space-y-4 text-xs">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Total Jiwa (Warga)</label>
                                        <input type="text" name="total_warga" value="{{ optional(($statistik ?? $statistikDesa ?? collect())->firstWhere('label', 'Total Jiwa (Warga)'))->jumlah ?? '2.845' }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Total Kepala Keluarga (KK)</label>
                                        <input type="text" name="total_kk" value="{{ optional(($statistik ?? $statistikDesa ?? collect())->firstWhere('label', 'Total Kepala Keluarga (KK)'))->jumlah ?? '742' }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Jumlah Laki-laki</label>
                                        <input type="text" name="laki_laki" value="{{ optional(($statistik ?? $statistikDesa ?? collect())->firstWhere('label', 'Jumlah Laki-laki'))->jumlah ?? '1.460' }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Jumlah Perempuan</label>
                                        <input type="text" name="perempuan" value="{{ optional(($statistik ?? $statistikDesa ?? collect())->firstWhere('label', 'Jumlah Perempuan'))->jumlah ?? '1.385' }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                    </div>
                                </div>

                                <div class="pt-3 border-t border-slate-200/80">
                                    <h5 class="font-bold text-slate-800 mb-2">+ Tambah Statistik Custom / Wilayah</h5>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-slate-600 mb-1">Label Statistik (misal: Luas Perkebunan)</label>
                                            <input type="text" name="label_custom" placeholder="Contoh: Luas Perkebunan Sawit" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-slate-800">
                                        </div>
                                        <div>
                                            <label class="block text-slate-600 mb-1">Nilai / Jumlah (misal: 1,200 Ha)</label>
                                            <input type="text" name="jumlah_custom" placeholder="Contoh: 1,200 Ha" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-slate-800">
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold rounded-xl shadow-md transition-all flex items-center justify-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <span>Update Data Infografis</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- TABEL DAFTAR STATISTIK DESA -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                            <h4 class="font-extrabold text-slate-900 text-sm uppercase tracking-wider flex items-center justify-between">
                                <span>DAFTAR DATA INFOGRAFIS DESA</span>
                                <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">{{ count($statistikDesa ?? $statistik ?? []) }} Items</span>
                            </h4>

                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs text-slate-700">
                                    <thead class="bg-slate-100/80 text-slate-600 font-bold uppercase tracking-wider text-[10px]">
                                        <tr>
                                            <th class="p-3">Label Statistik</th>
                                            <th class="p-3">Jumlah / Nilai</th>
                                            <th class="p-3 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @forelse($statistikDesa ?? $statistik ?? [] as $item)
                                            <tr class="hover:bg-slate-50/80">
                                                <td class="p-3 font-extrabold text-slate-900">{{ $item->label }}</td>
                                                <td class="p-3 font-bold text-emerald-800">{{ $item->jumlah }}</td>
                                                <td class="p-3 text-center">
                                                    <form action="{{ route('admin.destroy-statistik', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item statistik ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-xl transition-all font-bold" title="Hapus Statistik">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="p-6 text-center text-slate-400 italic">
                                                    Belum ada data statistik tersimpan.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- ========================================================= -->
            <!-- TAB 3: ARSIP DOKUMEN INTERNAL KANTOR DESA                -->
            <!-- ========================================================= -->
            <div x-show="activeTab === 'arsip'" class="space-y-6" x-transition:enter="transition ease-out duration-200">
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <span class="text-xs uppercase font-bold text-emerald-700 tracking-wider">MANAJEMEN ARSIP DOKUMEN</span>
                        <h3 class="text-xl font-extrabold text-slate-900 mt-0.5">Dokumen & Berkas Internal Kantor</h3>
                        <p class="text-xs text-slate-500 mt-1">Upload dan kelola berkas arsip internal seperti SK Kades, Perdes, dan Laporan Pertanggungjawaban (LPJ).</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                        
                        <!-- Form Upload -->
                        <div class="lg:col-span-4 bg-slate-50/80 rounded-2xl p-5 border border-slate-200/80 space-y-4">
                            <h4 class="font-extrabold text-slate-900 text-sm flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                <span>Upload Berkas Baru</span>
                            </h4>

                            <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3 text-xs">
                                @csrf
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Nama Dokumen / Berkas <span class="text-red-500">*</span></label>
                                    <input type="text" name="nama_dokumen" required placeholder="Contoh: SK Kades - Pengurus RT/RW 2026" class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 text-slate-800 font-medium">
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Kategori Dokumen <span class="text-red-500">*</span></label>
                                    <select name="kategori" required class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 text-slate-800 font-medium">
                                        <option value="SK Kepala Desa">SK Kepala Desa</option>
                                        <option value="Perdes">Peraturan Desa (Perdes)</option>
                                        <option value="LPJ & Keuangan">LPJ & Keuangan</option>
                                        <option value="Formulir Warga">Formulir Warga</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Pilih File (PDF / DOCX / XLSX / DOC / XLS, Maks 10MB) <span class="text-red-500">*</span></label>
                                    <input type="file" name="file" required class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-100 file:text-[#235832] hover:file:bg-emerald-200">
                                </div>

                                <button type="submit" class="w-full bg-[#235832] hover:bg-[#1b4527] text-white font-bold py-2.5 px-4 rounded-xl shadow-xs transition-all flex items-center justify-center space-x-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <span>Unggah Berkas Sekarang</span>
                                </button>
                            </form>
                        </div>

                        <!-- Table Arsip -->
                        <div class="lg:col-span-8 overflow-x-auto rounded-2xl border border-slate-200/80">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-200/80">
                                    <tr>
                                        <th class="py-3 px-4">Nama Berkas</th>
                                        <th class="py-3 px-4">Kategori</th>
                                        <th class="py-3 px-4">Tanggal Upload</th>
                                        <th class="py-3 px-4 text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-medium text-slate-800">
                                    @forelse ($arsipDokumens as $dokumen)
                                        @php
                                            $linkDownload = asset('storage/' . $dokumen->file_path);
                                            $pesanWa = urlencode("Halo, berikut dokumen arsip resmi Pemerintah Desa Lubuk Mandian Gajah:\n\n*Nama Dokumen:* " . $dokumen->nama_dokumen . "\n*Kategori:* " . $dokumen->kategori . "\n*Tautan Unduh Dokumen:* " . $linkDownload . "\n\nDokumen resmi ini diterbitkan untuk keperluan administrasi desa.");
                                        @endphp
                                        <tr class="hover:bg-slate-50/80 transition-colors">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center space-x-2.5">
                                                    <div class="w-8 h-8 rounded-lg bg-red-100 text-red-700 flex items-center justify-center shrink-0 font-bold text-[10px] uppercase font-mono">
                                                        {{ $dokumen->tipe_file }}
                                                    </div>
                                                    <div>
                                                        <span class="font-bold text-slate-900 block">{{ $dokumen->nama_dokumen }}</span>
                                                        @if($dokumen->ukuran_file)
                                                            <span class="text-[10px] text-slate-400 font-normal">{{ $dokumen->ukuran_file }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="px-2.5 py-0.5 bg-blue-50 text-blue-800 text-[10px] font-bold rounded-md">{{ $dokumen->kategori }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-slate-500">{{ $dokumen->created_at ? $dokumen->created_at->format('d M Y') : '-' }}</td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="flex items-center justify-center space-x-3">
                                                    <!-- A. Tombol Unduh -->
                                                    <a href="{{ route('arsip.download', $dokumen->id) }}" class="text-emerald-700 hover:text-emerald-900 font-extrabold text-xs inline-flex items-center gap-1">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                        </svg>
                                                        <span>Unduh</span>
                                                    </a>

                                                    <!-- B. Tombol Bagikan ke WhatsApp -->
                                                    <a href="https://wa.me/?text={{ $pesanWa }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 font-medium text-xs flex items-center gap-1">Kirim WA</a>

                                                    <!-- C. Tombol Hapus -->
                                                    <form action="{{ route('arsip.destroy', $dokumen->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berkas arsip ini?')" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs inline-flex items-center gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                            <span>Hapus</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-8 text-center text-slate-400 italic">
                                                Belum ada berkas arsip internal yang diunggah. Silakan unggah dokumen melalui form di samping.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- ========================================================= -->
        <!-- MODAL 1: FORM INPUT PEMOHON SURAT (ALPINE.JS INTERACTIVE) -->
        <!-- ========================================================= -->
        <div x-cloak x-show="showInputModal" class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-200 relative space-y-6">
                
                <!-- Close Button -->
                <button @click="showInputModal = false" class="absolute top-6 right-6 text-slate-400 hover:text-slate-600 p-2 rounded-full hover:bg-slate-100 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Modal Header -->
                <div class="flex items-center space-x-3.5 border-b border-slate-100 pb-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-700" x-text="selectedSurat.code"></span>
                        <h3 class="text-xl font-extrabold text-slate-900" x-text="selectedSurat.title"></h3>
                        <p class="text-xs text-slate-500">Lengkapi formulir pemohon di bawah untuk mencetak dokumen resmi.</p>
                    </div>
                </div>

                <!-- Form Input Pemohon -->
                <form @submit.prevent="submitFormSurat()" class="space-y-4 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- NIK -->
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">NIK Pemohon (16 Digit) <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.nik" required placeholder="Contoh: 1405020102900001" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                        </div>

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nama Lengkap Pemohon <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.nama" required placeholder="Contoh: Budi Santoso" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                        </div>

                        <!-- Tempat Lahir -->
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Tempat Lahir <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.tempatLahir" required placeholder="Contoh: Bunut" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                        </div>

                        <!-- Tgl Lahir -->
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="date" x-model="form.tglLahir" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Jenis Kelamin</label>
                            <select x-model="form.jenisKelamin" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- Agama -->
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Agama</label>
                            <input type="text" x-model="form.agama" placeholder="Islam" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                        </div>

                        <!-- Pekerjaan -->
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Pekerjaan <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.pekerjaan" required placeholder="Contoh: Wiraswasta / Petani" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                        </div>

                        <!-- Input Khusus Pindah (Alamat Tujuan) -->
                        <div x-show="selectedSurat.type === 'pindah' || selectedSurat.type === 'pindah_kk'">
                            <label class="block font-bold text-slate-700 mb-1">Alamat Tujuan Pindah <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.alamatTujuan" placeholder="Contoh: Kecamatan Pangkalan Kerinci" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                        </div>

                        <!-- Input Khusus Pindah (Jumlah Pengikut) -->
                        <div x-show="selectedSurat.type === 'pindah' || selectedSurat.type === 'pindah_kk'">
                            <label class="block font-bold text-slate-700 mb-1">Jumlah Anggota / Pengikut</label>
                            <input type="text" x-model="form.jumlahPengikut" placeholder="Contoh: 3 Orang (Istri & 2 Anak)" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                        </div>
                    </div>

                    <!-- Alamat Asal -->
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Alamat Asal (Dusun / RT / RW Desa LMG) <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.alamat" required placeholder="Contoh: Dusun I RT 02 RW 01 Desa Lubuk Mandian Gajah" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium">
                    </div>

                    <!-- Keperluan -->
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Keperluan / Keterangan Permohonan <span class="text-red-500">*</span></label>
                        <textarea x-model="form.keperluan" required rows="2" placeholder="Contoh: Persyaratan pindah domisili kependudukan / Pengurusan akta lahir anak" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-slate-800 font-medium"></textarea>
                    </div>

                    <!-- Modal Actions -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-end space-x-3">
                        <button type="button" @click="showInputModal = false" class="px-5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition-all">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#235832] hover:bg-[#1b4527] text-white font-bold transition-all shadow-md flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            <span>Simpan ke Database & Cetak Surat</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- MODAL 2: PRATINJAU SURAT KOP RESMI & WINDOW.PRINT()       -->
        <!-- ========================================================= -->
        <div x-cloak x-show="showPreviewModal" class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/75 backdrop-blur-sm flex items-center justify-center p-2 sm:p-6" x-transition:enter="transition ease-out duration-200">
            <div class="bg-white rounded-2xl max-w-4xl w-full p-4 sm:p-8 shadow-2xl border border-slate-200 relative space-y-6 max-h-[92vh] overflow-y-auto">
                
                <!-- Action Bar Header Modal -->
                <div class="flex items-center justify-between border-b border-slate-200 pb-4 no-print">
                    <div class="flex items-center space-x-2">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 animate-ping"></span>
                        <h4 class="font-extrabold text-slate-800 text-sm sm:text-base">Pratinjau Dokumen Resmi Desa</h4>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button @click="showPreviewModal = false; showInputModal = true" class="px-3.5 py-1.5 rounded-xl border border-slate-300 font-bold text-xs text-slate-700 hover:bg-slate-100 transition-all">
                            &larr; Edit Data Pemohon
                        </button>
                        <button @click="window.print()" class="px-5 py-2 rounded-xl bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold text-xs shadow-md transition-all flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            <span>Cetak Sekarang (Print / PDF)</span>
                        </button>
                        <button @click="showPreviewModal = false" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-full hover:bg-slate-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- DOKUMEN CETAK A4 (SURAT RESMI DESA) -->
                <div id="print-section" class="bg-white p-6 sm:p-10 border border-slate-200 shadow-inner rounded-xl text-slate-900 space-y-6 font-serif max-w-3xl mx-auto leading-relaxed">
                    
                    <!-- KOP SURAT RESMI -->
                    <div class="flex items-center justify-between border-b-4 border-double border-slate-900 pb-3">
                        <div class="w-20 h-20 shrink-0 flex items-center justify-center">
                            <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Kabupaten Pelalawan" class="w-full h-full object-contain">
                        </div>
                        <div class="text-center font-sans uppercase flex-1 px-4">
                            <h4 class="text-xs sm:text-sm font-bold tracking-wider">PEMERINTAH KABUPATEN PELALAWAN</h4>
                            <h4 class="text-xs sm:text-sm font-bold tracking-wider">KECAMATAN BUNUT</h4>
                            <h3 class="text-base sm:text-xl font-black tracking-widest text-[#235832]">PEMERINTAH DESA LUBUK MANDIAN GAJAH</h3>
                            <p class="text-[10px] sm:text-xs font-normal normal-case italic text-slate-600 mt-0.5">Alamat: Jl. Lintas Bono Kode Pos: 28382 | Email: desa.lubukmandiangajah@pelalawankab.go.id</p>
                        </div>
                        <div class="w-20 h-20 shrink-0 invisible"></div>
                    </div>

                    <!-- JUDUL SURAT & NOMOR -->
                    <div class="text-center space-y-1 pt-2 font-sans">
                        <h3 class="text-base sm:text-lg font-black uppercase underline tracking-wider text-slate-900" x-text="selectedSurat.title"></h3>
                        <p class="text-xs font-medium text-slate-700">Nomor: <span x-text="selectedSurat.code"></span></p>
                    </div>

                    <!-- PARAGRAF PEMBUKA -->
                    <div class="text-xs sm:text-sm text-justify space-y-4 font-serif">
                        <p>
                            Yang bertanda tangan di bawah ini Kepala Desa Lubuk Mandian Gajah, Kecamatan Bunut, Kabupaten Pelalawan, Provinsi Riau, menerangkan dengan sebenarnya bahwa:
                        </p>

                        <!-- BIODATA PEMOHON TABLE -->
                        <div class="pl-4 sm:pl-8 space-y-1.5 font-mono text-xs sm:text-sm">
                            <div class="grid grid-cols-12">
                                <span class="col-span-4 font-bold">Nama Lengkap</span>
                                <span class="col-span-8">: <strong class="uppercase font-extrabold text-slate-900" x-text="form.nama"></strong></span>
                            </div>
                            <div class="grid grid-cols-12">
                                <span class="col-span-4 font-bold">NIK</span>
                                <span class="col-span-8">: <span x-text="form.nik"></span></span>
                            </div>
                            <div class="grid grid-cols-12">
                                <span class="col-span-4 font-bold">Tempat / Tgl Lahir</span>
                                <span class="col-span-8">: <span x-text="form.tempatLahir"></span>, <span x-text="form.tglLahir"></span></span>
                            </div>
                            <div class="grid grid-cols-12">
                                <span class="col-span-4 font-bold">Jenis Kelamin</span>
                                <span class="col-span-8">: <span x-text="form.jenisKelamin"></span></span>
                            </div>
                            <div class="grid grid-cols-12">
                                <span class="col-span-4 font-bold">Agama</span>
                                <span class="col-span-8">: <span x-text="form.agama"></span></span>
                            </div>
                            <div class="grid grid-cols-12">
                                <span class="col-span-4 font-bold">Pekerjaan</span>
                                <span class="col-span-8">: <span x-text="form.pekerjaan"></span></span>
                            </div>
                            <div class="grid grid-cols-12">
                                <span class="col-span-4 font-bold">Alamat Asal</span>
                                <span class="col-span-8">: <span x-text="form.alamat"></span></span>
                            </div>
                        </div>

                        <!-- PARAGRAF KETERANGAN SPESIFIK -->
                        <div class="pt-2 text-justify">
                            <template x-if="selectedSurat.type === 'pindah' || selectedSurat.type === 'pindah_kk'">
                                <p>
                                    Bahwa nama tersebut di atas adalah benar warga Desa Lubuk Mandian Gajah yang mengajukan permohonan Pindah Domisili / Kartu Keluarga menuju alamat tujuan: <strong class="underline font-bold" x-text="form.alamatTujuan || 'Wilayah Tujuan Pindah'"></strong> dengan pengikut anggota keluarga sebanyak: <strong class="font-bold" x-text="form.jumlahPengikut || 'Nihil'"></strong>. Surat pengantar pindah ini diterbitkan untuk keperluan: <strong class="italic" x-text="form.keperluan"></strong>.
                                </p>
                            </template>

                            <template x-if="selectedSurat.type === 'akta'">
                                <p>
                                    Bahwa nama tersebut di atas adalah benar warga Desa Lubuk Mandian Gajah yang mengajukan permohonan penerbitan Akta Kelahiran / Kematian kependudukan. Surat keterangan pengantar ini diterbitkan untuk keperluan permohonan akta di Dinas Kependudukan dan Pencatatan Sipil dengan keterangan: <strong class="italic" x-text="form.keperluan"></strong>.
                                </p>
                            </template>
                        </div>

                        <p class="pt-2">
                            Demikian surat keterangan ini kami buat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya oleh yang berkepentingan.
                        </p>
                    </div>

                    <!-- TANDA TANGAN KEPALA DESA -->
                    <div class="pt-8 flex justify-end font-sans">
                        <div class="text-center w-64 space-y-16">
                            <div>
                                <p class="text-xs">Lubuk Mandian Gajah, {{ date('d F Y') }}</p>
                                <p class="text-xs font-bold uppercase">Kepala Desa Lubuk Mandian Gajah</p>
                            </div>

                            <div class="relative flex flex-col items-center justify-center">
                                <div class="w-24 h-24 absolute -top-8 border-2 border-emerald-600/30 rounded-full flex items-center justify-center opacity-30 text-[10px] font-bold text-emerald-800 transform -rotate-12 pointer-events-none">
                                    STEMPEL DESA
                                </div>
                                <h4 class="font-extrabold text-sm text-slate-900 underline uppercase tracking-wider relative z-10">MUSLICH, SE</h4>
                                <p class="text-[10px] text-slate-600 font-mono">NIP. 19780412 200501 1 004</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- ALPINE.JS DASHBOARD STATE & LOGIC -->
    <script>
        function dashboardAdmin() {
            return {
                activeTab: 'dokumen',
                kontenTab: 'profil',
                stats: {
                    suratCount: {{ $totalSurat ?? 0 }},
                    arsipCount: {{ $totalBerkas ?? 0 }}
                },
                showInputModal: false,
                showPreviewModal: false,
                selectedSurat: {
                    type: '',
                    title: '',
                    code: '',
                    description: ''
                },
                form: {
                    nik: '',
                    nama: '',
                    tempatLahir: '',
                    tglLahir: '',
                    jenisKelamin: 'Laki-laki',
                    agama: 'Islam',
                    pekerjaan: '',
                    alamat: 'Dusun I RT 02 RW 01 Desa Lubuk Mandian Gajah',
                    alamatTujuan: '',
                    jumlahPengikut: '',
                    keperluan: ''
                },
                riwayatSurat: [
                    { nomor: '470/LMG-SKP/VIII/2026', nama: 'Budi Santoso', jenis: 'Surat Pindah Domisili', tanggal: '28 Aug 2026', nik: '1405021203890002', tempatLahir: 'Bunut', tglLahir: '1989-03-12', jenisKelamin: 'Laki-laki', agama: 'Islam', pekerjaan: 'Petani', alamat: 'Dusun I RT 01 RW 01', alamatTujuan: 'Kec. Pangkalan Kerinci', jumlahPengikut: '2 Orang', keperluan: 'Kepindahan domisili keluarga' },
                    { nomor: '470/LMG-KK/VIII/2026', nama: 'Siti Aminah', jenis: 'Pindah Kartu Keluarga', tanggal: '25 Aug 2026', nik: '1405024508920001', tempatLahir: 'Pelalawan', tglLahir: '1992-08-15', jenisKelamin: 'Perempuan', agama: 'Islam', pekerjaan: 'Wiraswasta', alamat: 'Dusun II RT 03 RW 02', alamatTujuan: 'Dusun I RT 02 RW 01', jumlahPengikut: '1 Orang', keperluan: 'Pecah Kartu Keluarga Mandiri' },
                    { nomor: '474/LMG-AKTA/VIII/2026', nama: 'Ahmad Dahlan', jenis: 'Permohonan Akta', tanggal: '22 Aug 2026', nik: '1405021105780003', tempatLahir: 'Bunut', tglLahir: '1978-05-11', jenisKelamin: 'Laki-laki', agama: 'Islam', pekerjaan: 'Buruh Harian', alamat: 'Dusun III RT 05 RW 03', keperluan: 'Penerbitan Akta Kelahiran Anak Ketiga' }
                ],
                openFormModal(type, title, code, description) {
                    this.selectedSurat = { type, title, code, description };
                    this.form = {
                        nik: '',
                        nama: '',
                        tempatLahir: '',
                        tglLahir: '',
                        jenisKelamin: 'Laki-laki',
                        agama: 'Islam',
                        pekerjaan: '',
                        alamat: 'Dusun I RT 02 RW 01 Desa Lubuk Mandian Gajah',
                        alamatTujuan: '',
                        jumlahPengikut: '',
                        keperluan: ''
                    };
                    this.showInputModal = true;
                },
                submitFormSurat() {
                    const today = new Date();
                    const dateStr = today.getDate() + ' ' + today.toLocaleString('id-ID', { month: 'short' }) + ' ' + today.getFullYear();
                    
                    this.riwayatSurat.unshift({
                        nomor: this.selectedSurat.code,
                        nama: this.form.nama,
                        jenis: this.selectedSurat.title,
                        tanggal: dateStr,
                        ...this.form,
                        type: this.selectedSurat.type
                    });

                    this.stats.suratCount++;
                    this.showInputModal = false;
                    this.showPreviewModal = true;
                },
                reprintSurat(item) {
                    this.selectedSurat = {
                        type: item.type || 'pindah',
                        title: item.jenis,
                        code: item.nomor,
                        description: ''
                    };
                    this.form = { ...item };
                    this.showPreviewModal = true;
                }
            }
        }
    </script>
</x-app-layout>
