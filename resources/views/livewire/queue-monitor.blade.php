<div class="min-h-screen bg-slate-100 py-12" wire:poll.5s>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-black text-slate-900 tracking-tight uppercase">Monitor Antrian</h2>
            <p class="mt-4 text-xl text-slate-600 font-light">Pantau nomor antrian Anda secara real-time.</p>
        </div>

        <!-- Public Queue Display -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($queues as $polyId => $data)
                <div class="relative bg-white overflow-hidden shadow-2xl rounded-3xl border-2 border-white transform transition duration-500 hover:scale-105">
                     @if($data['current_number'] !== '-')
                    <div class="absolute inset-x-0 top-0 h-2 bg-linear-to-r from-medical-blue to-teal-400 animate-pulse"></div>
                    @endif
                    
                    <div class="bg-slate-50 px-6 py-6 border-b border-slate-100">
                        <h3 class="text-2xl font-bold text-slate-800 text-center">{{ $data['name'] }}</h3>
                    </div>
                    <div class="p-8 text-center bg-white">
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-4">Sedang Dilayani</p>
                        <div class="text-8xl font-black text-medical-blue tracking-tighter {{ $data['current_number'] !== '-' ? 'animate-pulse' : '' }}">
                            {{ $data['current_number'] }}
                        </div>
                        
                        <div class="mt-8 bg-slate-50 rounded-xl p-4 border border-slate-100">
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-slate-500">Dalam Antrian</span>
                                <span class="text-2xl font-bold text-slate-700">{{ $data['waiting_count'] }} <span class="text-sm font-normal text-slate-400">Org</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-12 text-center text-slate-400 text-sm">
            <p>Antrian otomatis diperbarui setiap 5 detik.</p>
        </div>
    </div>
</div>