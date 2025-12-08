@php
    /** @var \App\Models\Poly[] $polies */
    /** @var int|null $selectedPolyId */
    /** @var \App\Models\Queue|null $currentQueue */
    /** @var \App\Models\Queue[] $waitingQueues */
@endphp
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-slate-100">
            <div class="p-8">
                <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900">Dashboard Antrian</h2>
                        <p class="text-slate-500 mt-1">Kelola antrian pasien dengan mudah dan efisien.</p>
                    </div>
                    @if(auth()->user()?->role == 'admin')
                        <div class="w-full md:w-72">
                            <label for="poly-select" class="block text-sm font-medium text-slate-700 mb-1">Pilih
                                Poli</label>
                            <select wire:model="selectedPolyId" id="poly-select"
                                class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-medical-blue focus:ring focus:ring-medical-blue focus:ring-opacity-50 transition duration-150 ease-in-out">
                                <option value="">-- Pilih Poli --</option>
                                @foreach($polies as $poly)
                                    <option value="{{ $poly->id }}">{{ $poly->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>

                @if($selectedPolyId)
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        <!-- Current Queue Section -->
                        <div
                            class="bg-linear-to-br from-blue-50 to-white p-8 rounded-2xl border border-blue-100 shadow-sm flex flex-col items-center justify-center text-center relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-100 rounded-full opacity-50 blur-xl">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-medical-teal/10 rounded-full opacity-50 blur-xl">
                            </div>

                            <h3 class="text-xl font-semibold text-blue-900 mb-6 relative z-10">Sedang Dipanggil</h3>

                            @if($currentQueue)
                                <div class="relative z-10">
                                    <div class="text-8xl font-black text-medical-blue mb-2 tracking-tighter">
                                        {{ $currentQueue->number }}
                                    </div>
                                    <div
                                        class="text-lg font-medium text-slate-700 mb-8 bg-white/60 px-4 py-1 rounded-full inline-block backdrop-blur-sm border border-blue-100">
                                        {{ $currentQueue->patient->name }}
                                    </div>

                                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                                        <button wire:click="completeCurrent"
                                            class="group bg-linear-to-r from-emerald-500 to-green-600 text-white px-6 py-3 rounded-full font-bold hover:shadow-lg hover:shadow-green-500/30 transition-all duration-200 flex items-center justify-center gap-2 transform hover:-translate-y-1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 group-hover:scale-110 transition-transform" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Selesai Periksa
                                        </button>

                                        <button wire:click="skipCurrent"
                                            class="group bg-linear-to-r from-slate-500 to-slate-600 text-white px-6 py-3 rounded-full font-bold hover:shadow-lg hover:shadow-slate-500/30 transition-all duration-200 flex items-center justify-center gap-2 transform hover:-translate-y-1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 group-hover:scale-110 transition-transform" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Tidak Hadir
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="text-6xl font-bold text-slate-200 mb-4">-</div>
                                    <p class="text-slate-400 font-medium">Belum ada pasien dipanggil</p>
                                </div>
                            @endif
                        </div>

                        <!-- Waiting List Section -->
                        <div class="flex flex-col h-full">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                                    <span class="bg-medical-teal/10 text-medical-teal p-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    Antrian Menunggu
                                </h3>
                                <button wire:click="callNext"
                                    class="bg-linear-to-r from-medical-blue to-teal-500 text-white px-5 py-2.5 rounded-lg font-bold hover:shadow-lg hover:shadow-blue-500/30 transition flex items-center gap-2 transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Panggil Berikutnya
                                </button>
                            </div>

                            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden grow shadow-sm">
                                <div class="overflow-y-auto max-h-[400px]">
                                    <ul class="divide-y divide-slate-100">
                                        @forelse($waitingQueues as $queue)
                                            <li class="p-4 hover:bg-slate-50 transition duration-150 group">
                                                <div class="flex justify-between items-center">
                                                    <div class="flex items-center gap-4">
                                                        <span
                                                            class="bg-slate-100 text-slate-600 font-bold text-lg w-10 h-10 rounded-full flex items-center justify-center group-hover:bg-medical-blue group-hover:text-white transition-colors">
                                                            {{ $queue->number }}
                                                        </span>
                                                        <div>
                                                            <p class="font-semibold text-slate-900">{{ $queue->patient->name }}
                                                            </p>
                                                            <p class="text-xs text-slate-500">Terdaftar:
                                                                {{ $queue->created_at->format('H:i') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-medium rounded-full border border-yellow-200">
                                                        Menunggu
                                                    </span>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="p-12 text-center">
                                                <div class="inline-block p-4 bg-slate-50 rounded-full mb-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                    </svg>
                                                </div>
                                                <p class="text-slate-500 font-medium">Tidak ada antrian menunggu.</p>
                                                <p class="text-slate-400 text-sm mt-1">Semua pasien telah dipanggil.</p>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-20 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                        <div class="inline-block p-6 bg-white rounded-full shadow-sm mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-medical-blue" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900">Pilih Poli Terlebih Dahulu</h3>
                        <p class="text-slate-500 mt-2 max-w-sm mx-auto">Silakan pilih poli tujuan pada menu dropdown di atas
                            untuk mulai mengelola antrian pasien.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>