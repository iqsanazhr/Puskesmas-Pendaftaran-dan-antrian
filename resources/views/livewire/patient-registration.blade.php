<div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">

        <!-- Success Alert -->
        @if ($successMessage)
            <div class="mb-8 rounded-2xl bg-emerald-50 p-4 border border-emerald-100 shadow-sm animate-fade-in-down">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-bold text-emerald-800">Pendaftaran Berhasil!</h3>
                        <div class="mt-2 text-sm text-emerald-700">
                            <p>{{ $successMessage }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('queue.ticket.pdf', ['id' => $queueId]) }}" target="_blank"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                                <svg class="mr-2 -ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Cetak Tiket PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Form Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
            <!-- Header -->
            <div class="bg-linear-to-r from-medical-blue to-teal-500 px-8 py-10 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-white/10 opacity-30">
                    <svg class="h-full w-full" fill="none" viewBox="0 0 800 800">
                        <path d="M400 0L800 400L400 800L0 400L400 0Z" fill="currentColor" />
                    </svg>
                </div>
                <h2 class="relative text-3xl font-extrabold text-white tracking-tight">Pendaftaran Pasien</h2>
                <p class="relative mt-2 text-blue-50 text-lg">Lengkapi formulir di bawah untuk mendapatkan nomor
                    antrian.</p>
            </div>

            <div class="px-8 py-10 sm:px-12">
                <form wire:submit.prevent="submit" class="space-y-8">

                    <!-- Section: Data Diri -->
                    <div>
                        <h3 class="text-lg leading-6 font-bold text-slate-900 flex items-center mb-6 border-b pb-2">
                            <svg class="h-5 w-5 mr-2 text-medical-blue" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Data Diri Pasien
                        </h3>
                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="nik" class="block text-sm font-semibold text-slate-700">NIK (Nomor Induk
                                    Kependudukan)</label>
                                <div class="mt-1">
                                    <input wire:model="nik" type="text" id="nik"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3 placeholder-slate-400 font-medium"
                                        placeholder="Silakan masukkan 16 digit NIK">
                                </div>
                                @error('nik') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-1">
                                <label for="name" class="block text-sm font-semibold text-slate-700">Nama
                                    Lengkap</label>
                                <div class="mt-1">
                                    <input wire:model="name" type="text" id="name"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3 placeholder-slate-400"
                                        placeholder="Sesuai KTP">
                                </div>
                                @error('name') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-1">
                                <label for="gender" class="block text-sm font-semibold text-slate-700">Jenis
                                    Kelamin</label>
                                <div class="mt-1">
                                    <select wire:model="gender" id="gender"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                @error('gender') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-1">
                                <label for="dob" class="block text-sm font-semibold text-slate-700">Tanggal
                                    Lahir</label>
                                <div class="mt-1">
                                    <input wire:model="dob" type="date" id="dob"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3 text-slate-600">
                                </div>
                                @error('dob') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-1">
                                <label for="phone" class="block text-sm font-semibold text-slate-700">No. WhatsApp /
                                    Telepon</label>
                                <div class="mt-1">
                                    <input wire:model="phone" type="text" id="phone"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3 placeholder-slate-400"
                                        placeholder="08xxxxxxxxxx">
                                </div>
                                @error('phone') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-semibold text-slate-700">Alamat
                                    Lengkap</label>
                                <div class="mt-1">
                                    <textarea wire:model="address" id="address" rows="3"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3 placeholder-slate-400"
                                        placeholder="Masukkan alamat lengkap sesuai domisili"></textarea>
                                </div>
                                @error('address') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section: Pilih Layanan -->
                    <div>
                        <h3 class="text-lg leading-6 font-bold text-slate-900 flex items-center mb-6 border-b pb-2">
                            <svg class="h-5 w-5 mr-2 text-medical-blue" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Penyewaan Dokter & Jadwal
                        </h3>
                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2">

                            <div class="sm:col-span-2">
                                <label for="poly_id" class="block text-sm font-semibold text-slate-700">Pilih Poli
                                    Tujuan</label>
                                <div class="mt-1">
                                    <select wire:model="poly_id" id="poly_id"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3">
                                        <option value="">-- Pilih Poli --</option>
                                        @foreach($polies as $poly)
                                            <option value="{{ $poly->id }}">{{ $poly->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('poly_id') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-1">
                                <label for="doctor_id" class="block text-sm font-semibold text-slate-700">Pilih
                                    Dokter</label>
                                <div class="mt-1">
                                    <select wire:model="doctor_id" id="doctor_id"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3 disabled:bg-slate-100 disabled:text-slate-400"
                                        {{ count($doctors) == 0 ? 'disabled' : '' }}>
                                        <option value="">-- Pilih Dokter --</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->user->name }}
                                                ({{ $doctor->specialization }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('doctor_id') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-1">
                                <label for="date" class="block text-sm font-semibold text-slate-700">Tanggal
                                    Kunjungan</label>
                                <div class="mt-1">
                                    <input wire:model="date" type="date" id="date"
                                        class="shadow-sm focus:ring-medical-blue focus:border-medical-blue block w-full sm:text-sm border-slate-300 rounded-xl px-4 py-3 text-slate-600">
                                </div>
                                @error('date') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="pt-5 border-t border-slate-100">
                        <button type="submit"
                            class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg shadow-blue-500/30 text-lg font-bold text-white bg-linear-to-r from-medical-blue to-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-medical-blue transition transform hover:-translate-y-1">
                            Ambil Nomor Antrian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>