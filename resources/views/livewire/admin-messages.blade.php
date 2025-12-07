<div class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Pesan Kontak</h1>
            <p class="mt-2 text-slate-600">Kelola pesan yang diterima dari formulir kontak</p>
        </div>

        @if($messages->isEmpty())
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <p class="mt-4 text-lg text-slate-500">Belum ada pesan</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-6">
                @foreach($messages as $message)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-slate-900">{{ $message->name }}</h3>
                                    <div class="mt-1 flex items-center space-x-4 text-sm text-slate-500">
                                        <span class="flex items-center">
                                            <svg class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            {{ $message->email }}
                                        </span>
                                        @if($message->phone)
                                            <span class="flex items-center">
                                                <svg class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                                {{ $message->phone }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <span class="text-sm text-slate-400">
                                    {{ $message->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div class="mt-4 p-4 bg-slate-50 rounded-md">
                                <p class="text-slate-700 whitespace-pre-line">{{ $message->message }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>