<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-slate-900">Dashboard Pemimpin</h2>
            <p class="text-slate-500 mt-1">Ringkasan statistik dan performa pelayanan Puskesmas.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Patients -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-medical-blue" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Pasien Terdaftar</p>
                        <h3 class="text-2xl font-bold text-slate-900">{{ number_format($totalPatients) }}</h3>
                    </div>
                </div>
            </div>

            <!-- Patients Today -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-green-50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Antrian Hari Ini</p>
                        <h3 class="text-2xl font-bold text-slate-900">{{ number_format($patientsToday) }}</h3>
                    </div>
                </div>
            </div>

            <!-- Patients This Month -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-purple-50 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Pasien Bulan Ini</p>
                        <h3 class="text-2xl font-bold text-slate-900">{{ number_format($patientsThisMonth) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Daily Registrations Chart -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-lg font-bold text-slate-900 mb-4">Tren Pendaftaran (7 Hari Terakhir)</h3>
                <div class="h-64">
                    <canvas id="dailyChart"></canvas>
                </div>
            </div>

            <!-- Patients per Poly Chart -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-lg font-bold text-slate-900 mb-4">Distribusi Pasien per Poli (Hari Ini)</h3>
                <div class="h-64">
                    <canvas id="polyChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('livewire:load', function () {
            // Daily Chart
            const dailyCtx = document.getElementById('dailyChart').getContext('2d');
            new Chart(dailyCtx, {
                type: 'line',
                data: {
                    labels: @json($dates),
                    datasets: [{
                        label: 'Jumlah Pasien',
                        data: @json($dailyCounts),
                        borderColor: '#2563eb', // medical-blue
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });

            // Poly Chart
            const polyCtx = document.getElementById('polyChart').getContext('2d');
            new Chart(polyCtx, {
                type: 'bar',
                data: {
                    labels: @json($polyLabels),
                    datasets: [{
                        label: 'Jumlah Pasien',
                        data: @json($polyData),
                        backgroundColor: [
                            'rgba(37, 99, 235, 0.8)', // blue
                            'rgba(16, 185, 129, 0.8)', // green
                            'rgba(139, 92, 246, 0.8)', // purple
                            'rgba(245, 158, 11, 0.8)', // yellow
                            'rgba(239, 68, 68, 0.8)', // red
                        ],
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>
</div>