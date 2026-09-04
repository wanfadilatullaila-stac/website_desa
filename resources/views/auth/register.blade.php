<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                Nama Lengkap Warga
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    placeholder="Masukkan nama lengkap Anda"
                    class="w-full pl-11 pr-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:border-[#235832] focus:ring-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-1.5 text-xs text-red-600 font-semibold" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                Alamat Email
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    placeholder="nama@email.com"
                    class="w-full pl-11 pr-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:border-[#235832] focus:ring-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-600 font-semibold" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                Kata Sandi (Password)
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    placeholder="Minimal 8 karakter"
                    class="w-full pl-11 pr-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:border-[#235832] focus:ring-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-600 font-semibold" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                Konfirmasi Kata Sandi
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="Ulangi kata sandi Anda"
                    class="w-full pl-11 pr-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:border-[#235832] focus:ring-[#235832] focus:bg-white focus:outline-none transition shadow-sm"
                />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 text-xs text-red-600 font-semibold" />
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button 
                type="submit" 
                class="w-full bg-[#235832] hover:bg-[#1b4426] text-white font-extrabold py-3 px-4 rounded-xl shadow-md hover:shadow-lg transition-all flex items-center justify-center space-x-2 text-sm"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                <span>Daftar Akun Warga</span>
            </button>
        </div>

        <!-- Login Link -->
        <div class="pt-4 text-center border-t border-slate-100 mt-4">
            <p class="text-xs text-slate-600 font-medium">
                Sudah punya akun warga? 
                <a href="{{ route('login') }}" class="font-extrabold text-[#235832] hover:underline hover:text-[#1b4426] transition-colors">
                    Masuk di sini
                </a>
            </p>
        </div>

    </form>
</x-guest-layout>
