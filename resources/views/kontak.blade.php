@extends('layouts.app')

@section('title', 'Kontak - Puskesmas Ajibarang')

@section('content')
    <div class="min-h-screen bg-slate-50">
        <!-- Header -->
        <div class="bg-linear-to-r from-medical-blue to-blue-600 pb-24 lg:pb-32 relative overflow-hidden">
            <div class="absolute inset-0 bg-white/5 backdrop-blur-3xl"></div>
            <div class="relative max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div
                    class="absolute top-0 right-0 -mr-24 -mt-24 w-96 h-96 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
                </div>
                <div class="relative">
                    <h2 class="text-3xl font-black text-white sm:text-4xl text-center">Hubungi Kami</h2>
                    <p class="mt-4 max-w-3xl mx-auto text-xl text-blue-100 text-center">
                        Punya pertanyaan atau butuh bantuan? Tim kami siap melayani Anda. Silakan isi form di bawah atau
                        kunjungi kami langsung.
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <div
                class="relative -mt-16 lg:-mt-24 bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-2">
                <!-- Contact Info Side (Solid Blue) -->
                <div class="relative bg-medical-blue p-10 lg:p-16 text-white overflow-hidden">
                    <!-- Decorative Circles (Subtle) -->
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 -ml-8 -mb-8 w-32 h-32 bg-blue-400 opacity-20 rounded-full blur-2xl">
                    </div>

                    <h3 class="text-2xl font-bold mb-8 relative z-10">Informasi Kontak</h3>

                    <div class="space-y-8 relative z-10">
                        <div class="flex items-start">
                            <div
                                class="shrink-0 w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-6">
                                <p class="text-sm font-medium text-blue-100 uppercase tracking-wide">Telepon</p>
                                <p class="text-lg font-bold text-white mt-1">+62 (281) 1234567</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="shrink-0 w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-6">
                                <p class="text-sm font-medium text-blue-100 uppercase tracking-wide">Email</p>
                                <p class="text-lg font-bold text-white mt-1">info@puskesmasajibarang.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="shrink-0 w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-6">
                                <p class="text-sm font-medium text-blue-100 uppercase tracking-wide">Lokasi</p>
                                <p class="text-lg font-bold text-white mt-1">Jl. Raya Ajibarang No. 123</p>
                                <p class="text-sm text-blue-100">Banyumas, Jawa Tengah 53163</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Side -->
                <div class="p-10 lg:p-16">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Kirim Pesan</h3>

                    @if(session('success'))
                        <div class="mb-8 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-4 rounded-xl flex items-center shadow-sm"
                            role="alert">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="block sm:inline font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('kontak') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="full-name" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                            <input type="text" name="full-name" id="full-name" autocomplete="name"
                                class="mt-1 block w-full border-slate-300 rounded-xl shadow-sm focus:ring-medical-blue focus:border-medical-blue sm:text-sm py-3 px-4 bg-slate-50 focus:bg-white transition"
                                placeholder="Farrel">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                                <input id="email" name="email" type="email" autocomplete="email"
                                    class="mt-1 block w-full border-slate-300 rounded-xl shadow-sm focus:ring-medical-blue focus:border-medical-blue sm:text-sm py-3 px-4 bg-slate-50 focus:bg-white transition"
                                    placeholder="email@contoh.com">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-slate-700">Nomor Telepon</label>
                                <input type="text" name="phone" id="phone" autocomplete="tel"
                                    class="mt-1 block w-full border-slate-300 rounded-xl shadow-sm focus:ring-medical-blue focus:border-medical-blue sm:text-sm py-3 px-4 bg-slate-50 focus:bg-white transition"
                                    placeholder="0812...">
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700">Pesan</label>
                            <textarea id="message" name="message" rows="4"
                                class="mt-1 block w-full border-slate-300 rounded-xl shadow-sm focus:ring-medical-blue focus:border-medical-blue sm:text-sm py-3 px-4 bg-slate-50 focus:bg-white transition"
                                placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-4 px-6 border border-transparent rounded-xl shadow-lg text-base font-bold text-white bg-medical-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-medical-blue transform transition hover:-translate-y-1">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Map Placeholder -->
            <div class="mt-12 rounded-3xl overflow-hidden shadow-lg h-96 relative border border-slate-200">
                <iframe src="https://maps.google.com/maps?q=Puskesmas%201%20Ajibarang&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
@endsection