@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                    fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <div
                            class="inline-flex items-center px-3 py-1 rounded-full border border-blue-100 bg-blue-50 text-medical-blue text-xs font-semibold uppercase tracking-wide mb-4">
                            Sistem Antrian Online Terintegrasi
                        </div>
                        <h1 class="text-4xl tracking-tight font-extrabold text-slate-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Layanan Kesehatan</span>
                            <span class="block text-medical-blue xl:inline">Masa Depan</span>
                        </h1>
                        <p
                            class="mt-4 text-base text-slate-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 font-light leading-relaxed">
                            Nikmati kemudahan akses layanan kesehatan di Puskesmas Ajibarang 1. Daftar antrian dari rumah,
                            pantau secara real-time, dan dapatkan pelayanan prima tanpa menunggu lama.
                        </p>
                        @if(!auth()->check() || auth()->user()->role == 'patient')
                            <div class="mt-8 sm:mt-10 sm:flex sm:justify-center lg:justify-start gap-3">
                                <div class="rounded-full shadow-lg shadow-blue-500/30">
                                    <a href="{{ route('patient.register') }}"
                                        class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-full text-white bg-linear-to-r from-medical-blue to-teal-500 hover:shadow-lg hover:shadow-blue-500/50 md:py-4 md:text-lg md:px-10 transition transform hover:-translate-y-1">
                                        Ambil Antrian
                                    </a>
                                </div>
                                <div class="mt-3 sm:mt-0">
                                    <a href="#jadwal-operasional"
                                        class="w-full flex items-center justify-center px-8 py-3 border border-slate-200 text-base font-bold rounded-full text-medical-blue bg-white hover:bg-slate-50 md:py-4 md:text-lg md:px-10 transition hover:shadow-md">
                                        Jadwal Dokter
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-slate-100 relative">
            <div class="absolute inset-0 bg-linear-to-r from-medical-blue/20 to-transparent mix-blend-multiply"></div>
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                src="{{ asset('images/hospital_hero.png') }}" alt="Hospital Building Exterior">
        </div>
    </div>

    <!-- Services Section -->
    <div class="py-20 bg-slate-50" id="layanan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="text-base text-medical-blue font-bold tracking-wide uppercase">Layanan Unggulan</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Solusi Kesehatan Komprehensif
                </p>
                <p class="mt-4 text-lg text-slate-500">
                    Kami menghadirkan fasilitas medis lengkap dengan standar pelayanan terbaik untuk menjamin kesehatan Anda
                    sekeluarga.
                </p>
            </div>

            <div class="mt-16">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <!-- Service 1 -->
                    <div
                        class="group relative bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-slate-100">
                        <dt>
                            <div
                                class="absolute flex items-center justify-center h-14 w-14 rounded-2xl bg-blue-50 text-medical-blue group-hover:bg-medical-blue group-hover:text-white transition-colors duration-300">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <p class="ml-20 text-xl leading-6 font-bold text-slate-900">Poli Umum</p>
                        </dt>
                        <dd class="mt-4 ml-20 text-base text-slate-500 leading-relaxed">
                            Penanganan medis profesional untuk berbagai keluhan kesehatan umum dengan dokter berpengalaman.
                        </dd>
                    </div>

                    <!-- Service 2 -->
                    <div
                        class="group relative bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-slate-100">
                        <dt>
                            <div
                                class="absolute flex items-center justify-center h-14 w-14 rounded-2xl bg-teal-50 text-medical-teal group-hover:bg-medical-teal group-hover:text-white transition-colors duration-300">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="ml-20 text-xl leading-6 font-bold text-slate-900">Poli Gigi</p>
                        </dt>
                        <dd class="mt-4 ml-20 text-base text-slate-500 leading-relaxed">
                            Perawatan kesehatan gigi menyeluruh, mulai dari scaling, penambalan, hingga perawatan estetika.
                        </dd>
                    </div>

                    <!-- Service 3 -->
                    <div
                        class="group relative bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-slate-100">
                        <dt>
                            <div
                                class="absolute flex items-center justify-center h-14 w-14 rounded-2xl bg-purple-50 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <p class="ml-20 text-xl leading-6 font-bold text-slate-900">KIA & KB</p>
                        </dt>
                        <dd class="mt-4 ml-20 text-base text-slate-500 leading-relaxed">
                            Layanan terpadu untuk kesehatan Ibu, Anak, dan Keluarga Berencana dengan bidan kompeten.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div
        class="bg-linear-to-r from-medical-blue to-teal-500 rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden text-center">
        <!-- Decoration BG -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="none" viewBox="0 0 800 800">
                <circle cx="400" cy="400" r="400" fill="white" />
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    Dipercaya Ribuan Keluarga
                </h2>
                <p class="mt-3 text-xl text-blue-100 sm:mt-4">
                    Komitmen kami adalah memberikan pelayanan terbaik yang dapat diandalkan oleh masyarakat Ajibarang.
                </p>
            </div>
            <dl class="mt-12 text-center sm:max-w-3xl sm:mx-auto sm:grid sm:grid-cols-3 sm:gap-8">
                <div class="flex flex-col bg-white/10 rounded-2xl p-6 backdrop-blur-sm">
                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-blue-100">
                        Pasien Terlayani
                    </dt>
                    <dd class="order-1 text-5xl font-extrabold text-white">
                        10k+
                    </dd>
                </div>
                <div class="flex flex-col bg-white/10 rounded-2xl p-6 backdrop-blur-sm mt-6 sm:mt-0">
                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-blue-100">
                        Tenaga Medis
                    </dt>
                    <dd class="order-1 text-5xl font-extrabold text-white">
                        50+
                    </dd>
                </div>
                <div class="flex flex-col bg-white/10 rounded-2xl p-6 backdrop-blur-sm mt-6 sm:mt-0">
                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-blue-100">
                        Tahun Mengabdi
                    </dt>
                    <dd class="order-1 text-5xl font-extrabold text-white">
                        15+
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- CTA Section -->
    @if(!auth()->check() || !in_array(auth()->user()->role, ['admin', 'leader', 'doctor']))
        <div class="bg-white py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-extrabold text-slate-900">Siap untuk mendapatkan layanan?</h2>
                <p class="mt-4 text-lg text-slate-500">Jangan tunda kesehatan Anda. Daftar antrian sekarang secara online.</p>
                <div class="mt-8">
                    <a href="{{ route('patient.register') }}"
                        class="inline-flex items-center justify-center px-10 py-4 border border-transparent text-lg font-bold rounded-full text-white bg-linear-to-r from-medical-blue to-teal-500 hover:shadow-lg hover:shadow-blue-500/50 shadow-xl shadow-blue-500/30 transition transform hover:-translate-y-1">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    @endif
@endsection