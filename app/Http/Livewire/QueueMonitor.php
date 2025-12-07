<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Poly;
use App\Models\Queue;
use Carbon\Carbon;

class QueueMonitor extends Component
{
    public function mount()
    {
        // Redirect admin and doctor to admin dashboard
        if (auth()->check() && in_array(auth()->user()->role, ['admin', 'doctor'])) {
            return redirect()->route('admin.dashboard');
        }
    }

    public function render()
    {
        $polies = Poly::all();
        $queues = [];

        foreach ($polies as $poly) {
            $current = Queue::where('poly_id', $poly->id)
                ->where('date', Carbon::today()->toDateString())
                ->where('status', 'called')
                ->orderBy('updated_at', 'desc')
                ->first();

            $waiting = Queue::where('poly_id', $poly->id)
                ->where('date', Carbon::today()->toDateString())
                ->where('status', 'waiting')
                ->count();

            $queues[$poly->id] = [
                'name' => $poly->name,
                'current_number' => $current ? $current->number : '-',
                'waiting_count' => $waiting,
            ];
        }

        return view('livewire.queue-monitor', [
            'queues' => $queues,
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
