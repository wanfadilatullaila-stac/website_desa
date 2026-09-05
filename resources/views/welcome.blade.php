<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Lubuk Mandian Gajah - Kabupaten Pelalawan</title>

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
            <!-- Left: Village Logo & Title -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center shrink-0">
                    <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Desa Lubuk Mandian Gajah" class="h-12 w-auto object-contain">
                </div>
                <div>
                    <h1 class="text-sm sm:text-base lg:text-lg font-extrabold leading-tight tracking-wide text-white">Desa Lubuk Mandian Gajah</h1>
                    <p class="text-[11px] sm:text-xs text-emerald-100 font-medium tracking-normal opacity-90">Kecamatan Bunut, Kabupaten Pelalawan</p>
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

        <!-- HERO SECTION -->
        <section class="relative bg-slate-900 text-white">
            <div class="h-48 sm:h-64 lg:h-80 w-full relative overflow-hidden">
                <img src="{{ isset($profil) && $profil->foto_banner ? asset($profil->foto_banner) : asset('images/kantor-desa.png') }}" alt="Kantor Desa Lubuk Mandian Gajah" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent"></div>
            </div>
            
            <!-- Hero Text Banner Card Overlay -->
            <div class="absolute bottom-4 sm:bottom-6 left-4 sm:left-8 right-4 sm:right-8 text-center lg:text-left">
                <div class="bg-black/65 backdrop-blur-md p-4 sm:p-6 rounded-2xl border border-white/15 shadow-xl max-w-2xl">
                    <span class="inline-block px-3 py-1 mb-2 text-[10px] sm:text-xs uppercase tracking-widest font-extrabold bg-emerald-500 text-white rounded-full">
                        Media Informasi & Pelayanan Publik
                    </span>
                    <h2 class="text-base sm:text-2xl lg:text-3xl font-extrabold text-white leading-snug tracking-tight">
                        Selamat Datang di Website Resmi<br>
                        <span class="text-emerald-300">Desa Lubuk Mandian Gajah</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-200 mt-1 font-medium">
                        Kecamatan Bunut, Kabupaten Pelalawan, Provinsi Riau
                    </p>
                </div>
            </div>
        </section>

        <!-- MENU LAYANAN & SAMBUTAN KEPALA DESA -->
        <section class="p-4 sm:p-6 lg:p-8 bg-emerald-50/40 border-b border-slate-100">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
                    
                    <!-- LEFT: Menu Layanan Cepat -->
                    <div class="lg:col-span-7 bg-white p-5 sm:p-6 lg:p-8 rounded-3xl border border-slate-200/80 shadow-sm h-full flex flex-col justify-between space-y-5">
                        <div>
                            <h3 class="text-xs uppercase font-bold text-emerald-700 tracking-wider">LAYANAN & AKSES PUBLIK</h3>
                            <h2 class="text-xl font-bold text-slate-800 mt-0.5">Jelajahi Desa Lubuk Mandian Gajah</h2>
                            <p class="text-xs text-slate-500 mt-1 mb-5">Akses cepat informasi profil, data statistik, dokumen warga, dan tata kelola desa.</p>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3.5 sm:gap-4">
                                <!-- 1. Profile Desa -->
                                <a href="#profil" class="bg-slate-50/70 border border-slate-200/80 rounded-2xl p-4 sm:p-5 transition-all duration-300 hover:bg-white hover:border-emerald-600/40 hover:shadow-lg hover:-translate-y-1 group flex flex-col items-center justify-center text-center">
                                    <div class="bg-white group-hover:bg-[#235832] border border-slate-200 p-3.5 rounded-2xl shadow-xs transition-colors duration-300 text-emerald-800 group-hover:text-white mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-slate-700 text-xs sm:text-sm group-hover:text-[#235832] transition-colors">Profile Desa</span>
                                </a>

                                <!-- 2. Infografis -->
                                <a href="{{ url('/infografis') }}" class="bg-slate-50/70 border border-slate-200/80 rounded-2xl p-4 sm:p-5 transition-all duration-300 hover:bg-white hover:border-emerald-600/40 hover:shadow-lg hover:-translate-y-1 group flex flex-col items-center justify-center text-center">
                                    <div class="bg-white group-hover:bg-[#235832] border border-slate-200 p-3.5 rounded-2xl shadow-xs transition-colors duration-300 text-emerald-800 group-hover:text-white mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-slate-700 text-xs sm:text-sm group-hover:text-[#235832] transition-colors">Infografis</span>
                                </a>

                                <!-- 3. Dokumen -->
                                <a href="{{ url('/dokumen') }}" class="bg-slate-50/70 border border-slate-200/80 rounded-2xl p-4 sm:p-5 transition-all duration-300 hover:bg-white hover:border-emerald-600/40 hover:shadow-lg hover:-translate-y-1 group flex flex-col items-center justify-center text-center">
                                    <div class="bg-white group-hover:bg-[#235832] border border-slate-200 p-3.5 rounded-2xl shadow-xs transition-colors duration-300 text-emerald-800 group-hover:text-white mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-slate-700 text-xs sm:text-sm group-hover:text-[#235832] transition-colors">Dokumen</span>
                                </a>

                                <!-- 4. Galeri -->
                                <a href="{{ url('/galeri') }}" class="bg-slate-50/70 border border-slate-200/80 rounded-2xl p-4 sm:p-5 transition-all duration-300 hover:bg-white hover:border-emerald-600/40 hover:shadow-lg hover:-translate-y-1 group flex flex-col items-center justify-center text-center">
                                    <div class="bg-white group-hover:bg-[#235832] border border-slate-200 p-3.5 rounded-2xl shadow-xs transition-colors duration-300 text-emerald-800 group-hover:text-white mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-slate-700 text-xs sm:text-sm group-hover:text-[#235832] transition-colors">Galeri</span>
                                </a>

                                <!-- 5. Peta Desa -->
                                <a href="{{ url('/peta') }}" class="bg-slate-50/70 border border-slate-200/80 rounded-2xl p-4 sm:p-5 transition-all duration-300 hover:bg-white hover:border-emerald-600/40 hover:shadow-lg hover:-translate-y-1 group flex flex-col items-center justify-center text-center">
                                    <div class="bg-white group-hover:bg-[#235832] border border-slate-200 p-3.5 rounded-2xl shadow-xs transition-colors duration-300 text-emerald-800 group-hover:text-white mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-slate-700 text-xs sm:text-sm group-hover:text-[#235832] transition-colors">Peta Desa</span>
                                </a>

                                <!-- 6. Struktur Organisasi -->
                                <a href="{{ url('/struktur') }}" class="bg-slate-50/70 border border-slate-200/80 rounded-2xl p-4 sm:p-5 transition-all duration-300 hover:bg-white hover:border-emerald-600/40 hover:shadow-lg hover:-translate-y-1 group flex flex-col items-center justify-center text-center">
                                    <div class="bg-white group-hover:bg-[#235832] border border-slate-200 p-3.5 rounded-2xl shadow-xs transition-colors duration-300 text-emerald-800 group-hover:text-white mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-slate-700 text-xs sm:text-sm group-hover:text-[#235832] transition-colors">Struktur Organisasi</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT: Sambutan Kepala Desa -->
                    <div class="lg:col-span-5 bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm h-full flex flex-col justify-between">
                        <div class="space-y-4">
                            <!-- Header Row with Quote Icon -->
                            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                <div>
                                    <span class="text-xs uppercase font-bold text-emerald-700 tracking-wider">PIMPINAN DESA</span>
                                    <h4 class="text-xs sm:text-sm font-bold text-slate-800 mt-0.5">Sambutan Kepala Desa</h4>
                                </div>
                                <svg class="w-8 h-8 text-emerald-600/20 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>

                            <!-- Body Row: Photo on Left, Details on Right -->
                            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4">
                                <div class="relative w-24 h-24 sm:w-28 sm:h-28 rounded-full p-1 border-2 border-emerald-600/30 bg-emerald-50/50 shadow-md shrink-0">
                                    <img src="{{ isset($profil) && $profil->foto_kepala_desa ? asset($profil->foto_kepala_desa) : asset('images/kepala-desa.jpg') }}" alt="Kepala Desa Lubuk Mandian Gajah" class="w-full h-full object-cover rounded-full">
                                </div>
                                <div class="text-center sm:text-left space-y-1">
                                    <h3 class="text-lg font-extrabold text-slate-900 tracking-tight">{{ $profil->nama_kepala_desa ?? 'MUSLICH, SE' }}</h3>
                                    <p class="text-xs font-bold text-emerald-700 uppercase tracking-wider">KEPALA DESA LUBUK MANDIAN GAJAH</p>
                                    <p class="text-xs text-slate-600 leading-relaxed pt-2 italic">
                                        "{{ $profil->sambutan_kepala_desa ?? 'Selamat datang di Website Resmi Desa Lubuk Mandian Gajah. Melalui wadah digital ini, kami berupaya menyajikan pelayanan publik yang terbuka, cepat, dan terpercaya guna melangkah bersama menuju desa yang mandiri dan sejahtera.' }}"
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- WIDGET RINGKASAN STATISTIK DESA (DINAMIS DARI DATABASE) -->
        <section class="bg-[#235832] text-white py-6 px-4 sm:px-6 lg:px-8 border-y border-emerald-800">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        <h3 class="text-xs sm:text-sm font-extrabold uppercase tracking-wider text-emerald-100">Statistik & Infografis Desa</h3>
                    </div>
                    <a href="{{ url('/infografis') }}" class="text-xs font-bold text-emerald-200 hover:text-white flex items-center space-x-1">
                        <span>Lihat Selengkapnya</span>
                        <span>&rarr;</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 text-center">
                    @forelse($statistik ?? [] as $stat)
                        <div class="bg-white/10 backdrop-blur-sm p-3 rounded-2xl border border-white/15 hover:bg-white/20 transition-all">
                            <div class="text-[11px] text-emerald-200 font-semibold uppercase tracking-wider truncate">{{ $stat->label }}</div>
                            <div class="text-base sm:text-lg font-black text-white mt-1">{{ $stat->jumlah }}</div>
                        </div>
                    @empty
                        <div class="bg-white/10 backdrop-blur-sm p-3 rounded-2xl border border-white/15">
                            <div class="text-[11px] text-emerald-200 font-semibold uppercase tracking-wider">Total Warga</div>
                            <div class="text-base sm:text-lg font-black text-white mt-1">2.845</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm p-3 rounded-2xl border border-white/15">
                            <div class="text-[11px] text-emerald-200 font-semibold uppercase tracking-wider">Total KK</div>
                            <div class="text-base sm:text-lg font-black text-white mt-1">742</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- BAGIAN INFORMASI & PROFIL (ACCORDION) -->
        <section id="profil" class="p-4 sm:p-6 lg:p-8 bg-slate-50" x-data="{ openAccordion: 'sejarah' }">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Profil & Informasi</h3>
                        <h2 class="text-lg sm:text-2xl font-extrabold text-slate-900">Tentang Desa Lubuk Mandian Gajah</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
                    <!-- Deskripsi Ringkasan Wilayah (Left Column on Desktop) -->
                    <div class="lg:col-span-5 bg-white p-5 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm h-full flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 mb-3 text-xs font-bold text-emerald-800 bg-emerald-100 rounded-full">
                                Gambaran Umum
                            </span>
                            <h4 class="text-base sm:text-lg font-bold text-slate-800 mb-2">Wilayah & Potensi Desa</h4>
                            <p class="text-xs sm:text-sm leading-relaxed text-slate-600 text-justify">
                                {{ $profil->deskripsi_singkat ?? 'Desa Lubuk Mandian Gajah merupakan salah satu desa yang berada di Kabupaten Pelalawan, Provinsi Riau. Desa ini memiliki potensi di bidang perkebunan, khususnya kelapa sawit dan karet, serta kehidupan masyarakat yang erat dengan lingkungan dan budaya lokal.' }}
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                            <span>Kecamatan Bunut</span>
                            <span>•</span>
                            <span>Kabupaten Pelalawan</span>
                            <span>•</span>
                            <span>Riau</span>
                        </div>
                    </div>

                    <!-- Accordion Items (Right Column on Desktop) -->
                    <div class="lg:col-span-7 space-y-3 sm:space-y-4">
                        <!-- Visi -->
                        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition-all">
                            <button 
                                @click="openAccordion = openAccordion === 'visi' ? null : 'visi'" 
                                class="w-full px-5 py-4 flex items-center justify-between text-left font-bold text-xs sm:text-sm text-slate-800 hover:bg-slate-50 transition-colors"
                            >
                                <span class="flex items-center space-x-3">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#235832]"></span>
                                    <span>Visi Desa</span>
                                </span>
                                <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': openAccordion === 'visi' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div x-show="openAccordion === 'visi'" x-collapse x-cloak class="px-5 pb-5 pt-1 text-xs sm:text-sm text-slate-600 border-t border-slate-100">
                                <p class="leading-relaxed font-semibold bg-emerald-50/70 p-4 rounded-xl border border-emerald-100 text-emerald-950">
                                    "{{ $profil->visi ?? 'Mewujudkan Bunut Sebagai Kota Pendidikan yang Agamis Berbasiskan Melayu.' }}"
                                </p>
                            </div>
                        </div>

                        <!-- Misi -->
                        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition-all">
                            <button 
                                @click="openAccordion = openAccordion === 'misi' ? null : 'misi'" 
                                class="w-full px-5 py-4 flex items-center justify-between text-left font-bold text-xs sm:text-sm text-slate-800 hover:bg-slate-50 transition-colors"
                            >
                                <span class="flex items-center space-x-3">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#235832]"></span>
                                    <span>Misi Desa</span>
                                </span>
                                <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': openAccordion === 'misi' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="openAccordion === 'misi'" x-collapse x-cloak class="px-5 pb-5 pt-1 text-xs sm:text-sm text-slate-600 border-t border-slate-100">
                                <div class="bg-emerald-50/70 p-4 rounded-xl border border-emerald-100 text-emerald-950 leading-relaxed font-medium">
                                    {{ $profil->misi ?? 'Meningkatkan pelayanan publik, efisiensi birokrasi, sarana prasarana fisik, dan pemberdayaan ekonomi masyarakat.' }}
                                </div>
                            </div>
                        </div>

                        <!-- Sejarah Desa -->
                        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition-all">
                            <button 
                                @click="openAccordion = openAccordion === 'sejarah' ? null : 'sejarah'" 
                                class="w-full px-5 py-4 flex items-center justify-between text-left font-bold text-xs sm:text-sm text-slate-800 hover:bg-slate-50 transition-colors"
                            >
                                <span class="flex items-center space-x-3">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#235832]"></span>
                                    <span>Sejarah Desa</span>
                                </span>
                                <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': openAccordion === 'sejarah' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="openAccordion === 'sejarah'" x-collapse x-cloak class="px-5 pb-5 pt-1 text-xs sm:text-sm text-slate-600 border-t border-slate-100">
                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center mb-3">
                                    <div class="sm:col-span-5 rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                                        <img src="{{ asset('images/rumah-adat-melayu.png') }}" alt="Rumah Adat Balai Melayu" class="w-full h-36 object-cover">
                                    </div>
                                    <div class="sm:col-span-7">
                                        <p class="leading-relaxed text-justify">
                                            Secara kesejarahan wilayah Desa Lubuk Mandian Gajah merupakan bagian wilayah Batin Bunut sehingga masyarakat di wilayah ini awalnya adalah Orang Petabangan yang berasal dari warga Kepenghuluan Desa Merbau.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BAGIAN BERITA & KABAR TERKINI DESA -->
        <section id="berita" class="p-4 sm:p-6 lg:p-8 bg-white border-t border-slate-200/80">
            <div class="max-w-7xl mx-auto space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs uppercase font-bold text-emerald-700 tracking-wider">KABAR TERKINI</span>
                        <h2 class="text-lg sm:text-2xl font-extrabold text-slate-900 mt-0.5">Berita & Informasi Desa</h2>
                    </div>
                    <a href="{{ url('/berita') }}" class="text-xs sm:text-sm font-bold text-[#235832] hover:text-[#1b4527] flex items-center space-x-1">
                        <span>Lihat Semua Berita</span>
                        <span>&rarr;</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($beritas ?? [] as $berita)
                        <div class="bg-slate-50/80 rounded-2xl border border-slate-200/90 overflow-hidden flex flex-col justify-between hover:shadow-lg hover:border-emerald-500/60 transition-all duration-300 group">
                            <div>
                                <div class="relative h-48 bg-slate-800 overflow-hidden">
                                    <img src="{{ $berita->gambar ? asset($berita->gambar) : asset('images/kantor-desa.png') }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute top-3 left-3">
                                        <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider border shadow-sm backdrop-blur-sm bg-emerald-100 text-emerald-800 border-emerald-300">
                                            {{ $berita->kategori ?? 'Sosial & Budaya' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-5 space-y-2">
                                    <div class="flex items-center space-x-2 text-[11px] text-slate-400 font-semibold">
                                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($berita->tanggal_publikasi ?? $berita->created_at)->isoFormat('D MMMM Y') }}</span>
                                    </div>
                                    <h4 class="text-base font-extrabold text-slate-900 group-hover:text-[#235832] transition-colors leading-snug line-clamp-2">
                                        <a href="{{ route('berita.detail', $berita->id) }}" class="hover:underline">
                                            {{ $berita->judul }}
                                        </a>
                                    </h4>
                                    <p class="text-xs text-slate-600 leading-relaxed font-medium line-clamp-3">
                                        {{ $berita->ringkasan ?: Str::limit(strip_tags($berita->isi_berita), 130) }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-5 pt-0">
                                <a href="{{ route('berita.detail', $berita->id) }}" class="w-full inline-flex items-center justify-center space-x-2 text-xs font-bold text-[#235832] bg-white hover:bg-[#235832] hover:text-white border border-slate-200 py-2 px-4 rounded-xl transition-all shadow-xs">
                                    <span>Baca Berita &rarr;</span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-8 text-center text-slate-400 italic">
                            Belum ada berita desa terpublikasi.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- FOOTER SECTION -->
        <footer class="bg-[#235832] text-white pt-8 pb-8 px-5 sm:px-8" x-data="{ activeFooterTab: null }">
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
                            <li><strong class="text-white">Nama-Nama:</strong> Created by Laila,icil,Lala,Cece,Anggi,Ijak</li>
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
            <!-- 1. Beranda (Active) -->
            <a href="#" class="flex flex-col items-center justify-center text-white py-1 px-4 rounded-xl bg-white/15 border border-white/20 transition-all">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-[11px] font-extrabold tracking-tight">Beranda</span>
            </a>

            <!-- 2. Berita -->
            <a href="{{ url('/berita') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-4 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <span class="text-[11px] font-semibold tracking-tight">Berita</span>
            </a>

            <!-- 3. Bantuan -->
            <a href="{{ url('/bantuan') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-4 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span class="text-[11px] font-semibold tracking-tight">Bantuan</span>
            </a>
        </nav>

    </div>

</body>
</html>
