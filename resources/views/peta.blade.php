<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peta Wilayah Desa - Desa Lubuk Mandian Gajah</title>

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

            <!-- PAGE TITLE & NAVIGATION BANNER -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200/80 pb-5">
                <div>
                    <div class="flex items-center space-x-2 text-xs font-semibold text-emerald-700 uppercase tracking-wider mb-1">
                        <a href="{{ url('/') }}" class="hover:underline text-slate-500">Beranda</a>
                        <span class="text-slate-400">/</span>
                        <span class="text-[#235832]">Peta Wilayah</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-[#235832] tracking-tight">
                        Peta Desa Lubuk Mandian Gajah
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

            <!-- INTERACTIVE MAP CONTAINER SECTION -->
            <section class="space-y-4">
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-md p-2 sm:p-3 overflow-hidden">
                    <div class="relative w-full h-[300px] sm:h-[400px] lg:h-[480px] rounded-2xl overflow-hidden bg-slate-900 shadow-inner group">
                        
                        <!-- Embedded Google Maps Interactive Iframe -->
                        <iframe 
                            class="w-full h-full rounded-2xl border-0" 
                            src="https://maps.google.com/maps?q=Desa+Lubuk+Mandian+Gajah%2C+Kecamatan+Bunut%2C+Kabupaten+Pelalawan%2C+Riau&t=h&z=14&ie=UTF8&iwloc=&output=embed"
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Interaktif Desa Lubuk Mandian Gajah"
                        ></iframe>

                        <!-- Top Floating Interactive Badge -->
                        <div class="absolute top-3 left-3 bg-black/75 backdrop-blur-md text-white text-[11px] sm:text-xs px-3 py-1.5 rounded-full border border-white/20 font-semibold flex items-center space-x-2 pointer-events-none shadow-lg">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Peta Interaktif (Satelit & Lanskap)</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons & Information Caption Bar -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-3 bg-slate-50 p-3.5 sm:p-4 rounded-2xl border border-slate-200/80 shadow-sm">
                    <p class="text-xs sm:text-sm text-slate-600 italic font-medium text-center sm:text-left flex items-center justify-center sm:justify-start space-x-1.5">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Peta Interaktif Wilayah Desa Lubuk Mandian Gajah (Dapat di-zoom & digeser)</span>
                    </p>

                    <!-- Quick Action Buttons -->
                    <div class="flex items-center space-x-2.5 w-full sm:w-auto shrink-0 justify-center">
                        <!-- Button 1: Buka di Google Maps (GPS Navigation) -->
                        <a 
                            href="https://www.google.com/maps/search/?api=1&query=Desa+Lubuk+Mandian+Gajah+Kecamatan+Bunut+Kabupaten+Pelalawan+Riau" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="flex-1 sm:flex-none inline-flex items-center justify-center space-x-2 bg-[#235832] hover:bg-[#1b4527] text-white text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-sm hover:shadow-md transition-all active:scale-95"
                        >
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Buka di Google Maps</span>
                        </a>

                        <!-- Button 2: Lihat Batas Wilayah -->
                        <a 
                            href="https://www.google.com/maps/place/Lubuk+Mandian+Gajah,+Bunut,+Pelalawan+Regency,+Riau" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="flex-1 sm:flex-none inline-flex items-center justify-center space-x-2 bg-white hover:bg-slate-100 text-[#235832] border border-emerald-700/30 text-xs sm:text-sm font-bold px-4 py-2.5 rounded-xl shadow-sm hover:shadow transition-all active:scale-95"
                        >
                            <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            <span>Lihat Batas Wilayah</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- DESCRIPTION TEXT CONTENT SECTION -->
            <section class="bg-slate-50/70 border border-slate-200/80 rounded-2xl sm:rounded-3xl p-5 sm:p-7 shadow-sm space-y-5 text-slate-700 leading-relaxed text-sm sm:text-base">
                
                <div class="flex items-center space-x-3 border-b border-slate-200/80 pb-3">
                    <div class="w-10 h-10 rounded-xl bg-[#235832] text-white flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base sm:text-lg font-extrabold text-[#235832]">Deskripsi Wilayah & Geografis Desa</h3>
                        <p class="text-xs text-slate-500 font-medium">Kecamatan Bunut, Kabupaten Pelalawan, Provinsi Riau</p>
                    </div>
                </div>

                <!-- Paragraf 1 -->
                <p class="text-justify leading-relaxed text-slate-700">
                    Peta wilayah Desa Lubuk Mandian Gajah menyajikan batas wilayah administratif desa secara rinci yang ditandai dengan garis merah tebal di sepanjang perbatasannya. Cakupan wilayah ini meliputi area permukiman warga yang tersebar rapi, bentuk hamparan cakupan wilayah geografis desa, serta jaringan jalan utama dan jalan penghubung antar-dusun. Selain itu, peta ini memperlihatkan tata letak berbagai fasilitas umum dan sarana publik yang mudah diakses oleh seluruh lapisan masyarakat desa.
                </p>

                <!-- Paragraf 2 -->
                <p class="text-justify leading-relaxed text-slate-700">
                    Wilayah Desa Lubuk Mandian Gajah didominasi oleh bentang kawasan hijau nan asri serta area perkebunan kelapa sawit dan karet yang menjadi fondasi utama perekonomian serta mata pencaharian warga lokal. Jaringan infrastruktur jalan yang membelah kawasan pemukiman dan perkebunan dirancang untuk mendukung kelancaran mobilitas sehari-hari, distribusi hasil pertanian, serta menjamin kemudahan akses transportasi bagi masyarakat menuju pusat kecamatan maupun area sekitar.
                </p>

                <!-- Paragraf 3 -->
                <div class="space-y-3 pt-2">
                    <p class="text-justify font-semibold text-slate-800">
                        Dalam peta wilayah ini, terdapat beberapa fasilitas penting dan sarana publik utama yang menjadi pusat kegiatan kemasyarakatan, antara lain:
                    </p>
                    
                    <!-- Grid List of 6 Important Facilities (Responsive 2 columns on mobile, 3 columns on desktop) -->
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 pt-1">
                        
                        <!-- 1. Lapangan Bola Gajah Baselo -->
                        <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200/90 shadow-sm flex items-start space-x-3 hover:border-emerald-400 hover:shadow-md transition-all group">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-emerald-100/80 text-[#235832] flex items-center justify-center shrink-0 group-hover:bg-[#235832] group-hover:text-white transition-colors shadow-inner">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.5a2.5 2.5 0 002.5-2.5V7a2 2 0 00-2-2h-2c-.5 0-1-.2-1.414-.586l-.828-.828A2 2 0 0011.828 3H8z"></path>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug group-hover:text-[#235832] transition-colors truncate sm:whitespace-normal">Lapangan Bola Gajah Baselo</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500 font-medium leading-relaxed mt-0.5">Sarana Olahraga & Lapangan Utama Desa</p>
                            </div>
                        </div>

                        <!-- 2. Lapangan Volly -->
                        <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200/90 shadow-sm flex items-start space-x-3 hover:border-emerald-400 hover:shadow-md transition-all group">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-emerald-100/80 text-[#235832] flex items-center justify-center shrink-0 group-hover:bg-[#235832] group-hover:text-white transition-colors shadow-inner">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug group-hover:text-[#235832] transition-colors truncate sm:whitespace-normal">Lapangan Volly</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500 font-medium leading-relaxed mt-0.5">Fasilitas Olahraga Warga</p>
                            </div>
                        </div>

                        <!-- 3. TK Lentera Bunda -->
                        <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200/90 shadow-sm flex items-start space-x-3 hover:border-emerald-400 hover:shadow-md transition-all group">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-emerald-100/80 text-[#235832] flex items-center justify-center shrink-0 group-hover:bg-[#235832] group-hover:text-white transition-colors shadow-inner">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug group-hover:text-[#235832] transition-colors truncate sm:whitespace-normal">TK Lentera Bunda</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500 font-medium leading-relaxed mt-0.5">Pendidikan Anak Usia Dini</p>
                            </div>
                        </div>

                        <!-- 4. Koperasi Unit Desa Peron Sawit -->
                        <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200/90 shadow-sm flex items-start space-x-3 hover:border-emerald-400 hover:shadow-md transition-all group">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-emerald-100/80 text-[#235832] flex items-center justify-center shrink-0 group-hover:bg-[#235832] group-hover:text-white transition-colors shadow-inner">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug group-hover:text-[#235832] transition-colors truncate sm:whitespace-normal">Koperasi Unit Desa Peron Sawit</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500 font-medium leading-relaxed mt-0.5">Pusat Ekonomi & Koperasi Sawit</p>
                            </div>
                        </div>

                        <!-- 5. Kantor Desa Lubuk Mandian Gajah -->
                        <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200/90 shadow-sm flex items-start space-x-3 hover:border-emerald-400 hover:shadow-md transition-all group">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-emerald-100/80 text-[#235832] flex items-center justify-center shrink-0 group-hover:bg-[#235832] group-hover:text-white transition-colors shadow-inner">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug group-hover:text-[#235832] transition-colors truncate sm:whitespace-normal">Kantor Desa Lubuk Mandian Gajah</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500 font-medium leading-relaxed mt-0.5">Pusat Pelayanan Administrasi Desa</p>
                            </div>
                        </div>

                        <!-- 6. SDN 007 LMG -->
                        <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200/90 shadow-sm flex items-start space-x-3 hover:border-emerald-400 hover:shadow-md transition-all group">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-emerald-100/80 text-[#235832] flex items-center justify-center shrink-0 group-hover:bg-[#235832] group-hover:text-white transition-colors shadow-inner">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug group-hover:text-[#235832] transition-colors truncate sm:whitespace-normal">SDN 007 LMG</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500 font-medium leading-relaxed mt-0.5">Sarana Pendidikan Dasar Desa</p>
                            </div>
                        </div>

                    </div>
                </div>

            </section>

        </main>

        <!-- FOOTER SECTION -->
        <footer class="bg-[#235832] text-white pt-8 pb-8 px-5 sm:px-8 mt-6" x-data="{ activeFooterTab: null }">
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
            <a href="{{ url('/') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-4 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-[11px] font-semibold tracking-tight">Beranda</span>
            </a>

            <!-- 2. Dokumen -->
            <a href="{{ url('/dokumen') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-4 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="text-[11px] font-semibold tracking-tight">Dokumen</span>
            </a>

            <!-- 3. Peta Desa (Active Page) -->
            <a href="{{ url('/peta') }}" class="flex flex-col items-center justify-center text-white py-1 px-4 rounded-xl bg-white/15 border border-white/20 transition-all">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="text-[11px] font-extrabold tracking-tight">Peta Desa</span>
            </a>

            <!-- 4. Bantuan -->
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
