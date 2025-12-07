<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Queue;
use Livewire\WithPagination;

class PatientDashboard extends Component
{
    use WithPagination;

    public function render()
    {
        $queues = collect();

        if (auth()->check()) {
            $queues = Queue::whereHas('patient', function ($query) {
                $query->where('user_id', auth()->id());
            })
                ->with(['poly', 'doctor.user'])
                ->orderBy('date', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('livewire.patient-dashboard', [
            'queues' => $queues
        ])->extends('layouts.app')->section('content');
    }
}
