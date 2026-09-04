<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login Admin - Desa Lubuk Mandian Gajah</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Alpine Plugins & Core -->
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
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
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans antialiased text-slate-900 bg-gradient-to-br from-slate-100 via-emerald-50/40 to-slate-200 min-h-screen flex flex-col justify-center items-center p-4 sm:p-6 lg:p-8 relative">

        <!-- Background Ambient Glows -->
        <div class="fixed top-0 left-1/4 w-96 h-96 bg-emerald-300/20 rounded-full filter blur-3xl pointer-events-none -translate-y-1/2"></div>
        <div class="fixed bottom-0 right-1/4 w-96 h-96 bg-emerald-600/10 rounded-full filter blur-3xl pointer-events-none translate-y-1/2"></div>

        <!-- Top Navigation Bar / Back to Home Button -->
        <div class="w-full max-w-md sm:max-w-xl lg:max-w-2xl mb-4 flex items-center justify-between z-20">
            <a href="{{ url('/') }}" class="inline-flex items-center space-x-2 text-xs sm:text-sm font-bold text-[#235832] bg-white/80 hover:bg-white border border-emerald-200/80 px-4 py-2 rounded-xl transition-all shadow-sm group backdrop-blur-md">
                <svg class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span>Kembali ke Beranda</span>
            </a>

            <div class="text-right hidden sm:block">
                <span class="text-xs font-bold text-emerald-800 bg-emerald-100/90 border border-emerald-200/80 px-3 py-1 rounded-full shadow-2xs">
                    SISTEM ADMINISTRASI DESA
                </span>
            </div>
        </div>

        <!-- AUTH CARD CONTAINER -->
        <div class="w-full max-w-md sm:max-w-md bg-white rounded-3xl shadow-xl p-6 sm:p-8 border border-slate-150 relative z-10 transition-all duration-300">
            
            <!-- HEADER LOGO & VILLAGE TITLE -->
            <div class="text-center space-y-3 pb-6 border-b border-slate-100 mb-6">
                <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto flex items-center justify-center">
                    <img src="{{ asset('images/logo-pelelawan-fix.jpg') }}" alt="Logo Desa Lubuk Mandian Gajah" class="h-12 w-auto object-contain">
                </div>
                
                <div class="space-y-1">
                    <span class="inline-block px-3 py-0.5 text-[10px] uppercase font-bold tracking-wider text-emerald-800 bg-emerald-100 rounded-full border border-emerald-200">
                        SISTEM ADMINISTRASI DESA
                    </span>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#235832] tracking-tight">
                        Login Administrator
                    </h2>
                    <p class="text-xs sm:text-sm font-medium text-slate-500">
                        Pemerintah Desa Lubuk Mandian Gajah, Kec. Bunut
                    </p>
                </div>
            </div>

            <!-- SLOT CONTENT (LOGIN / REGISTER FORM) -->
            {{ $slot }}

        </div>

        <!-- FOOTER COPYRIGHT -->
        <div class="mt-6 text-center text-xs font-medium text-slate-500 z-10">
            &copy; {{ date('Y') }} Pemerintah Desa Lubuk Mandian Gajah. Hak Cipta Dilindungi.
        </div>

    </body>
</html>
