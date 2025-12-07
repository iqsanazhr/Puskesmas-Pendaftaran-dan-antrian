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

        // Find or Create Patient
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

        // Generate Queue Number
        $lastQueue = Queue::where('poly_id', $this->poly_id)
            ->where('date', $this->date)
            ->max('number');

        $newNumber = $lastQueue ? $lastQueue + 1 : 1;

        Queue::create([
            'patient_id' => $patient->id,
            'poly_id' => $this->poly_id,
            'doctor_id' => $this->doctor_id,
            'number' => $newNumber,
            'date' => $this->date,
            'status' => 'waiting',
        ]);

        $this->queueNumber = $newNumber;
        $this->successMessage = "Pendaftaran Berhasil! Nomor Antrian Anda: " . $newNumber;

        // Reset form except success message
        $this->reset(['nik', 'name', 'dob', 'address', 'phone', 'gender', 'poly_id', 'doctor_id', 'date', 'doctors']);
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
