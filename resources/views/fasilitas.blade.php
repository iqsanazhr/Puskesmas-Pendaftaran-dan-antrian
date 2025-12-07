@extends('layouts.app')

@section('title', 'Fasilitas - Puskesmas Ajibarang')

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">Sarana & Prasarana</h2>
                <p class="mt-4 text-xl text-slate-500">Fasilitas modern untuk menunjang kenyamanan dan kesembuhan pasien.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Facility Items -->
                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Ruang Tunggu"
                        class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-linear-to-t from-black/70 to-transparent flex items-end p-6">
                        <h3 class="text-white text-xl font-bold">Ruang Tunggu Nyaman</h3>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Ruang Periksa"
                        class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-linear-to-t from-black/70 to-transparent flex items-end p-6">
                        <h3 class="text-white text-xl font-bold">Ruang Periksa Modern</h3>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Laboratorium"
                        class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-linear-to-t from-black/70 to-transparent flex items-end p-6">
                        <h3 class="text-white text-xl font-bold">Laboratorium Lengkap</h3>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="{{ asset('images/parking.png') }}"
                        alt="Area Parkir"
                        class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-linear-to-t from-black/70 to-transparent flex items-end p-6">
                        <h3 class="text-white text-xl font-bold">Area Parkir Luas</h3>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="{{ asset('images/ambulance.png') }}"
                        alt="Ambulans"
                        class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-linear-to-t from-black/70 to-transparent flex items-end p-6">
                        <h3 class="text-white text-xl font-bold">Layanan Ambulans</h3>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1519494080410-f9aa76cb4283?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Apotek"
                        class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-linear-to-t from-black/70 to-transparent flex items-end p-6">
                        <h3 class="text-white text-xl font-bold">Apotek</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection