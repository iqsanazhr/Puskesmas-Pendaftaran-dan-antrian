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

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Column: Image -->
                    <div class="relative order-2 lg:order-1">
                        <div
                            class="absolute inset-0 bg-medical-blue transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl opacity-20">
                        </div>
                        <div class="relative rounded-2xl shadow-xl overflow-hidden group">
                            <div
                                class="absolute inset-0 bg-medical-blue/20 group-hover:bg-transparent transition-colors duration-300">
                            </div>
                            <img src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                alt="Medical Team"
                                class="w-full h-full object-cover min-h-[500px] transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>

                    <!-- Right Column: Visi Misi Content -->
                    <div class="order-1 lg:order-2">
                        <div class="mb-10 text-left">
                            <h2 class="text-base font-bold text-medical-teal tracking-wide uppercase">Nilai-Nilai Kami</h2>
                            <h2 class="mt-2 text-4xl font-black text-slate-900 tracking-tight sm:text-5xl">Visi & Misi</h2>
                            <p class="mt-4 text-lg text-slate-500">
                                Komitmen kami untuk memberikan layanan kesehatan terbaik bagi masyarakat Ajibarang.
                            </p>
                        </div>

                        <div class="space-y-10">
                            <!-- Visi -->
                            <div class="relative pl-8 border-l-4 border-medical-blue">
                                <h3 class="text-2xl font-bold text-medical-blue mb-3">Visi</h3>
                                <p class="text-xl text-slate-700 italic leading-relaxed font-medium">
                                    "Menjadi Puskesmas Pilihan Utama Masyarakat dengan Pelayanan Prima dan Profesional
                                    Menuju Ajibarang Sehat."
                                </p>
                            </div>

                            <!-- Misi -->
                            <div>
                                <h3 class="flex items-center text-2xl font-bold text-medical-blue mb-6">
                                    <span class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                            </path>
                                        </svg>
                                    </span>
                                    Misi Kami
                                </h3>
                                <ul class="space-y-5">
                                    <li class="flex items-start">
                                        <div
                                            class="shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-1 mr-4">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" viewBox="0 0 24 24"
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
                                            class="shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-1 mr-4">
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
                                            class="shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-1 mr-4">
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
                                            class="shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-1 mr-4">
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
    </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="bg-white py-20 sm:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-black text-slate-900 sm:text-4xl">Struktur Organisasi</h2>
            <p class="mt-4 text-xl text-slate-500 max-w-2xl mx-auto">Kepemimpinan yang kuat dan terstruktur demi
                menjamin pelayanan yang lebih baik dan akuntabel.</p>

            <div class="mt-16">
                <div class="relative w-full max-w-5xl mx-auto">
                    <!-- CSS Org Chart -->
                    <div class="flex flex-col items-center">
                        <!-- Level 1: Kepala -->
                        <div class="flex flex-col items-center">
                            <div
                                class="bg-medical-blue text-white px-8 py-4 rounded-xl shadow-lg border-2 border-blue-600 w-64 text-center transform hover:scale-105 transition-transform duration-300 relative z-10">
                                <h3 class="font-bold text-lg">Kepala Puskesmas</h3>
                            </div>
                            <!-- Connector -->
                            <div class="h-10 w-0.5 bg-slate-300"></div>
                            <div class="h-0.5 w-[calc(100%-8rem)] max-w-2xl bg-slate-300"></div>
                            <div class="flex justify-between w-[calc(100%-8rem)] max-w-2xl">
                                <div class="h-6 w-0.5 bg-slate-300"></div>
                                <div class="h-6 w-0.5 bg-slate-300"></div>
                            </div>
                        </div>

                        <!-- Level 2: Management -->
                        <div class="flex flex-col md:flex-row gap-8 md:gap-32 mt-0 w-full justify-center">
                            <!-- Kasubag TU -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="bg-white text-slate-700 px-6 py-3 rounded-xl shadow-md border border-slate-200 w-56 text-center hover:shadow-lg transition-shadow">
                                    <h4 class="font-bold text-medical-blue">Kasubag Tata Usaha</h4>
                                </div>
                                <div class="h-6 w-0.5 bg-slate-300"></div>
                                <div class="flex flex-col gap-2 mt-2">
                                    <div
                                        class="bg-slate-50 text-slate-600 px-4 py-2 rounded-lg border border-slate-100 text-sm shadow-sm w-56 text-center">
                                        Simpus & SP2TP
                                    </div>
                                    <div
                                        class="bg-slate-50 text-slate-600 px-4 py-2 rounded-lg border border-slate-100 text-sm shadow-sm w-56 text-center">
                                        Kepegawaian
                                    </div>
                                    <div
                                        class="bg-slate-50 text-slate-600 px-4 py-2 rounded-lg border border-slate-100 text-sm shadow-sm w-56 text-center">
                                        Keuangan
                                    </div>
                                </div>
                            </div>

                            <!-- Fungsional -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="bg-white text-slate-700 px-6 py-3 rounded-xl shadow-md border border-slate-200 w-56 text-center hover:shadow-lg transition-shadow">
                                    <h4 class="font-bold text-medical-blue">Penanggung Jawab</h4>
                                </div>
                                <div class="h-6 w-0.5 bg-slate-300"></div>
                                <div class="flex flex-col gap-2 mt-2">
                                    <div
                                        class="bg-teal-50 text-teal-700 px-4 py-2 rounded-lg border border-teal-100 text-sm shadow-sm w-60 text-center font-medium">
                                        UKM Esensial & Perkesmas
                                    </div>
                                    <div
                                        class="bg-teal-50 text-teal-700 px-4 py-2 rounded-lg border border-teal-100 text-sm shadow-sm w-60 text-center font-medium">
                                        UKM Pengembangan
                                    </div>
                                    <div
                                        class="bg-teal-50 text-teal-700 px-4 py-2 rounded-lg border border-teal-100 text-sm shadow-sm w-60 text-center font-medium">
                                        UKP, Kefarmasian & Laboratorium
                                    </div>
                                    <div
                                        class="bg-teal-50 text-teal-700 px-4 py-2 rounded-lg border border-teal-100 text-sm shadow-sm w-60 text-center font-medium">
                                        Jejaring Pelayanan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection