@extends('layouts.app')

@section('title', 'Profil - Puskesmas Ajibarang')

@section('content')
    <div class="bg-white">
        <!-- Hero Section -->
        <div class="relative bg-medical-blue py-20 sm:py-28 overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-linear-to-r from-medical-blue to-teal-600 mix-blend-multiply"></div>
                <!-- Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <svg class="h-full w-full" fill="none" viewBox="0 0 800 800">
                        <defs>
                            <pattern id="medical-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="1" class="text-white" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="800" height="800" fill="url(#medical-pattern)" />
                    </svg>
                </div>
                <!-- Image -->
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                    alt="Hospital Staff" class="w-full h-full object-cover opacity-10 filter blur-sm">
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                <h1 class="text-4xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl drop-shadow-md">Profil Kami
                </h1>
                <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto font-light leading-relaxed">
                    Mengenal lebih dekat Puskesmas Ajibarang, visi, misi, dan tim profesional yang berdedikasi melayani
                    kesehatan Anda dengan sepenuh hati.
                </p>
            </div>
        </div>

        <!-- Visi Misi -->
        <div class="relative py-20 sm:py-28 overflow-hidden bg-slate-50">
            <!-- Background Decoration -->
            <div
                class="absolute -top-24 -left-24 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute -bottom-24 -right-24 w-96 h-96 bg-teal-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000">
            </div>

            <div class="mt-12 lg:mt-0 order-1 lg:order-2">
                <h2 class="text-base font-bold text-medical-teal tracking-wide uppercase">Nilai-Nilai Kami</h2>
                <h2 class="mt-2 text-4xl font-black text-slate-900 tracking-tight sm:text-5xl">Visi & Misi</h2>
                <div class="mt-8 space-y-8">
                    <div class="relative pl-8 border-l-4 border-medical-blue py-2">
                        <h3 class="text-2xl font-bold text-medical-blue mb-2">Visi</h3>
                        <p class="text-xl text-slate-600 italic leading-relaxed">
                            "Menjadi Puskesmas Pilihan Utama Masyarakat dengan Pelayanan Prima dan Profesional
                            Menuju Ajibarang Sehat."
                        </p>
                    </div>
                    <div>
                        <h3 class="flex items-center text-2xl font-bold text-medical-blue mb-4">
                            <span class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </span>
                            Misi
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div
                                    class="shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-1 mr-3">
                                    <svg class="w-4 h-4 text-teal-600" fill="none" class="" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-lg text-slate-600">Memberikan pelayanan kesehatan yang bermutu,
                                    merata, dan terjangkau.</span>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-1 mr-3">
                                    <svg class="w-4 h-4 text-teal-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-lg text-slate-600">Meningkatkan profesionalisme sumber daya
                                    manusia kesehatan.</span>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-1 mr-3">
                                    <svg class="w-4 h-4 text-teal-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-lg text-slate-600">Mendorong kemandirian masyarakat untuk hidup
                                    sehat.</span>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-1 mr-3">
                                    <svg class="w-4 h-4 text-teal-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-lg text-slate-600">Mengembangkan sarana dan prasarana kesehatan
                                    yang modern.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="bg-white py-20 sm:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-black text-slate-900 sm:text-4xl">Struktur Organisasi</h2>
            <p class="mt-4 text-xl text-slate-500 max-w-2xl mx-auto">Kepemimpinan yang kuat dan terstruktur demi
                menjamin pelayanan yang lebih baik dan akuntabel.</p>

            <div class="mt-16">
                <div
                    class="relative bg-white p-12 rounded-3xl shadow-xl border border-slate-100 inline-block max-w-4xl w-full">
                    <!-- Decorative background elements -->
                    <div
                        class="absolute top-0 left-0 -mt-4 -ml-4 w-24 h-24 bg-blue-50 rounded-full mix-blend-multiply filter blur-xl opacity-70">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 -mb-4 -mr-4 w-24 h-24 bg-teal-50 rounded-full mix-blend-multiply filter blur-xl opacity-70">
                    </div>

                    <div
                        class="flex flex-col items-center justify-center space-y-4 py-12 border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50/50">
                        <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <p class="text-slate-500 font-medium italic">Grafik Struktur Organisasi akan ditampilkan di
                            sini.</p>
                        <span class="text-sm text-slate-400">Hubungi administrator untuk mengunggah gambar bagan.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection