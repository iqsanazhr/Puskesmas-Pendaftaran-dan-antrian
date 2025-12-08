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
        /** @var \App\Models\User $user */
        $user = auth()->user();

        if (!in_array($user->role, ['admin', 'doctor'])) {
            return redirect('/');
        }

        // If doctor, auto select poly AND restrict switching
        if ($user->role == 'doctor') {
            $doctor = \App\Models\Doctor::where('user_id', auth()->id())->first();
            if ($doctor) {
                $this->selectedPolyId = $doctor->poly_id;
            } else {
                session()->flash('error', 'Anda belum terdaftar di poli manapun.');
                return redirect('/');
            }
        }
    }

    public function callNext()
    {
        $this->ensureDoctorAccess();

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
                // Default behavior: if calling next without explicit action, mark current as completed
                $this->currentQueue->update(['status' => 'completed']);
            }

            $next->update(['status' => 'called']);
            $this->currentQueue = $next;
        }
    }

    public function completeCurrent()
    {
        $this->ensureDoctorAccess();
        if ($this->currentQueue) {
            $this->currentQueue->update(['status' => 'completed']);
            $this->currentQueue = null;
        }
    }

    public function skipCurrent()
    {
        $this->ensureDoctorAccess();
        if ($this->currentQueue) {
            $this->currentQueue->update(['status' => 'skipped']);
            $this->currentQueue = null;
        }
    }

    protected function ensureDoctorAccess()
    {
        if (auth()->user()->role == 'doctor') {
            $doctor = \App\Models\Doctor::where('user_id', auth()->id())->first();
            if ($doctor && $this->selectedPolyId != $doctor->poly_id) {
                // Force reset to assigned poly
                $this->selectedPolyId = $doctor->poly_id;
            }
        }
    }

    public function render()
    {
        // If doctor, only show their poly query
        if (auth()->user()->role == 'doctor') {
            $polies = Poly::where('id', $this->selectedPolyId)->get();
        } else {
            $polies = Poly::all();
        }

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

        /** @var \Illuminate\View\View $view */
        $view = view('livewire.admin-dashboard', [
            'polies' => $polies,
            'waitingQueues' => $waitingQueues
        ]);

        return $view->extends('layouts.app')->section('content');
    }
}
