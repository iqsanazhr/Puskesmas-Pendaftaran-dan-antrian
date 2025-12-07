<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Queue;
use Livewire\WithPagination;

class PatientDashboard extends Component
{
    use WithPagination;

    public $isEditing = false;
    public $address;
    public $phone;

    public function mount()
    {
        if (auth()->check() && auth()->user()->patient) {
            $this->address = auth()->user()->patient->address;
            $this->phone = auth()->user()->patient->phone;
        }
    }

    public function toggleEdit()
    {
        $this->isEditing = !$this->isEditing;
        if (!$this->isEditing && auth()->user()->patient) {
            // Reset to saved data if cancelling
            $this->address = auth()->user()->patient->address;
            $this->phone = auth()->user()->patient->phone;
        }
    }

    public function updateProfile()
    {
        $this->validate([
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:15',
        ]);

        if (auth()->user()->patient) {
            auth()->user()->patient->update([
                'address' => $this->address,
                'phone' => $this->phone,
            ]);

            $this->isEditing = false;
            session()->flash('success', 'Profil berhasil diperbarui!');
        }
    }

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
