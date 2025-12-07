<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Queue;
use App\Models\Poly;
use Carbon\Carbon;

class AdminDashboard extends Component
{
    public $selectedPolyId;
    public $currentQueue;

    public function mount()
    {
        if (!in_array(auth()->user()->role, ['admin', 'doctor'])) {
            return redirect('/');
        }

        // If doctor, auto select poly
        if (auth()->user()->role == 'doctor') {
            $doctor = \App\Models\Doctor::where('user_id', auth()->id())->first();
            if ($doctor) {
                $this->selectedPolyId = $doctor->poly_id;
            }
        }
    }

    public function callNext()
    {
        if (!$this->selectedPolyId)
            return;

        // Find next waiting
        $next = Queue::where('poly_id', $this->selectedPolyId)
            ->where('date', Carbon::today()->toDateString())
            ->where('status', 'waiting')
            ->orderBy('number', 'asc')
            ->first();

        if ($next) {
            // Mark current as completed if exists
            if ($this->currentQueue) {
                $this->currentQueue->update(['status' => 'completed']);
            }

            $next->update(['status' => 'called']);
            $this->currentQueue = $next;
        }
    }

    public function completeCurrent()
    {
        if ($this->currentQueue) {
            $this->currentQueue->update(['status' => 'completed']);
            $this->currentQueue = null;
        }
    }

    public function render()
    {
        $polies = Poly::all();

        $waitingQueues = [];
        if ($this->selectedPolyId) {
            $waitingQueues = Queue::where('poly_id', $this->selectedPolyId)
                ->where('date', Carbon::today()->toDateString())
                ->where('status', 'waiting')
                ->orderBy('number', 'asc')
                ->get();

            // Refresh current queue
            $this->currentQueue = Queue::where('poly_id', $this->selectedPolyId)
                ->where('date', Carbon::today()->toDateString())
                ->where('status', 'called')
                ->first();
        }

        return view('livewire.admin-dashboard', [
            'polies' => $polies,
            'waitingQueues' => $waitingQueues
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
