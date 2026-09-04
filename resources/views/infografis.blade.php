<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infografis & Data Desa - Desa Lubuk Mandian Gajah</title>

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
        <main class="px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10 max-w-4xl mx-auto space-y-6 sm:space-y-8">

            <!-- BREADCRUMB & HEADER TITLE BANNER -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200/80 pb-5">
                <div>
                    <div class="flex items-center space-x-2 text-xs font-semibold text-emerald-700 uppercase tracking-wider mb-1">
                        <a href="{{ url('/') }}" class="hover:underline text-slate-500">Beranda</a>
                        <span class="text-slate-400">/</span>
                        <span class="text-[#235832]">Infografis Desa</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-[#235832] tracking-tight">
                        Infografis & Data Desa
                    </h2>
                </div>
                
                <!-- Back to Home Button -->
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center space-x-2 text-xs sm:text-sm font-bold text-[#235832] bg-emerald-50 hover:bg-emerald-100 border border-emerald-200/80 px-4 py-2.5 rounded-xl transition-all shadow-sm self-start sm:self-auto group">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>

            <!-- INFOGRAFIS BANNER / MAIN GRAPHIC HEADER (Matching Figma Screen) -->
            <section class="bg-slate-50 p-5 sm:p-8 rounded-2xl sm:rounded-3xl border border-slate-200/80 shadow-sm flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6 text-center sm:text-left">
                <!-- Large Visual Chart/Mountain Icon Box (Matching Figma green icon box) -->
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-emerald-100 text-[#235832] border border-emerald-200/90 flex items-center justify-center shrink-0 shadow-inner">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
                
                <div>
                    <span class="text-[11px] sm:text-xs font-extrabold uppercase tracking-widest text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full inline-block mb-1.5">
                        Infografis
                    </span>
                    <h3 class="text-lg sm:text-2xl font-extrabold text-slate-900 leading-tight">
                        Desa Lubuk Mandian Gajah
                    </h3>
                    <p class="text-xs sm:text-sm font-semibold text-slate-600 mt-0.5">
                        Kecamatan Bunut, Kabupaten Pelalawan
                    </p>
                </div>
            </section>

            <!-- DIVIDER LINE -->
            <hr class="border-t-2 border-slate-200/80 my-4 sm:my-6">

            <!-- WADAH PETA EMBED GOOGLE MAPS STATIS (Rounded-2xl + Shadow-md) -->
            <section class="space-y-3">
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-md p-2 sm:p-3 overflow-hidden">
                    <div class="relative w-full h-64 sm:h-80 md:h-96 rounded-2xl overflow-hidden bg-slate-900 shadow-inner group">
                        
                        <!-- Embedded Google Maps Satellite Static Iframe -->
                        <iframe 
                            class="w-full h-full rounded-2xl border-0 pointer-events-none" 
                            src="https://maps.google.com/maps?q=Desa+Lubuk+Mandian+Gajah%2C+Kecamatan+Bunut%2C+Kabupaten+Pelalawan&t=h&z=15&ie=UTF8&iwloc=&output=embed"
                            loading="lazy" 
                            title="Peta Satelit Desa Lubuk Mandian Gajah"
                        ></iframe>

                        <!-- Transparent Overlay to disable interactions completely -->
                        <div class="absolute inset-0 z-10 bg-transparent"></div>

                        <!-- Top Floating Badge -->
                        <div class="absolute top-3 left-3 z-20 bg-black/70 backdrop-blur-md text-white text-[11px] sm:text-xs px-3 py-1.5 rounded-full border border-white/20 font-semibold flex items-center space-x-2 pointer-events-none">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Peta Satelit Pemukiman Desa</span>
                        </div>
                    </div>
                </div>
                <!-- Caption Text Below Map Container -->
                <p class="text-xs sm:text-sm text-slate-500 italic text-center font-medium leading-relaxed">
                    Peta Kawasan Pusat Desa Lubuk Mandian Gajah (Lapangan Bola & SDN 007 LMG)
                </p>
            </section>

            <!-- STATISTIK RINGKAS DATA DESA (Key Metrics Grid Dinamis) -->
            <section class="space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-base sm:text-lg font-extrabold text-[#235832]">Statistik & Kependudukan Desa</h3>
                    <span class="text-xs font-semibold text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
                        {{ count($statistik ?? []) }} Indicator Data
                    </span>
                </div>
                
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                    @forelse($statistik ?? [] as $stat)
                        <div class="bg-emerald-50/80 p-4 rounded-2xl border border-emerald-100/90 text-center shadow-2xs hover:shadow-sm transition-all group">
                            <p class="text-[11px] font-extrabold uppercase text-emerald-800 tracking-wider truncate">{{ $stat->label }}</p>
                            <p class="text-lg sm:text-xl font-black text-[#235832] mt-1 group-hover:scale-105 transition-transform">{{ $stat->jumlah }}</p>
                            @if($stat->kategori)
                                <p class="text-[10px] text-slate-500 font-semibold mt-0.5">Kategori: {{ $stat->kategori }}</p>
                            @endif
                        </div>
                    @empty
                        <div class="bg-emerald-50/80 p-3.5 sm:p-4 rounded-2xl border border-emerald-100 text-center">
                            <p class="text-[11px] font-bold uppercase text-emerald-800 tracking-wider">Kode Wilayah</p>
                            <p class="text-sm sm:text-base font-extrabold text-[#235832] mt-1">14.05.08.2013</p>
                        </div>
                        <div class="bg-emerald-50/80 p-3.5 sm:p-4 rounded-2xl border border-emerald-100 text-center">
                            <p class="text-[11px] font-bold uppercase text-emerald-800 tracking-wider">Luas Wilayah</p>
                            <p class="text-sm sm:text-base font-extrabold text-[#235832] mt-1">17,54 km²</p>
                        </div>
                        <div class="bg-emerald-50/80 p-3.5 sm:p-4 rounded-2xl border border-emerald-100 text-center">
                            <p class="text-[11px] font-bold uppercase text-emerald-800 tracking-wider">Tahun Definitif</p>
                            <p class="text-sm sm:text-base font-extrabold text-[#235832] mt-1">18 Mei 2001</p>
                        </div>
                        <div class="bg-emerald-50/80 p-3.5 sm:p-4 rounded-2xl border border-emerald-100 text-center">
                            <p class="text-[11px] font-bold uppercase text-emerald-800 tracking-wider">Kecamatan</p>
                            <p class="text-sm sm:text-base font-extrabold text-[#235832] mt-1">Bunut</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- KONTEN TEKS DESKRIPSI & SEJARAH DESA (Matching Figma Text Format) -->
            <section class="bg-white border border-slate-200/90 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm space-y-6 text-slate-700 leading-relaxed text-sm sm:text-base">
                
                <!-- Section 1: Deskripsi Desa Lubuk Mandian Gajah -->
                <div class="space-y-3">
                    <h3 class="text-base sm:text-lg lg:text-xl font-extrabold text-[#235832] text-center sm:text-left border-b border-slate-100 pb-2">
                        Deskripsi Desa Lubuk Mandian Gajah
                    </h3>

                    <!-- Paragraf 1 -->
                    <p class="text-justify leading-relaxed text-slate-700">
                        Desa Lubuk Mandian Gajah merupakan salah satu desa yang berada di Kecamatan Bunut, Kabupaten Pelalawan, Provinsi Riau. Desa ini memiliki kode wilayah <strong class="text-slate-900 font-bold">14.05.08.2013</strong> dan luas wilayah sekitar <strong class="text-slate-900 font-bold">17,54 km²</strong> atau <strong class="text-slate-900 font-bold">1.754 hektare</strong> berdasarkan data BPS Kabupaten Pelalawan.
                    </p>

                    <!-- Paragraf 2 -->
                    <p class="text-justify leading-relaxed text-slate-700">
                        Desa Lubuk Mandian Gajah memiliki sejarah pemekaran dari Desa Merbau. Pada tahun 2000 masyarakat mengajukan pemekaran desa, dan pada tanggal <strong class="text-slate-900 font-bold">18 Mei 2001</strong> Lubuk Mandian Gajah ditetapkan sebagai desa definitif.
                    </p>
                </div>

                <!-- Section 2: Kondisi Geografis -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-base sm:text-lg lg:text-xl font-extrabold text-[#235832] text-center sm:text-left border-b border-slate-100 pb-2">
                        Kondisi Geografis
                    </h3>

                    <!-- Deskripsi Kondisi Geografis -->
                    <p class="text-justify leading-relaxed text-slate-700">
                        Secara geografis, Desa Lubuk Mandian Gajah berada di wilayah Kecamatan Bunut, Kabupaten Pelalawan. Berdasarkan data yang tersedia, wilayah desa memiliki luas 17,54 km² dan berada di kawasan dataran rendah yang didominasi oleh perbukitan landai, kawasan perkebunan kelapa sawit serta karet, serta didukung oleh iklim tropis yang subur untuk kegiatan agraris dan permukiman warga.
                    </p>
                </div>

            </section>

        </main>

        <!-- FOOTER SECTION -->
        <footer class="bg-[#235832] text-white pt-8 pb-8 px-5 sm:px-8 mt-8" x-data="{ activeFooterTab: null }">
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

            <!-- 2. Dokumen / Infografis (Active Page) -->
            <a href="{{ url('/infografis') }}" class="flex flex-col items-center justify-center text-white py-1 px-3 rounded-xl bg-white/15 border border-white/20 transition-all">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-extrabold tracking-tight">Infografis</span>
            </a>

            <!-- 3. Peta Desa -->
            <a href="{{ url('/peta') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Peta Desa</span>
            </a>

            <!-- 4. Bantuan -->
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
