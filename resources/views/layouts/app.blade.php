<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Puskesmas Ajibarang')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased text-slate-800 bg-slate-50">
    <nav class="bg-white/80 backdrop-blur-md fixed w-full z-50 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="/" class="text-2xl font-bold text-medical-blue tracking-tight">
                            Puskesmas<span class="text-medical-teal">Ajibarang</span>
                        </a>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-8 h-full">
                            <a href="/"
                                class="border-transparent text-slate-500 hover:border-medical-blue hover:text-medical-blue inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Beranda
                            </a>
                            <a href="{{ route('profil') }}"
                                class="border-transparent text-slate-500 hover:border-medical-blue hover:text-medical-blue inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Profil
                            </a>
                            <a href="{{ route('layanan') }}"
                                class="border-transparent text-slate-500 hover:border-medical-blue hover:text-medical-blue inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Layanan
                            </a>
                            <a href="{{ route('fasilitas') }}"
                                class="border-transparent text-slate-500 hover:border-medical-blue hover:text-medical-blue inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Fasilitas
                            </a>
                            @if(!auth()->check() || (auth()->user()->role !== 'admin' && auth()->user()->role !== 'leader'))
                                <a href="{{ route('kontak') }}"
                                    class="border-transparent text-slate-500 hover:border-medical-blue hover:text-medical-blue inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Kontak
                                </a>
                            @endif
                            <a href="{{ route('queue.monitor') }}"
                                class="border-transparent text-slate-500 hover:border-medical-blue hover:text-medical-blue inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Monitor Antrian
                            </a>
                            @if(auth()->check() && auth()->user()->role == 'admin')
                                <a href="{{ route('admin.messages') }}"
                                    class="border-transparent text-slate-500 hover:border-medical-blue hover:text-medical-blue inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Pesan Kontak
                                </a>
                            @endif
                            @if(auth()->check() && auth()->user()->role == 'leader')
                                <a href="{{ route('leader.dashboard') }}"
                                    class="border-transparent text-slate-500 hover:border-medical-blue hover:text-medical-blue inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Dashboard Pemimpin
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Side Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-slate-500 hover:text-medical-blue text-sm font-medium">
                            Masuk
                        </a>
                        <a href="{{ route('patient.register') }}"
                            class="bg-medical-blue text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                            Daftar Antrian
                        </a>
                    @else
                        <a href="{{ route('patient.dashboard') }}"
                            class="text-slate-600 hover:text-medical-blue hover:bg-blue-50 px-3 py-2 rounded-lg text-sm font-medium transition-colors">Dashboard</a>

                        <!-- Profile Dropdown -->
                        <div class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" type="button"
                                    class="bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-medical-blue pl-0 pr-2 py-1"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <div
                                        class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-medical-blue font-bold text-sm">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                    <span
                                        class="ml-2 font-medium text-slate-700">{{ explode(' ', auth()->user()->name)[0] }}</span>
                                    <svg class="ml-1 h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-xl shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                                style="display: none;">
                                <div class="px-4 py-3 border-b border-slate-100">
                                    <p class="text-sm font-medium text-slate-900 truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email }}</p>
                                </div>

                                @if(auth()->user()->role == 'admin')
                                    <a href="{{ route('admin.messages') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50"
                                        role="menuitem">Dashboard Admin</a>
                                @elseif(auth()->user()->role == 'leader')
                                    <a href="{{ route('leader.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50"
                                        role="menuitem">Dashboard Pimpinan</a>
                                @endif

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50" role="menuitem">
                                        Keluar
                                    </a>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-16 min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Puskesmas Ajibarang</h3>
                    <p class="text-slate-500 text-sm">Melayani dengan hati, menjangkau dengan teknologi. Standar
                        pelayanan kesehatan internasional.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-slate-900 mb-4">Layanan</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="#" class="hover:text-medical-blue">Poli Umum</a></li>
                        <li><a href="#" class="hover:text-medical-blue">Poli Gigi</a></li>
                        <li><a href="#" class="hover:text-medical-blue">KIA & KB</a></li>
                        <li><a href="#" class="hover:text-medical-blue">Laboratorium</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-slate-900 mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li>Jl. Raya Ajibarang No. 123</li>
                        <li>(0281) 1234567</li>
                        <li>info@puskesmasajibarang.com</li>
                    </ul>
                </div>
                <div id="jadwal-operasional">
                    <h4 class="font-semibold text-slate-900 mb-4">Jam Operasional</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li>Senin - Kamis: 07:30 - 14:00</li>
                        <li>Jumat: 07:30 - 11:00</li>
                        <li>Sabtu: 07:30 - 12:30</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-slate-100 text-center text-slate-400 text-sm">
                &copy; {{ date('Y') }} Puskesmas Ajibarang. All rights reserved.
            </div>
        </div>
    </footer>

    @livewireScripts
</body>

</html>