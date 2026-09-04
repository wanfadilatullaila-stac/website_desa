<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struktur Organisasi Desa - Desa Lubuk Mandian Gajah</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vite Assets / Tailwind CSS -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Tailwind CSS CDN Fallback & Config -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            desa: {
                                50: '#f0f9f2',
                                100: '#dcffdf',
                                500: '#2d7a44',
                                600: '#235832',
                                700: '#1b4527',
                                800: '#14331d',
                                900: '#0e2314',
                            }
                        },
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        [x-cloak] { display: none !important; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }
    </style>
</head>
<body class="antialiased min-h-screen bg-slate-100 flex flex-col items-center justify-start py-0 sm:py-6 px-0 sm:px-4 lg:px-8">

    <!-- Main Responsive Container (Mobile-first iPhone frame, expands gracefully to max-w-7xl on Desktop) -->
    <div class="w-full max-w-md lg:max-w-7xl mx-auto bg-white min-h-screen sm:min-h-0 sm:rounded-2xl lg:rounded-3xl sm:shadow-xl lg:shadow-2xl overflow-hidden relative pb-20 lg:pb-0 border border-slate-200/60">

        <!-- HEADER SECTION -->
        <header class="bg-[#235832] text-white px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4 flex items-center justify-between shadow-md sticky top-0 z-40">
            <!-- Left: Logo & Village Title + Tombol Kembali -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <a href="{{ url('/') }}" class="p-1.5 rounded-full bg-white/10 hover:bg-white/20 transition-all text-white shrink-0 flex items-center justify-center" title="Kembali ke Beranda">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                
                <div class="flex items-center space-x-2.5">
                    <div class="w-9 h-9 sm:w-11 sm:h-11 flex items-center justify-center shrink-0">
                        <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Desa Lubuk Mandian Gajah" class="h-12 w-auto object-contain">
                    </div>
                    <div>
                        <h1 class="text-sm sm:text-base lg:text-lg font-extrabold leading-tight tracking-wide text-white">Desa Lubuk Mandian Gajah</h1>
                        <p class="text-[10px] sm:text-xs text-emerald-100 font-medium tracking-normal opacity-90">Kabupaten Pelalawan</p>
                    </div>
                </div>
            </div>
            
            <!-- Center: Horizontal Navigation Bar (Visible only on Desktop lg:) -->
            <nav class="hidden lg:flex items-center space-x-6 xl:space-x-8 font-semibold text-sm">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-white border-b-2 border-white pb-0.5 font-bold' : 'text-emerald-100 hover:text-white transition-colors' }}">Beranda</a>
                <a href="{{ url('/dokumen') }}" class="{{ request()->is('dokumen') ? 'text-white border-b-2 border-white pb-0.5 font-bold' : 'text-emerald-100 hover:text-white transition-colors' }}">Dokumen</a>
                <a href="{{ url('/peta') }}" class="{{ request()->is('peta') ? 'text-white border-b-2 border-white pb-0.5 font-bold' : 'text-emerald-100 hover:text-white transition-colors' }}">Peta Desa</a>
                <a href="{{ url('/infografis') }}" class="{{ request()->is('infografis') ? 'text-white border-b-2 border-white pb-0.5 font-bold' : 'text-emerald-100 hover:text-white transition-colors' }}">Infografis</a>
                <a href="{{ url('/galeri') }}" class="{{ request()->is('galeri') ? 'text-white border-b-2 border-white pb-0.5 font-bold' : 'text-emerald-100 hover:text-white transition-colors' }}">Galeri</a>
                <a href="{{ url('/struktur') }}" class="{{ request()->is('struktur') ? 'text-white border-b-2 border-white pb-0.5 font-bold' : 'text-emerald-100 hover:text-white transition-colors' }}">Struktur</a>
                <a href="{{ url('/berita') }}" class="{{ request()->is('berita') ? 'text-white border-b-2 border-white pb-0.5 font-bold' : 'text-emerald-100 hover:text-white transition-colors' }}">Berita</a>
                <a href="{{ url('/bantuan') }}" class="{{ request()->is('bantuan') ? 'text-white border-b-2 border-white pb-0.5 font-bold' : 'text-emerald-100 hover:text-white transition-colors' }}">Bantuan</a>
            </nav>

            <!-- Right: Clean Navbar -->
            <div class="flex items-center space-x-3">
            </div>
        </header>

        <!-- MAIN CONTENT CONTAINER -->
        <main class="px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10 max-w-5xl mx-auto space-y-6 sm:space-y-8">
            @php
                $aparatursList = $aparaturs ?? collect();

                $findNama = function($role, $default) use ($aparatursList) {
                    $found = $aparatursList->first(function($item) use ($role) {
                        return strtolower(trim($item->jabatan)) === strtolower(trim($role));
                    });
                    return $found ? strtoupper($found->nama) : strtoupper($default);
                };

                $kadesNama = $findNama('Kepala Desa', 'MUSLICH');

                $rw01Nama = $findNama('Ketua RW 01', 'IMBUH HARYANTO');
                $rt01Nama = $findNama('Ketua RT 01', 'ANDI');
                $rt02Nama = $findNama('Ketua RT 02', 'JOHARI');

                $rw02Nama = $findNama('Ketua RW 02', 'YAZID');
                $rt03Nama = $findNama('Ketua RT 03', 'KADARMA PUTRA');
                $rt04Nama = $findNama('Ketua RT 04', 'YURI');

                $rw03Nama = $findNama('Ketua RW 03', 'EPY SYAFRIZAL');
                $rt05Nama = $findNama('Ketua RT 05', 'DARUS');
                $rt06Nama = $findNama('Ketua RT 06', 'ANUAR. K');

                $rw04Nama = $findNama('Ketua RW 04', 'ZAINAL');
                $rt07Nama = $findNama('Ketua RT 07', 'ANDI');
                $rt08Nama = $findNama('Ketua RT 08', 'KARSONO');
            @endphp

            <!-- PAGE HEADER TITLE & BREADCRUMB -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200/80 pb-5">
                <div>
                    <div class="flex items-center space-x-2 text-xs font-semibold text-emerald-700 uppercase tracking-wider mb-1">
                        <a href="{{ url('/') }}" class="hover:underline text-slate-500">Beranda</a>
                        <span class="text-slate-400">/</span>
                        <span class="text-[#235832]">Struktur Organisasi</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-[#235832] tracking-tight">
                        Struktur Organisasi Desa Lubuk Mandian Gajah
                    </h2>
                </div>

                <!-- Back Button -->
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center space-x-2 text-xs sm:text-sm font-bold text-[#235832] bg-emerald-50 hover:bg-emerald-100 border border-emerald-200/80 px-4 py-2.5 rounded-xl transition-all shadow-sm self-start sm:self-auto group">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>

            <!-- CONTAINER BAGAN STRUKTUR PURE HTML + TAILWIND CSS (MURNI VECTOR/TEXT, HD, TAJAM) -->
            <section class="space-y-2">
                
                <!-- Scroll Wrapper for HP / Mobile Screens -->
                <div class="w-full overflow-x-auto p-2 sm:p-3 bg-white rounded-2xl border border-slate-200 shadow-sm">
                    
                    <!-- Bagan Card Container -->
                    <div class="min-w-[800px] bg-[#f7f5f0] border border-slate-300/80 rounded-2xl p-6 sm:p-8 relative overflow-hidden shadow-xs">
                        
                        <!-- Top-Right Geometric Aesthetic Shapes -->
                        <div class="absolute top-0 right-0 w-48 h-20 bg-[#94a397]/25 clip-polygon -z-0 pointer-events-none transform translate-x-4 -translate-y-2"></div>
                        <div class="absolute top-0 right-0 w-36 h-28 bg-[#d7be9d]/30 clip-polygon -z-0 pointer-events-none transform translate-x-8"></div>
                        
                        <!-- Bottom-Left Geometric Aesthetic Shapes -->
                        <div class="absolute bottom-0 left-0 w-40 h-24 bg-[#d7be9d]/40 clip-polygon -z-0 pointer-events-none transform -translate-x-6 translate-y-4"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-16 bg-[#94a397]/30 clip-polygon -z-0 pointer-events-none transform -translate-x-2 translate-y-6"></div>

                        <!-- Header Bagan di Pojok Kiri Atas -->
                        <div class="relative z-10 mb-8 border-b border-slate-400/80 pb-2 max-w-md">
                            <h4 class="text-xs sm:text-sm font-extrabold text-slate-800 tracking-wider uppercase leading-tight">
                                STRUKTUR ORGANISASI
                            </h4>
                            <h4 class="text-xs sm:text-sm font-bold text-slate-700 tracking-wider uppercase leading-tight">
                                RUKUN WARGA (RW) DAN RUKUN TETANGGA
                            </h4>
                        </div>

                        <!-- TREE STRUCTURE FLOW -->
                        <div class="relative z-10 max-w-4xl mx-auto space-y-0">
                            
                            <!-- TINGKAT 1: KEPALA DESA (CENTERED AT TOP) -->
                            <div class="flex flex-col items-center">
                                <div class="bg-[#d7be9d] border-2 border-slate-800 px-8 py-3 rounded-md text-center shadow-sm min-w-[220px]">
                                    <div class="text-xs sm:text-sm font-black text-slate-900 uppercase tracking-wider">
                                        KEPALA DESA
                                    </div>
                                    <div class="text-xs font-bold text-slate-800 tracking-widest mt-0.5">
                                        {{ $kadesNama }}
                                    </div>
                                </div>
                                
                                <!-- Vertical Stem down from Kepala Desa to Main Branch Line -->
                                <div class="w-0.5 h-6 bg-slate-600"></div>
                            </div>

                            <!-- MAIN BRANCHING LINE CONNECTING KEPALA DESA TO 4 RWs -->
                            <div class="relative w-[75%] mx-auto h-6">
                                <!-- Horizontal Spanning Line -->
                                <div class="absolute top-0 inset-x-0 h-0.5 bg-slate-600"></div>
                                
                                <!-- 4 Vertical Stem Drops to the 4 RW Columns -->
                                <div class="absolute top-0 left-[0%] w-0.5 h-6 bg-slate-600"></div>
                                <div class="absolute top-0 left-[33.33%] w-0.5 h-6 bg-slate-600"></div>
                                <div class="absolute top-0 left-[66.66%] w-0.5 h-6 bg-slate-600"></div>
                                <div class="absolute top-0 left-[100%] w-0.5 h-6 bg-slate-600"></div>
                            </div>

                            <!-- TINGKAT 2 & 3: GRID 4 KOLOM (4 RW + RESPECTIVE RTs) -->
                            <div class="grid grid-cols-4 gap-4 sm:gap-6 relative">
                                
                                <!-- KOLOM RW 01 -->
                                <div class="flex flex-col items-center">
                                    <!-- RW Card -->
                                    <div class="w-full bg-white border-2 border-slate-800 p-2.5 sm:p-3 text-center rounded-md shadow-xs">
                                        <div class="text-[11px] sm:text-xs font-black text-slate-900 uppercase tracking-wider">
                                            KETUA RW 01
                                        </div>
                                        <div class="text-[11px] font-bold text-slate-700 tracking-wide mt-0.5">
                                            {{ $rw01Nama }}
                                        </div>
                                    </div>

                                    <!-- Vertical line from RW 01 to RT sub-branch -->
                                    <div class="w-0.5 h-6 bg-slate-600"></div>

                                    <!-- Sub-branch for 2 RTs under RW 01 -->
                                    <div class="relative w-[70%] h-4">
                                        <div class="absolute top-0 inset-x-0 h-0.5 bg-slate-600"></div>
                                        <div class="absolute top-0 left-0 w-0.5 h-4 bg-slate-600"></div>
                                        <div class="absolute top-0 right-0 w-0.5 h-4 bg-slate-600"></div>
                                    </div>

                                    <!-- 2 RTs Grid -->
                                    <div class="grid grid-cols-2 gap-2 w-full">
                                        <div class="bg-white border border-slate-800 p-1.5 sm:p-2 text-center rounded shadow-2xs">
                                            <div class="text-[10px] font-black text-slate-900">KETUA RT 01</div>
                                            <div class="text-[10px] font-bold text-slate-700 mt-0.5">{{ $rt01Nama }}</div>
                                        </div>
                                        <div class="bg-white border border-slate-800 p-1.5 sm:p-2 text-center rounded shadow-2xs">
                                            <div class="text-[10px] font-black text-slate-900">KETUA RT 02</div>
                                            <div class="text-[10px] font-bold text-slate-700 mt-0.5">{{ $rt02Nama }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- KOLOM RW 02 -->
                                <div class="flex flex-col items-center">
                                    <!-- RW Card -->
                                    <div class="w-full bg-white border-2 border-slate-800 p-2.5 sm:p-3 text-center rounded-md shadow-xs">
                                        <div class="text-[11px] sm:text-xs font-black text-slate-900 uppercase tracking-wider">
                                            KETUA RW 02
                                        </div>
                                        <div class="text-[11px] font-bold text-slate-700 tracking-wide mt-0.5">
                                            {{ $rw02Nama }}
                                        </div>
                                    </div>

                                    <!-- Vertical line from RW 02 to RT sub-branch -->
                                    <div class="w-0.5 h-6 bg-slate-600"></div>

                                    <!-- Sub-branch for 2 RTs under RW 02 -->
                                    <div class="relative w-[70%] h-4">
                                        <div class="absolute top-0 inset-x-0 h-0.5 bg-slate-600"></div>
                                        <div class="absolute top-0 left-0 w-0.5 h-4 bg-slate-600"></div>
                                        <div class="absolute top-0 right-0 w-0.5 h-4 bg-slate-600"></div>
                                    </div>

                                    <!-- 2 RTs Grid -->
                                    <div class="grid grid-cols-2 gap-2 w-full">
                                        <div class="bg-white border border-slate-800 p-1.5 sm:p-2 text-center rounded shadow-2xs">
                                            <div class="text-[10px] font-black text-slate-900">KETUA RT 03</div>
                                            <div class="text-[10px] font-bold text-slate-700 mt-0.5">{{ $rt03Nama }}</div>
                                        </div>
                                        <div class="bg-white border border-slate-800 p-1.5 sm:p-2 text-center rounded shadow-2xs">
                                            <div class="text-[10px] font-black text-slate-900">KETUA RT 04</div>
                                            <div class="text-[10px] font-bold text-slate-700 mt-0.5">{{ $rt04Nama }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- KOLOM RW 03 -->
                                <div class="flex flex-col items-center">
                                    <!-- RW Card -->
                                    <div class="w-full bg-white border-2 border-slate-800 p-2.5 sm:p-3 text-center rounded-md shadow-xs">
                                        <div class="text-[11px] sm:text-xs font-black text-slate-900 uppercase tracking-wider">
                                            KETUA RW 03
                                        </div>
                                        <div class="text-[11px] font-bold text-slate-700 tracking-wide mt-0.5">
                                            {{ $rw03Nama }}
                                        </div>
                                    </div>

                                    <!-- Vertical line from RW 03 to RT sub-branch -->
                                    <div class="w-0.5 h-6 bg-slate-600"></div>

                                    <!-- Sub-branch for 2 RTs under RW 03 -->
                                    <div class="relative w-[70%] h-4">
                                        <div class="absolute top-0 inset-x-0 h-0.5 bg-slate-600"></div>
                                        <div class="absolute top-0 left-0 w-0.5 h-4 bg-slate-600"></div>
                                        <div class="absolute top-0 right-0 w-0.5 h-4 bg-slate-600"></div>
                                    </div>

                                    <!-- 2 RTs Grid -->
                                    <div class="grid grid-cols-2 gap-2 w-full">
                                        <div class="bg-white border border-slate-800 p-1.5 sm:p-2 text-center rounded shadow-2xs">
                                            <div class="text-[10px] font-black text-slate-900">KETUA RT 05</div>
                                            <div class="text-[10px] font-bold text-slate-700 mt-0.5">{{ $rt05Nama }}</div>
                                        </div>
                                        <div class="bg-white border border-slate-800 p-1.5 sm:p-2 text-center rounded shadow-2xs">
                                            <div class="text-[10px] font-black text-slate-900">KETUA RT 06</div>
                                            <div class="text-[10px] font-bold text-slate-700 mt-0.5">{{ $rt06Nama }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- KOLOM RW 04 -->
                                <div class="flex flex-col items-center">
                                    <!-- RW Card -->
                                    <div class="w-full bg-white border-2 border-slate-800 p-2.5 sm:p-3 text-center rounded-md shadow-xs">
                                        <div class="text-[11px] sm:text-xs font-black text-slate-900 uppercase tracking-wider">
                                            KETUA RW 04
                                        </div>
                                        <div class="text-[11px] font-bold text-slate-700 tracking-wide mt-0.5">
                                            {{ $rw04Nama }}
                                        </div>
                                    </div>

                                    <!-- Vertical line from RW 04 to RT sub-branch -->
                                    <div class="w-0.5 h-6 bg-slate-600"></div>

                                    <!-- Sub-branch for 2 RTs under RW 04 -->
                                    <div class="relative w-[70%] h-4">
                                        <div class="absolute top-0 inset-x-0 h-0.5 bg-slate-600"></div>
                                        <div class="absolute top-0 left-0 w-0.5 h-4 bg-slate-600"></div>
                                        <div class="absolute top-0 right-0 w-0.5 h-4 bg-slate-600"></div>
                                    </div>

                                    <!-- 2 RTs Grid -->
                                    <div class="grid grid-cols-2 gap-2 w-full">
                                        <div class="bg-white border border-slate-800 p-1.5 sm:p-2 text-center rounded shadow-2xs">
                                            <div class="text-[10px] font-black text-slate-900">KETUA RT 07</div>
                                            <div class="text-[10px] font-bold text-slate-700 mt-0.5">{{ $rt07Nama }}</div>
                                        </div>
                                        <div class="bg-white border border-slate-800 p-1.5 sm:p-2 text-center rounded shadow-2xs">
                                            <div class="text-[10px] font-black text-slate-900">KETUA RT 08</div>
                                            <div class="text-[10px] font-bold text-slate-700 mt-0.5">{{ $rt08Nama }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Footer Bagan di Pojok Kanan Bawah -->
                        <div class="relative z-10 mt-10 pt-3 text-right">
                            <p class="text-[10px] sm:text-xs font-extrabold text-slate-600 tracking-widest uppercase">
                                DESA LUBUK MANDIAN GAJAH, KEC BUNUT KABUPATEN PELALAWAN
                            </p>
                        </div>

                    </div>
                </div>

                <div class="px-2 text-[11px] text-slate-500 font-medium">
                    <span class="inline-flex items-center space-x-1 sm:hidden">
                        <svg class="w-3.5 h-3.5 text-emerald-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                        <span>Geser ke samping untuk melihat bagan penuh</span>
                    </span>
                </div>
            </section>

            <!-- SUBJUDUL BESAR -->
            <div class="text-center pt-4 sm:pt-6">
                <h3 class="text-lg sm:text-xl lg:text-2xl font-extrabold text-slate-800">
                    Struktur Terbaru Tahun 2026
                </h3>
            </div>

            <!-- RINCIAN DATA STRUKTUR TEKS (GRID CARDS INTERAKTIF) -->
            <section class="space-y-4">
                
                <!-- CARD KEPALA DESA -->
                <div class="bg-gradient-to-r from-amber-500/10 via-amber-50/80 to-amber-500/10 border-2 border-amber-300/80 rounded-2xl p-4 sm:p-5 text-center shadow-sm max-w-lg mx-auto">
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-amber-800 bg-amber-200/90 px-3 py-1 rounded-full">
                        Kepala Desa
                    </span>
                    <h4 class="text-lg sm:text-xl font-black text-slate-900 mt-1.5 tracking-tight">
                        {{ $kadesNama }}
                    </h4>
                    <p class="text-xs font-semibold text-slate-600 mt-0.5">
                        Pemerintah Desa Lubuk Mandian Gajah
                    </p>
                </div>

                <!-- GRID 4 RUKUN WARGA (RW 01 s/d RW 04) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    
                    <!-- RW 01 -->
                    <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-sm hover:shadow-md transition-all space-y-3">
                        <div class="border-b border-slate-100 pb-2">
                            <span class="text-[11px] font-extrabold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full inline-block mb-1">
                                Ketua RW 01
                            </span>
                            <h5 class="text-base font-bold text-slate-900">{{ $rw01Nama }}</h5>
                        </div>
                        <div class="space-y-2">
                            <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Rukun Tetangga (RT):</p>
                            <ul class="space-y-1.5 text-xs">
                                <li class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 font-semibold text-slate-700">
                                    <span class="text-emerald-700 font-bold">RT 01</span>
                                    <span>{{ $rt01Nama }}</span>
                                </li>
                                <li class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 font-semibold text-slate-700">
                                    <span class="text-emerald-700 font-bold">RT 02</span>
                                    <span>{{ $rt02Nama }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- RW 02 -->
                    <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-sm hover:shadow-md transition-all space-y-3">
                        <div class="border-b border-slate-100 pb-2">
                            <span class="text-[11px] font-extrabold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full inline-block mb-1">
                                Ketua RW 02
                            </span>
                            <h5 class="text-base font-bold text-slate-900">{{ $rw02Nama }}</h5>
                        </div>
                        <div class="space-y-2">
                            <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Rukun Tetangga (RT):</p>
                            <ul class="space-y-1.5 text-xs">
                                <li class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 font-semibold text-slate-700">
                                    <span class="text-emerald-700 font-bold">RT 03</span>
                                    <span>{{ $rt03Nama }}</span>
                                </li>
                                <li class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 font-semibold text-slate-700">
                                    <span class="text-emerald-700 font-bold">RT 04</span>
                                    <span>{{ $rt04Nama }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- RW 03 -->
                    <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-sm hover:shadow-md transition-all space-y-3">
                        <div class="border-b border-slate-100 pb-2">
                            <span class="text-[11px] font-extrabold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full inline-block mb-1">
                                Ketua RW 03
                            </span>
                            <h5 class="text-base font-bold text-slate-900">{{ $rw03Nama }}</h5>
                        </div>
                        <div class="space-y-2">
                            <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Rukun Tetangga (RT):</p>
                            <ul class="space-y-1.5 text-xs">
                                <li class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 font-semibold text-slate-700">
                                    <span class="text-emerald-700 font-bold">RT 05</span>
                                    <span>{{ $rt05Nama }}</span>
                                </li>
                                <li class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 font-semibold text-slate-700">
                                    <span class="text-emerald-700 font-bold">RT 06</span>
                                    <span>{{ $rt06Nama }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- RW 04 -->
                    <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-sm hover:shadow-md transition-all space-y-3">
                        <div class="border-b border-slate-100 pb-2">
                            <span class="text-[11px] font-extrabold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full inline-block mb-1">
                                Ketua RW 04
                            </span>
                            <h5 class="text-base font-bold text-slate-900">{{ $rw04Nama }}</h5>
                        </div>
                        <div class="space-y-2">
                            <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Rukun Tetangga (RT):</p>
                            <ul class="space-y-1.5 text-xs">
                                <li class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 font-semibold text-slate-700">
                                    <span class="text-emerald-700 font-bold">RT 07</span>
                                    <span>{{ $rt07Nama }}</span>
                                </li>
                                <li class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 font-semibold text-slate-700">
                                    <span class="text-emerald-700 font-bold">RT 08</span>
                                    <span>{{ $rt08Nama }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>

            <!-- DESKRIPSI TEKS NARASI STRUKTUR -->
            <section class="bg-white border border-slate-200/90 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm space-y-4 text-slate-700 leading-relaxed text-sm sm:text-base">
                
                <p class="text-justify leading-relaxed">
                    Struktur organisasi RW dan RT Desa Lubuk Mandian Gajah merupakan susunan kelembagaan masyarakat yang berfungsi membantu pemerintah desa dalam mengatur, melayani, dan mengoordinasikan kebutuhan masyarakat di setiap wilayah.
                </p>

                <p class="text-justify leading-relaxed">
                    Desa Lubuk Mandian Gajah memiliki 4 Rukun Warga (RW), yaitu RW 01, RW 02, RW 03, dan RW 04. Masing-masing RW dipimpin oleh seorang Ketua RW dan membawahi beberapa Rukun Tetangga (RT). Secara keseluruhan terdapat 8 RT yang menjadi bagian dari struktur pelayanan masyarakat desa.
                </p>

                <p class="text-justify leading-relaxed">
                    Melalui struktur RW dan RT ini, koordinasi antara pemerintah desa dengan masyarakat dapat berjalan lebih efektif. Ketua RW dan RT berperan dalam menyampaikan informasi dari pemerintah desa kepada warga, membantu pelayanan administrasi, mengoordinasikan kegiatan kemasyarakatan, serta menjaga keamanan, ketertiban, dan kebersamaan di lingkungan masing-masing.
                </p>

            </section>

        </main>

        <!-- FOOTER SECTION -->
        <footer class="bg-[#235832] text-white pt-8 pb-8 px-5 sm:px-8 mt-10" x-data="{ activeFooterTab: null }">
            <div class="max-w-7xl mx-auto">
                
                <!-- Desktop Footer Grid (Ditampilkan langsung berdampingan tanpa accordion pada layar lg:) -->
                <div class="hidden lg:grid lg:grid-cols-4 lg:gap-8 pb-8 mb-8 border-b border-emerald-700/60">
                    <!-- Col 1: Identity -->
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-12 h-12 flex items-center justify-center shrink-0">
                                <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Desa Lubuk Mandian Gajah" class="h-12 w-auto object-contain">
                            </div>
                            <div>
                                <h4 class="text-base font-bold leading-tight">Desa Lubuk Mandian Gajah</h4>
                                <p class="text-xs text-emerald-200">Kabupaten Pelalawan</p>
                            </div>
                        </div>
                        <p class="text-xs text-emerald-100 leading-relaxed">
                            Website resmi Pemerintah Desa Lubuk Mandian Gajah, Kecamatan Bunut, Kabupaten Pelalawan, Provinsi Riau.
                        </p>
                    </div>

                    <!-- Col 2: Kontak Desa -->
                    <div>
                        <h5 class="text-sm font-bold text-white uppercase tracking-wider mb-3 flex items-center space-x-2">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <span>Kontak Desa</span>
                        </h5>
                        <ul class="text-xs text-emerald-100 space-y-2">
                            <li><strong class="text-white">Alamat:</strong> Jl. Lintas Bunut, Desa Lubuk Mandian Gajah, Kec. Bunut, Kab. Pelalawan, Riau 28382</li>
                            <li><strong class="text-white">Email:</strong> kantor.lubukmandiangajah@pelalawankab.go.id</li>
                            <li><strong class="text-white">Jam Kerja:</strong> Senin - Jumat (08:00 - 16:00 WIB)</li>
                        </ul>
                    </div>

                    <!-- Col 3: Nomor Telepon Penting -->
                    <div>
                        <h5 class="text-sm font-bold text-white uppercase tracking-wider mb-3 flex items-center space-x-2">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>Nomor Penting</span>
                        </h5>
                        <ul class="text-xs text-emerald-100 space-y-2">
                            <li><strong class="text-white">Polsek Bunut:</strong> 0812-7654-3210</li>
                            <li><strong class="text-white">Puskesmas Bunut:</strong> 0813-9876-5432</li>
                            <li><strong class="text-white">Ambulans Desa:</strong> 0852-1122-3344</li>
                        </ul>
                    </div>

                    <!-- Col 4: Sosial Media -->
                    <div>
                        <h5 class="text-sm font-bold text-white uppercase tracking-wider mb-3 flex items-center space-x-2">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                            </svg>
                            <span>Sosial Media</span>
                        </h5>
                        <ul class="text-xs text-emerald-100 space-y-2">
                            <li class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                <span>Facebook: Desa Lubuk Mandian Gajah</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                <span>Instagram: @desalubukmandiangajah</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                <span>YouTube: Desa Lubuk Mandian Gajah TV</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Mobile Accordion Footer (Hanya aktif pada layar kecil di bawah lg:) -->
                <div class="block lg:hidden">
                    <div class="flex items-center space-x-3 mb-4 pb-4 border-b border-emerald-700/60">
                        <div class="w-10 h-10 flex items-center justify-center shrink-0">
                            <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Desa Lubuk Mandian Gajah" class="h-12 w-auto object-contain">
                        </div>
                        <div>
                            <h4 class="text-sm font-bold leading-tight">Desa Lubuk Mandian Gajah</h4>
                            <p class="text-[11px] text-emerald-200">Kecamatan Bunut, Kabupaten Pelalawan, Riau</p>
                        </div>
                    </div>

                    <!-- Footer Collapsible Accordion Links -->
                    <div class="space-y-2 mb-6">
                        <!-- 1. Kontak Desa -->
                        <div class="border-b border-emerald-700/50 pb-2">
                            <button 
                                @click="activeFooterTab = activeFooterTab === 'kontak' ? null : 'kontak'"
                                class="w-full flex items-center justify-between text-xs font-semibold py-1.5 text-emerald-100 hover:text-white"
                            >
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span>Kontak Desa</span>
                                </span>
                                <svg class="w-3.5 h-3.5 text-emerald-300 transition-transform" :class="{ 'rotate-180': activeFooterTab === 'kontak' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="activeFooterTab === 'kontak'" x-collapse x-cloak class="pt-2 pb-1 text-[11px] text-emerald-200 space-y-1.5 pl-6">
                                <p><strong class="text-white">Alamat:</strong> Jl. Lintas Bunut, Desa Lubuk Mandian Gajah, Kec. Bunut, Kab. Pelalawan, Riau 28382</p>
                                <p><strong class="text-white">Email:</strong> kantor.lubukmandiangajah@pelalawankab.go.id</p>
                                <p><strong class="text-white">Jam Kerja:</strong> Senin - Jumat (08:00 - 16:00 WIB)</p>
                            </div>
                        </div>

                        <!-- 2. Nomor Telepon Penting -->
                        <div class="border-b border-emerald-700/50 pb-2">
                            <button 
                                @click="activeFooterTab = activeFooterTab === 'telepon' ? null : 'telepon'"
                                class="w-full flex items-center justify-between text-xs font-semibold py-1.5 text-emerald-100 hover:text-white"
                            >
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Nomor Telepon Penting</span>
                                </span>
                                <svg class="w-3.5 h-3.5 text-emerald-300 transition-transform" :class="{ 'rotate-180': activeFooterTab === 'telepon' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="activeFooterTab === 'telepon'" x-collapse x-cloak class="pt-2 pb-1 text-[11px] text-emerald-200 space-y-1.5 pl-6">
                                <p><strong class="text-white">Polsek Bunut:</strong> 0812-7654-3210</p>
                                <p><strong class="text-white">Puskesmas Bunut:</strong> 0813-9876-5432</p>
                                <p><strong class="text-white">Ambulans Desa:</strong> 0852-1122-3344</p>
                            </div>
                        </div>

                        <!-- 3. Sosial Media -->
                        <div class="border-b border-emerald-700/50 pb-2">
                            <button 
                                @click="activeFooterTab = activeFooterTab === 'sosmed' ? null : 'sosmed'"
                                class="w-full flex items-center justify-between text-xs font-semibold py-1.5 text-emerald-100 hover:text-white"
                            >
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                    </svg>
                                    <span>Sosial Media</span>
                                </span>
                                <svg class="w-3.5 h-3.5 text-emerald-300 transition-transform" :class="{ 'rotate-180': activeFooterTab === 'sosmed' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="activeFooterTab === 'sosmed'" x-collapse x-cloak class="pt-2 pb-1 text-[11px] text-emerald-200 space-y-1.5 pl-6">
                                <p><strong class="text-white">Facebook:</strong> Desa Lubuk Mandian Gajah</p>
                                <p><strong class="text-white">Instagram:</strong> @desalubukmandiangajah</p>
                                <p><strong class="text-white">YouTube:</strong> Desa Lubuk Mandian Gajah TV</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-emerald-800/60 mt-8 pt-6 flex flex-col sm:flex-row items-center justify-center text-center gap-2 sm:gap-4 text-xs text-emerald-200/80">
                    <p>© 2026 Pemerintah Desa Lubuk Mandian Gajah. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </footer>

        <!-- BOTTOM NAVIGATION BAR (FIXED BOTTOM ONLY ON MOBILE, HIDDEN ON lg:) -->
        <nav class="fixed bottom-0 left-0 right-0 max-w-md mx-auto bg-[#235832] text-white flex justify-around items-center py-2 px-3 border-t border-emerald-700/80 z-50 rounded-t-2xl shadow-2xl lg:hidden">
            <!-- 1. Beranda -->
            <a href="{{ url('/') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Beranda</span>
            </a>

            <!-- 2. Dokumen -->
            <a href="{{ url('/dokumen') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Dokumen</span>
            </a>

            <!-- 3. Struktur (Active Page) -->
            <a href="{{ url('/struktur') }}" class="flex flex-col items-center justify-center text-white py-1 px-3 rounded-xl bg-white/15 border border-white/20 transition-all">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-extrabold tracking-tight">Struktur</span>
            </a>

            <!-- 4. Peta Desa -->
            <a href="{{ url('/peta') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Peta Desa</span>
            </a>

            <!-- 5. Bantuan -->
            <a href="{{ url('/bantuan') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Bantuan</span>
            </a>
        </nav>

    </div>

</body>
</html>
