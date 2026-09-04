<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Berita & Kabar Desa - Desa Lubuk Mandian Gajah</title>

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

    <!-- Main Responsive Container -->
    <div class="w-full max-w-md lg:max-w-7xl mx-auto bg-white min-h-screen sm:min-h-0 sm:rounded-2xl lg:rounded-3xl sm:shadow-xl lg:shadow-2xl overflow-hidden relative pb-20 lg:pb-0 border border-slate-200/60">

        <!-- HEADER SECTION -->
        <header class="bg-[#235832] text-white px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4 flex items-center justify-between shadow-md sticky top-0 z-40">
            <!-- Left: Village Logo & Title -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <a href="{{ url('/') }}" class="p-1.5 rounded-full bg-white/10 hover:bg-white/20 transition-all text-white shrink-0 flex items-center justify-center lg:hidden" title="Kembali ke Beranda">
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
        <main class="px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10 max-w-6xl mx-auto space-y-8 sm:space-y-10" x-data="beritaApp()">

            <!-- BREADCRUMB & PAGE HEADER TITLE -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200/80 pb-6">
                <div>
                    <div class="flex items-center space-x-2 text-xs font-semibold text-emerald-700 uppercase tracking-wider mb-1">
                        <a href="{{ url('/') }}" class="hover:underline text-slate-500">Beranda</a>
                        <span class="text-slate-400">/</span>
                        <span class="text-[#235832]">Kabar Desa</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#235832] tracking-tight">
                        Kabar & Berita Desa Lubuk Mandian Gajah
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 font-medium leading-relaxed mt-1 max-w-2xl">
                        Informasi terbaru, pengumuman resmi, dan liputan kegiatan masyarakat desa.
                    </p>
                </div>

                <!-- Back to Home Button -->
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center space-x-2 text-xs sm:text-sm font-bold text-[#235832] bg-emerald-50 hover:bg-emerald-100 border border-emerald-200/80 px-4 py-2.5 rounded-xl transition-all shadow-sm self-start sm:self-auto group shrink-0">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>

            <!-- FEATURED NEWS (1 CARD BESAR DI ATAS) -->
            @if(isset($beritas) && $beritas->count() > 0)
                @php $featured = $beritas->first(); @endphp
                <section class="space-y-3">
                    <div class="flex items-center space-x-2 text-xs font-bold text-slate-400 uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                        <span>Berita Utama / Headline</span>
                    </div>

                    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-lg overflow-hidden grid grid-cols-1 lg:grid-cols-12 group hover:border-emerald-500/60 transition-all">
                        
                        <!-- Left: Featured Banner Image -->
                        <div class="lg:col-span-7 relative h-64 sm:h-80 lg:h-auto overflow-hidden bg-slate-900">
                            <img src="{{ $featured->gambar ? asset($featured->gambar) : asset('images/kantor-desa.png') }}" alt="{{ $featured->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent lg:hidden"></div>
                            <div class="absolute top-4 left-4">
                                <span class="bg-emerald-100/95 text-emerald-800 text-xs font-extrabold px-3 py-1 rounded-full border border-emerald-300/80 shadow-sm backdrop-blur-sm">
                                    {{ strtoupper($featured->kategori ?? 'Berita') }}
                                </span>
                            </div>
                        </div>

                        <!-- Right: Featured Content -->
                        <div class="lg:col-span-5 p-6 sm:p-8 flex flex-col justify-between space-y-4">
                            <div class="space-y-3">
                                <div class="flex items-center space-x-3 text-xs text-slate-500 font-semibold">
                                    <span class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($featured->tanggal_publikasi ?? $featured->created_at)->isoFormat('D MMMM Y') }}</span>
                                    </span>
                                    <span>•</span>
                                    <span>{{ $featured->penulis ?? 'Admin Desa' }}</span>
                                </div>

                                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 group-hover:text-[#235832] transition-colors leading-snug">
                                    {{ $featured->judul }}
                                </h3>

                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-medium line-clamp-3 sm:line-clamp-4">
                                    {{ Str::limit(strip_tags($featured->isi_berita), 220) }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-400">Est. 3 mnt baca</span>
                                <button class="inline-flex items-center space-x-2 text-xs font-extrabold text-white bg-[#235832] hover:bg-[#1b4527] px-4 py-2.5 rounded-xl shadow-md transition-all">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                </section>
            @endif

            <!-- SEARCH BAR & CATEGORY FILTER BAR -->
            <section class="space-y-4 pt-2">
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-200/80">
                    
                    <!-- Category Pills Filter -->
                    <div class="flex items-center space-x-2 overflow-x-auto pb-1 sm:pb-0 scrollbar-none">
                        <button 
                            @click="activeCategory = 'semua'" 
                            :class="activeCategory === 'semua' ? 'bg-[#235832] text-white font-bold' : 'bg-white text-slate-600 hover:bg-slate-100 font-semibold border border-slate-200'"
                            class="px-4 py-2 text-xs rounded-xl transition-all shrink-0 shadow-sm"
                        >
                            Semua Berita
                        </button>
                    </div>

                    <!-- Search Input Box -->
                    <div class="relative min-w-[240px]">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            x-model="searchQuery" 
                            placeholder="Cari berita atau kegiatan..." 
                            class="w-full pl-10 pr-4 py-2 text-xs bg-white border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#235832] focus:border-[#235832] focus:outline-none transition shadow-sm"
                        >
                    </div>

                </div>
            </section>

            <!-- NEWS GRID CONTAINER -->
            <section class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($beritas ?? [] as $item)
                        <div 
                            x-show="shouldShow('{{ strtolower($item->kategori) }}', '{{ addslashes($item->judul) }}', '{{ addslashes(Str::limit(strip_tags($item->isi_berita), 120)) }}')" 
                            class="bg-white rounded-2xl border border-slate-200/90 shadow-md overflow-hidden flex flex-col justify-between hover:shadow-xl hover:border-emerald-500/60 transition-all duration-300 group"
                        >
                            <div>
                                <!-- Image Thumbnail -->
                                <div class="relative h-48 bg-slate-800 overflow-hidden">
                                    <img src="{{ $item->gambar ? asset($item->gambar) : asset('images/kantor-desa.png') }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute top-3 left-3">
                                        <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider border shadow-sm backdrop-blur-sm bg-emerald-100 text-emerald-800 border-emerald-300">
                                            {{ $item->kategori ?? 'Umum' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Card Content Body -->
                                <div class="p-5 space-y-2.5">
                                    <div class="flex items-center space-x-2 text-[11px] text-slate-400 font-semibold">
                                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($item->tanggal_publikasi ?? $item->created_at)->isoFormat('D MMMM Y') }}</span>
                                    </div>

                                    <h4 class="text-base font-extrabold text-slate-800 group-hover:text-[#235832] transition-colors leading-snug line-clamp-2">
                                        {{ $item->judul }}
                                    </h4>

                                    <p class="text-xs text-slate-600 leading-relaxed font-medium line-clamp-3">
                                        {{ Str::limit(strip_tags($item->isi_berita), 130) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Card Footer Action -->
                            <div class="p-5 pt-0">
                                <button class="w-full inline-flex items-center justify-center space-x-2 text-xs font-bold text-[#235832] bg-emerald-50 hover:bg-[#235832] hover:text-white border border-emerald-200/80 py-2.5 px-4 rounded-xl transition-all shadow-sm">
                                    <span>Baca Berita</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center text-slate-400 italic">
                            Belum ada berita terpublikasi.
                        </div>
                    @endforelse
                </div>

            </section>

        </main>

        <!-- FOOTER SECTION -->
        <footer class="bg-[#235832] text-white pt-8 pb-8 px-5 sm:px-8 mt-10">
            <div class="max-w-7xl mx-auto text-center space-y-3">
                <p class="text-xs text-emerald-200">
                    Pemerintah Desa Lubuk Mandian Gajah, Kecamatan Bunut, Kabupaten Pelalawan, Provinsi Riau.
                </p>
                <div class="border-t border-emerald-800/60 mt-8 pt-6 flex flex-col sm:flex-row items-center justify-center text-center gap-2 sm:gap-4 text-xs text-emerald-200/80">
                    <p>© 2026 Pemerintah Desa Lubuk Mandian Gajah. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </footer>

        <!-- BOTTOM NAVIGATION BAR FOR MOBILE -->
        <nav class="fixed bottom-0 left-0 right-0 max-w-md mx-auto bg-[#235832] text-white flex justify-around items-center py-2 px-3 border-t border-emerald-700/80 z-50 rounded-t-2xl shadow-2xl lg:hidden">
            <a href="{{ url('/') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Beranda</span>
            </a>
            <a href="{{ url('/berita') }}" class="flex flex-col items-center justify-center text-white py-1 px-3 rounded-xl bg-white/15 border border-white/20 transition-all">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-extrabold tracking-tight">Berita</span>
            </a>
            <a href="{{ url('/galeri') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Galeri</span>
            </a>
            <a href="{{ url('/bantuan') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Bantuan</span>
            </a>
        </nav>

    </div>

    <!-- Alpine JS Berita State & Filter Handler -->
    <script>
        function beritaApp() {
            return {
                activeCategory: 'semua',
                searchQuery: '',
                shouldShow(catKey, judul, ringkasan) {
                    const matchCategory = this.activeCategory === 'semua' || catKey === this.activeCategory;
                    const matchSearch = !this.searchQuery || 
                                      judul.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                      ringkasan.toLowerCase().includes(this.searchQuery.toLowerCase());
                    return matchCategory && matchSearch;
                }
            }
        }
    </script>
</body>
</html>
