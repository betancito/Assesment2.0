<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Patient;

class PatientForm extends Component
{
    public $name, $dob, $phone, $address, $patientId, $identification, $email;
    public $isEditing = false;

    public function mount($id = null)
    {
        if ($id) {
            $patient = Patient::find($id);
            $this->patientId = $patient->id;
            $this->name = $patient->name;
            $this->dob = $patient->dob;
            $this->phone = $patient->phone;
            $this->address = $patient->address;
            $this->isEditing = true;
        }
    }

    public function store()
    {
        // Validate and save new patient, including identification number
        $this->validate([
            'identification' => 'required|string|max:20|unique:patients,identification',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
        ]);

        Patient::create([
            'identification' => $this->identification,
            'email' => $this->email,
            'name' => $this->name,
            'dob' => $this->dob,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        session()->flash('message', 'Patient created successfully!');
        return redirect()->route('patients.index');
    }

    public function update()
    {
        // Validate and update existing patient
        $this->validate([
            'identification' => 'required|string|max:20|unique:patients,identification,' . $this->patientId,
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
        ]);

        $patient = Patient::findOrFail($this->patientId);
        $patient->update([
            'identification' => $this->identification,
            'email' => $this->email,
            'name' => $this->name,
            'dob' => $this->dob,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        session()->flash('message', 'Patient updated successfully!');
        return redirect()->route('patients.index');
    }

    public function render()
    {
        return view('livewire.patient-form')->layout('layouts.app');;
    }
}
