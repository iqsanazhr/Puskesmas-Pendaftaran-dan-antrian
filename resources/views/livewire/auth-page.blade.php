<div class="min-h-screen flex items-center justify-center bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">
    :class="isRegister ? 'translate-x-full' : 'translate-x-0'"></div>

<button @click="isRegister = false" type="button"
    class="relative z-10 flex-1 py-3 text-sm font-bold text-center transition-colors duration-300 rounded-lg focus:outline-none"
    :class="!isRegister ? 'text-medical-blue' : 'text-slate-500 hover:text-slate-700'">
    Masuk
</button>
<button @click="isRegister = true" type="button"
    class="relative z-10 flex-1 py-3 text-sm font-bold text-center transition-colors duration-300 rounded-lg focus:outline-none"
    :class="isRegister ? 'text-medical-blue' : 'text-slate-500 hover:text-slate-700'">
    Daftar
</button>
</div>

<!-- Text Header -->
<div class="text-center mb-8">
    <h2 class="text-3xl font-bold text-slate-900 tracking-tight"
        x-text="isRegister ? 'Bergabung Bersama Kami' : 'Selamat Datang Kembali'">
        Selamat Datang Kembali
    </h2>
    <p class="mt-2 text-sm text-slate-500"
        x-text="isRegister ? 'Buat akun untuk akses layanan kesehatan online' : 'Silakan masuk untuk mengakses dashboard Anda'">
        Silakan masuk untuk mengakses dashboard Anda
    </p>
</div>

<!-- Forms Container with Grid for Overlap -->
<div class="relative grid grid-cols-1">

    <!-- LOGIN FORM -->
    <div x-show="!isRegister" class="row-start-1 col-start-1" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        <form wire:submit.prevent="login" class="space-y-5">
            <div>
                <label for="login-email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input wire:model.defer="loginEmail" id="login-email" type="email" autocomplete="email" required
                        class="pl-10 appearance-none block w-full px-3 py-3 border border-slate-300 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-medical-blue/20 focus:border-medical-blue transition sm:text-sm"
                        placeholder="nama@email.com">
                </div>
                @error('loginEmail') <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="login-password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input wire:model.defer="loginPassword" id="login-password" type="password"
                        autocomplete="current-password" required
                        class="pl-10 appearance-none block w-full px-3 py-3 border border-slate-300 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-medical-blue/20 focus:border-medical-blue transition sm:text-sm"
                        placeholder="••••••••">
                </div>
            </div>

            <button type="submit"
                class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-blue-500/30 text-sm font-bold text-white bg-linear-to-r from-medical-blue to-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-medical-blue transition transform hover:-translate-y-0.5">
                Masuk Sekarang
            </button>
        </form>
    </div>

    <!-- REGISTER FORM -->
    <div x-show="isRegister" style="display: none;" class="row-start-1 col-start-1"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <form wire:submit.prevent="register" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                    <input wire:model.defer="registerName" type="text" required
                        class="block w-full px-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-medical-blue/20 focus:border-medical-blue transition sm:text-sm"
                        placeholder="John Doe">
                    @error('registerName') <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">NIK (16 Digit)</label>
                    <input wire:model.defer="registerNik" type="text" required
                        class="block w-full px-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-medical-blue/20 focus:border-medical-blue transition sm:text-sm"
                        placeholder="330xxxxxxxxxxxxx">
                    @error('registerNik') <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input wire:model.defer="registerEmail" type="email" required
                    class="block w-full px-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-medical-blue/20 focus:border-medical-blue transition sm:text-sm"
                    placeholder="nama@email.com">
                @error('registerEmail') <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <input wire:model.defer="registerPassword" type="password" required
                        class="block w-full px-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-medical-blue/20 focus:border-medical-blue transition sm:text-sm"
                        placeholder="••••••••">
                    @error('registerPassword') <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi</label>
                    <input wire:model.defer="registerPasswordConfirmation" type="password" required
                        class="block w-full px-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-medical-blue/20 focus:border-medical-blue transition sm:text-sm"
                        placeholder="••••••••">
                </div>
            </div>

            <button type="submit"
                class="w-full mt-2 flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-teal-500/30 text-sm font-bold text-white bg-linear-to-r from-teal-500 to-emerald-500 hover:to-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition transform hover:-translate-y-0.5">
                Daftar Sekarang
            </button>
        </form>
    </div>

</div>
</div>

<!-- Footer decoration -->
<div class="bg-slate-50 p-4 text-center border-t border-slate-100">
    <p class="text-xs text-slate-400">
        &copy; {{ date('Y') }} Puskesmas Ajibarang. Keamanan data Anda terjamin.
    </p>
</div>
</div>
</div>
</div>