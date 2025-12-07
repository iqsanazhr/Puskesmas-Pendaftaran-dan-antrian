<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Poly;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Queue;
use Carbon\Carbon;

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
            $this->name = auth()->user()->name;
        }
    }

    protected $rules = [
        'nik' => 'required|numeric|digits:16',
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'address' => 'required|string',
        'phone' => 'nullable|string|max:15',
        'gender' => 'required|in:L,P',
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
        return view('livewire.patient-registration', [
            'polies' => Poly::all(),
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
