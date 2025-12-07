<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Queue;
use App\Models\Poly;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeaderDashboard extends Component
{
    public function mount()
    {
        if (auth()->user()->role !== 'leader') {
            return redirect('/');
        }
    }

    public function render()
    {
        // 1. Total Patients
        $totalPatients = Patient::count();

        // 2. Patients Today
        $patientsToday = Queue::whereDate('created_at', Carbon::today())->count();

        // 3. Patients This Month
        $patientsThisMonth = Queue::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // 4. Patients per Poly (for Chart)
        $patientsPerPoly = Poly::withCount([
            'queues' => function ($query) {
                $query->whereDate('created_at', Carbon::today());
            }
        ])->get();

        $polyLabels = $patientsPerPoly->pluck('name')->toArray();
        $polyData = $patientsPerPoly->pluck('queues_count')->toArray();

        // 5. Daily Registrations (Last 7 Days)
        $dailyStats = Queue::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $dates = [];
        $dailyCounts = [];

        // Fill in missing dates with 0
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[] = Carbon::now()->subDays($i)->format('d M');
            $found = $dailyStats->firstWhere('date', $date);
            $dailyCounts[] = $found ? $found->count : 0;
        }

        return view('livewire.leader-dashboard', [
            'totalPatients' => $totalPatients,
            'patientsToday' => $patientsToday,
            'patientsThisMonth' => $patientsThisMonth,
            'polyLabels' => $polyLabels,
            'polyData' => $polyData,
            'dates' => $dates,
            'dailyCounts' => $dailyCounts,
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
