<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Poly;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Queue;

class PatientRegistration extends Component
{
    public $nik, $name, $dob, $address, $phone, $gender;
    public $poly_id, $doctor_id, $date;
    public $doctors = [];
    public $successMessage;
    public $queueNumber;
    public $queueId;

    public function mount()
    {
        if (auth()->check()) {
            /** @var \App\Models\User $user */
            $user = auth()->user();

            $this->name = $user->name;
            $this->nik = $user->nik; // Auto-fill NIK from User account

            // Auto-fill locked fields from Patient Profile
            if ($user->patient) {
                $this->dob = $user->patient->dob;
                $this->gender = $user->patient->gender;

                // If patient profile exists, we might want to auto-fill address/phone too, 
                // but user only asked to lock dob/gender/name/nik.
                // Let's pre-fill them if empty for convenience, but only lock the requested ones.
                if (empty($this->address))
                    $this->address = $user->patient->address;
                if (empty($this->phone))
                    $this->phone = $user->patient->phone;
            }
        }
    }

    protected $rules = [
        // 'nik', 'name', 'dob', 'gender' are readonly/enforced
        'address' => 'required|string',
        'phone' => 'nullable|string|max:15',
        'poly_id' => 'required|exists:polies,id',
        'doctor_id' => 'required|exists:doctors,id',
        'date' => 'required|date|after_or_equal:today',
    ];

    public function updatedPolyId($value)
    {
        $this->doctors = Doctor::where('poly_id', $value)->with('user')->get();
        $this->doctor_id = null;
    }

    public function submit()
    {
        // Enforce Locked Fields from authenticated user profile (Security Fix)
        $this->nik = auth()->user()->nik;
        $this->name = auth()->user()->name;

        if (auth()->user()->patient) {
            $this->dob = auth()->user()->patient->dob;
            $this->gender = auth()->user()->patient->gender;
        }

        $this->validate();

        // Check Daily Quota (Max 25 Per Poly)
        $todayCount = Queue::where('poly_id', $this->poly_id)
            ->where('date', $this->date)
            ->count();

        if ($todayCount >= 25) {
            $this->addError('date', 'Kuota antrian untuk poli ini sudah penuh (Maksimal 25 pasien/hari). Silakan pilih tanggal lain.');
            return;
        }

        // Generate Queue Number
        $lastQueue = Queue::where('poly_id', $this->poly_id)
            ->where('date', $this->date)
            ->max('number');

        $newNumber = $lastQueue ? $lastQueue + 1 : 1;

        // No need for "hijack" check anymore because we force using auth()->user()->nik


        // Create Patient (if not exists) and Queue
        $patient = Patient::updateOrCreate(
            ['nik' => $this->nik],
            [
                'name' => $this->name,
                'dob' => $this->dob,
                'address' => $this->address,
                'phone' => $this->phone,
                'gender' => $this->gender,
                'user_id' => auth()->id(),
            ]
        );

        $queue = Queue::create([
            'patient_id' => $patient->id,
            'poly_id' => $this->poly_id,
            'doctor_id' => $this->doctor_id,
            'number' => $newNumber,
            'date' => $this->date,
            'status' => 'waiting',
        ]);

        session()->flash('success', "Pendaftaran Berhasil! Nomor Antrian Anda: " . $newNumber);
        return redirect()->route('patient.dashboard');

        // Reset form except success message and queue info
        // Reset form logic is no longer needed due to redirect
        // $this->reset(['nik', 'name', 'dob', 'address', 'phone', 'gender', 'poly_id', 'doctor_id', 'date', 'doctors']);
    }

    public function render()
    {
        /** @var \Illuminate\View\View $view */
        $view = view('livewire.patient-registration', [
            'polies' => Poly::all(),
        ]);

        return $view->extends('layouts.app')->section('content');
    }
}
