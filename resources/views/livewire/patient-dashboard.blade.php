<div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <!-- Header Section -->
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    Dashboard Pasien
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Selamat datang, {{ auth()->user()->name }}
                </p>
            </div>
            <div class="mt-4 flex md:ml-4 md:mt-0">
                <a href="{{ route('patient.register') }}"
                    class="inline-flex items-center rounded-xl bg-medical-blue px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-transform hover:-translate-y-0.5">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Daftar Antrian Baru
                </a>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            <!-- Left Column: Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white overflow-hidden shadow-xl rounded-2xl border border-slate-100">
                    <div class="bg-linear-to-r from-medical-blue to-teal-500 px-6 py-8 text-center">
                        <div
                            class="mx-auto h-20 w-20 rounded-full bg-white/20 flex items-center justify-center text-white text-2xl font-bold backdrop-blur-sm">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-white">{{ auth()->user()->name }}</h3>
                        <p class="text-blue-100">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="px-6 py-6 space-y-4">
                        <div>
                            <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">NIK</span>
                            <span
                                class="block text-slate-700 font-medium">{{ auth()->user()->patient->nik ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">No.
                                Telepon</span>
                            <span
                                class="block text-slate-700 font-medium">{{ auth()->user()->patient->phone ?? '-' }}</span>
                        </div>
                        <div>
                            <span
                                class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">Alamat</span>
                            <span
                                class="block text-slate-700 font-medium">{{ auth()->user()->patient->address ?? '-' }}</span>
                        </div>
                        <div class="pt-4 border-t border-slate-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full inline-flex justify-center items-center px-4 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-lg text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors">
                                    <svg class="mr-2 -ml-1 h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Keluar Aplikasi
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Queue History -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-xl rounded-2xl border border-slate-100 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <h3 class="text-lg font-bold text-slate-800 flex items-center">
                            <svg class="mr-2 h-5 w-5 text-medical-blue" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Riwayat Antrian
                        </h3>
                    </div>

                    @if($queues->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            Tanggal</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            Poli & Dokter</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            No. Antrian</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            Status</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-200">
                                    @foreach($queues as $queue)
                                        <tr class="hover:bg-slate-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                                {{ \Carbon\Carbon::parse($queue->date)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-slate-900">{{ $queue->poly->name }}</div>
                                                <div class="text-xs text-slate-500">{{ $queue->doctor->user->name ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span
                                                    class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-sm font-bold bg-blue-100 text-blue-800">
                                                    {{ str_pad($queue->number, 3, '0', STR_PAD_LEFT) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @php
                                                    $statusClass = match ($queue->status) {
                                                        'waiting' => 'bg-yellow-100 text-yellow-800',
                                                        'called' => 'bg-green-100 text-green-800',
                                                        'completed' => 'bg-blue-100 text-blue-800',
                                                        'skipped' => 'bg-red-100 text-red-800',
                                                        default => 'bg-slate-100 text-slate-800'
                                                    };
                                                    $statusLabel = match ($queue->status) {
                                                        'waiting' => 'Menunggu',
                                                        'called' => 'Dipanggil',
                                                        'completed' => 'Selesai',
                                                        'skipped' => 'Dibatalkan',
                                                        default => ucfirst($queue->status)
                                                    };
                                                @endphp
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                                                    {{ $statusLabel }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('queue.ticket.pdf', $queue->id) }}" target="_blank"
                                                    class="text-medical-blue hover:text-blue-900 flex items-center justify-end">
                                                    <svg class="mr-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    Cetak Tiket
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        @if($queues->hasPages())
                            <div class="px-6 py-4 border-t border-slate-200">
                                {{ $queues->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-slate-900">Belum ada riwayat</h3>
                            <p class="mt-1 text-sm text-slate-500">Anda belum pernah melakukan pendaftaran antrian.</p>
                            <div class="mt-6">
                                <a href="{{ route('patient.register') }}"
                                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-medical-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>