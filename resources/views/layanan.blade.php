@extends('layouts.app')

@section('title', 'Layanan - Puskesmas Ajibarang')

@section('content')
    <div class="bg-slate-50 min-h-screen">
        <!-- Header -->
        <div class="bg-white pb-12 pt-16 sm:pb-16 sm:pt-24 lg:pb-24 lg:pt-32 relative overflow-hidden">
            <div class="absolute inset-0 bg-linear-to-b from-blue-50 to-white opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                <h2 class="text-base font-bold text-medical-blue tracking-wide uppercase">Layanan Kami</h2>
                <p class="mt-2 text-4xl font-black text-slate-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                    Fasilitas Kesehatan Terpadu
                </p>
                <p class="max-w-2xl mt-5 mx-auto text-xl text-slate-500">
                    Kami menyediakan berbagai layanan poliklinik dan penunjang medis modern untuk memenuhi kebutuhan
                    kesehatan Anda dan keluarga.
                </p>
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
            <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @php
                    $services = [
                        ['name' => 'Poli Umum', 'desc' => 'Pelayanan kesehatan dasar komprehensif untuk dewasa dan anak-anak oleh dokter umum berpengalaman.', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'color' => 'from-blue-400 to-blue-600'],
                        ['name' => 'Poli Gigi', 'desc' => 'Perawatan kesehatan gigi & mulut profesional: tambal, cabut, scaling, dan konsultasi estetika.', 'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'from-teal-400 to-teal-600'],
                        ['name' => 'KIA & KB', 'desc' => 'Layanan Kesehatan Ibu & Anak serta Keluarga Berencana. Imunisasi, cek kehamilan, dan konseling.', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'from-purple-400 to-purple-600'],
                        ['name' => 'Laboratorium', 'desc' => 'Pemeriksaan laboratorium lengkap, akurat, dan cepat untuk menunjang diagnosis medis.', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z', 'color' => 'from-indigo-400 to-indigo-600'],
                        ['name' => 'Farmasi', 'desc' => 'Penyediaan obat-obatan lengkap dan berkualitas dengan pelayanan informasi obat oleh apoteker.', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'color' => 'from-emerald-400 to-emerald-600'],
                        ['name' => 'UGD 24 Jam', 'desc' => 'Unit Gawat Darurat siap siaga 24 jam dengan tim medis sigap untuk penanganan kasus emergency.', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'from-red-400 to-red-600'],
                    ];
                @endphp

                @foreach($services as $service)
                    <div
                        class="group relative bg-white rounded-3xl p-8 shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100 transform hover:-translate-y-2">
                        <div
                            class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-linear-to-br {{ $service['color'] }} rounded-full opacity-10 group-hover:scale-150 transition duration-500 blur-2xl">
                        </div>

                        <div
                            class="relative w-14 h-14 rounded-2xl bg-linear-to-br {{ $service['color'] }} flex items-center justify-center text-white shadow-lg mb-6 group-hover:scale-110 transition duration-300">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $service['icon'] }}" />
                            </svg>
                        </div>

                        <h3 class="relative text-2xl font-bold text-slate-900 mb-3 group-hover:text-medical-blue transition">
                            {{ $service['name'] }}
                        </h3>
                        <p class="relative text-slate-500 leading-relaxed">{{ $service['desc'] }}</p>

                        <div
                            class="relative mt-6 pt-6 border-t border-slate-50 flex items-center text-medical-blue font-semibold text-sm opacity-0 group-hover:opacity-100 transition duration-300 transform translate-y-2 group-hover:translate-y-0">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection