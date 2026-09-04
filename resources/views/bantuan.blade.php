<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Bantuan & Pengaduan Warga - Desa Lubuk Mandian Gajah</title>

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
        <main class="px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10 max-w-5xl mx-auto space-y-8 sm:space-y-10" x-data="bantuanApp()">

            <!-- BREADCRUMB & PAGE HEADER TITLE -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200/80 pb-6">
                <div>
                    <div class="flex items-center space-x-2 text-xs font-semibold text-emerald-700 uppercase tracking-wider mb-1">
                        <a href="{{ url('/') }}" class="hover:underline text-slate-500">Beranda</a>
                        <span class="text-slate-400">/</span>
                        <span class="text-[#235832]">Pusat Bantuan</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#235832] tracking-tight">
                        Pusat Bantuan & Pengaduan Warga
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 font-medium leading-relaxed mt-1 max-w-2xl">
                        Salurkan aspirasi, laporan kendala fasilitas, atau pertanyaan seputar layanan administrasi Desa Lubuk Mandian Gajah.
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

            <!-- SALURAN KONTAK PENGADUAN CEPAT (GRID 3 CARDS) -->
            <section class="space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 flex items-center space-x-2">
                        <span class="w-3 h-3 rounded-full bg-[#235832]"></span>
                        <span>Saluran Layanan & Pengaduan Cepat</span>
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                    
                    <!-- Card 1: WhatsApp Admin / Kades -->
                    <div class="bg-white rounded-2xl border border-emerald-200/80 shadow-md p-5 flex flex-col justify-between hover:border-emerald-500 transition-all hover:shadow-lg group">
                        <div class="space-y-3">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] flex items-center justify-center shadow-inner group-hover:bg-[#235832] group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200/60">Respons Cepat</span>
                                <h4 class="text-base font-extrabold text-slate-800 mt-1">WhatsApp Layanan Warga</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Layanan konsultasi & laporan via nomor resmi pengaduan desa.</p>
                            </div>
                            <div class="pt-1">
                                <p class="text-sm font-black text-[#235832]">+62 812-7654-3210</p>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 mt-4">
                            <a 
                                href="https://wa.me/6281276543210?text=Halo%20Admin%20Desa%20Lubuk%20Mandian%20Gajah,%20saya%20ingin%20berkonsultasi/menyampaikan%20laporan." 
                                target="_blank"
                                class="w-full inline-flex items-center justify-center space-x-2 text-xs font-bold text-white bg-[#235832] hover:bg-[#1b4527] py-2.5 px-4 rounded-xl transition-all shadow-sm"
                            >
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-1.099 4.018 4.29-1.127z"/>
                                </svg>
                                <span>Kirim Pesan WhatsApp</span>
                            </a>
                        </div>
                    </div>

                    <!-- Card 2: Email Resmi Desa -->
                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-md p-5 flex flex-col justify-between hover:border-emerald-500 transition-all hover:shadow-lg group">
                        <div class="space-y-3">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] flex items-center justify-center shadow-inner group-hover:bg-[#235832] group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-700 bg-slate-100 px-2 py-0.5 rounded-md border border-slate-200">Dokumen Resmi</span>
                                <h4 class="text-base font-extrabold text-slate-800 mt-1">Email Resmi Desa</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Surat resmi, permohonan data, atau surat masuk antar lembaga.</p>
                            </div>
                            <div class="pt-1">
                                <p class="text-xs font-bold text-slate-700 break-all">kantor.lubukmandiangajah@pelalawankab.go.id</p>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 mt-4">
                            <a 
                                href="mailto:kantor.lubukmandiangajah@pelalawankab.go.id" 
                                class="w-full inline-flex items-center justify-center space-x-2 text-xs font-bold text-slate-800 bg-slate-100 hover:bg-emerald-50 hover:text-[#235832] border border-slate-200 py-2.5 px-4 rounded-xl transition-all shadow-sm"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                <span>Kirim Email Resmi</span>
                            </a>
                        </div>
                    </div>

                    <!-- Card 3: Kantor Pelayanan Langsung -->
                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-md p-5 flex flex-col justify-between hover:border-emerald-500 transition-all hover:shadow-lg group">
                        <div class="space-y-3">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] flex items-center justify-center shadow-inner group-hover:bg-[#235832] group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H7m4 0V7m0 0h4m-4 0H7"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-700 bg-slate-100 px-2 py-0.5 rounded-md border border-slate-200">Tatap Muka</span>
                                <h4 class="text-base font-extrabold text-slate-800 mt-1">Kantor Desa Lubuk Mandian Gajah</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Jl. Lintas Bunut, Kec. Bunut, Kab. Pelalawan, Riau 28382.</p>
                            </div>
                            <div class="pt-1 text-xs space-y-0.5 text-slate-700 font-semibold">
                                <p><strong>Jam Kerja:</strong> Senin - Jumat (08:00 - 15:00 WIB)</p>
                                <p class="text-[11px] text-slate-500">Sabtu & Minggu: Libur</p>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 mt-4">
                            <a 
                                href="{{ url('/peta') }}" 
                                class="w-full inline-flex items-center justify-center space-x-2 text-xs font-bold text-slate-800 bg-slate-100 hover:bg-emerald-50 hover:text-[#235832] border border-slate-200 py-2.5 px-4 rounded-xl transition-all shadow-sm"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                                <span>Lihat Lokasi di Peta</span>
                            </a>
                        </div>
                    </div>

                </div>
            </section>

            <!-- TAHAPAN & PROSEDUR PENGADUAN (3 STEPS WORKFLOW) -->
            <section class="bg-slate-50 p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
                <div class="text-center max-w-xl mx-auto space-y-1">
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider bg-emerald-100/80 px-3 py-1 rounded-full border border-emerald-200/60">
                        Prosedur Laporan
                    </span>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-[#235832]">
                        Tahapan Pengaduan & Aspirasi Warga
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 font-medium">
                        Prosedur penanganan laporan warga oleh Pemerintah Desa Lubuk Mandian Gajah.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">
                    
                    <!-- Step 1 -->
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3 relative">
                        <div class="w-10 h-10 rounded-xl bg-[#235832] text-white font-extrabold text-base flex items-center justify-center shadow-md">
                            01
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Sampaikan Laporan</h4>
                        <p class="text-xs text-slate-600 leading-relaxed font-medium">
                            Isi formulir pengaduan di bawah atau hubungi admin WhatsApp desa dengan menjelaskan kronologi kejadian dan bukti foto/dokumen pendukung.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3 relative">
                        <div class="w-10 h-10 rounded-xl bg-[#235832] text-white font-extrabold text-base flex items-center justify-center shadow-md">
                            02
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Verifikasi & Peninjauan</h4>
                        <p class="text-xs text-slate-600 leading-relaxed font-medium">
                            Petugas sekretariat desa dan Kepala Dusun (RT/RW) setempat akan meninjau keabsahan dan urgensi laporan warga.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3 relative">
                        <div class="w-10 h-10 rounded-xl bg-[#235832] text-white font-extrabold text-base flex items-center justify-center shadow-md">
                            03
                        </div>
                        <h4 class="text-base font-bold text-slate-900">Tindak Lanjut & Tanggapan</h4>
                        <p class="text-xs text-slate-600 leading-relaxed font-medium">
                            Pemerintah Desa memproses koordinasi lapangan dan memberikan tindak lanjut/solusi resmi langsung kepada pelapor.
                        </p>
                    </div>

                </div>
            </section>

            <!-- FORMULIR PENGADUAN CEPAT WARGA (DIRECT TO WHATSAPP) -->
            <section class="bg-white rounded-3xl border border-slate-200/90 shadow-md p-6 sm:p-8 space-y-6">
                
                <div class="flex items-center space-x-3.5 pb-4 border-b border-slate-100">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#235832] flex items-center justify-center shrink-0 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">Formulir Pengaduan Cepat Warga</h3>
                        <p class="text-xs text-slate-500">Laporan Anda akan otomatis diformat dan dikirimkan ke WhatsApp resmi pelayanan desa.</p>
                    </div>
                </div>

                <form @submit.prevent="kirimPengaduanWA()" class="space-y-5">
                    
                    <!-- Grid 2 Column: Nama & No WA -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Nama Pelapor <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                x-model="form.nama" 
                                required 
                                placeholder="Masukkan nama lengkap Anda" 
                                class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#235832] focus:border-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Nomor WhatsApp / HP <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="tel" 
                                x-model="form.telepon" 
                                required 
                                placeholder="Contoh: 081234567890" 
                                class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#235832] focus:border-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                            >
                        </div>
                    </div>

                    <!-- Grid 2 Column: Dusun & Kategori -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Dusun / Wilayah RW <span class="text-red-500">*</span>
                            </label>
                            <select 
                                x-model="form.dusun" 
                                required
                                class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#235832] focus:border-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                            >
                                <option value="">-- Pilih Dusun / RW --</option>
                                <option value="Dusun I (RW 01 / RT 01 - 04)">Dusun I (RW 01 / RT 01 - RT 04)</option>
                                <option value="Dusun II (RW 02 / RT 05 - 08)">Dusun II (RW 02 / RT 05 - RT 08)</option>
                                <option value="Dusun III (RW 03 / RT 09 - 12)">Dusun III (RW 03 / RT 09 - RT 12)</option>
                                <option value="Warga Luar Desa / Pendatang">Warga Luar Desa / Pendatang</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Kategori Pengaduan <span class="text-red-500">*</span>
                            </label>
                            <select 
                                x-model="form.kategori" 
                                required
                                class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#235832] focus:border-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                            >
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Infrastruktur & Jalan Desa">Infrastruktur & Jalan Desa</option>
                                <option value="Pelayanan Administrasi Kependudukan">Pelayanan Administrasi Kependudukan</option>
                                <option value="Bantuan Sosial & Logistik">Bantuan Sosial & Logistik Warga</option>
                                <option value="Keamanan & Ketertiban Lingkungan">Keamanan & Ketertiban Lingkungan</option>
                                <option value="Lainnya / Aspirasi Umum">Lainnya / Aspirasi Umum</option>
                            </select>
                        </div>
                    </div>

                    <!-- Textarea Deskripsi Laporan -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Detail Deskripsi Laporan / Kendala <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            x-model="form.deskripsi" 
                            rows="5" 
                            required 
                            placeholder="Jelaskan secara jelas kronologi, lokasi kejadian, atau bantuan yang Anda butuhkan..."
                            class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#235832] focus:border-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <button 
                            type="submit" 
                            class="w-full sm:w-auto px-8 py-3 bg-[#235832] hover:bg-[#1b4527] text-white font-extrabold text-sm rounded-xl shadow-md hover:shadow-lg transition-all flex items-center justify-center space-x-2.5"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-1.099 4.018 4.29-1.127z"/>
                            </svg>
                            <span>Kirim Laporan via WhatsApp Admin</span>
                        </button>

                        <p class="text-xs text-slate-500 text-center sm:text-right">
                            Pemerintah Desa Lubuk Mandian Gajah menjaga kerahasiaan data pelapor.
                        </p>
                    </div>

                </form>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Beranda</span>
            </a>
            <a href="{{ url('/dokumen') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Dokumen</span>
            </a>
            <a href="{{ url('/galeri') }}" class="flex flex-col items-center justify-center text-emerald-200 hover:text-white py-1 px-3 rounded-xl transition-all">
                <svg class="w-5 h-5 mb-0.5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-semibold tracking-tight">Galeri</span>
            </a>
            <a href="{{ url('/bantuan') }}" class="flex flex-col items-center justify-center text-white py-1 px-3 rounded-xl bg-white/15 border border-white/20 transition-all">
                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span class="text-[10px] sm:text-[11px] font-extrabold tracking-tight">Bantuan</span>
            </a>
        </nav>

    </div>

    <!-- Alpine JS Form Handler Script -->
    <script>
        function bantuanApp() {
            return {
                form: {
                    nama: '',
                    telepon: '',
                    dusun: '',
                    kategori: '',
                    deskripsi: ''
                },
                kirimPengaduanWA() {
                    const pesan = `*PENGADUAN WARGA DESA LUBUK MANDIAN GAJAH*\n\n` +
                        `*Nama Pelapor:* ${this.form.nama}\n` +
                        `*No. WhatsApp:* ${this.form.telepon}\n` +
                        `*Wilayah/Dusun:* ${this.form.dusun}\n` +
                        `*Kategori:* ${this.form.kategori}\n\n` +
                        `*Detail Laporan/Kendala:*\n${this.form.deskripsi}\n\n` +
                        `-- _Dikirim dari Website Resmi Desa Lubuk Mandian Gajah_`;

                    const urlWA = `https://wa.me/6281276543210?text=${encodeURIComponent(pesan)}`;
                    window.open(urlWA, '_blank');
                }
            }
        }
    </script>
</body>
</html>
