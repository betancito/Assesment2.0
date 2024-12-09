<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class DoctorForm extends Component
{
    public $specialty;
    public $phone;
    public $user_id;

    public function mount()
    {
        $this->user_id = Auth::id();
    }

    public function submit()
    {
        $this->validate([
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:phone',
        ]);

        Doctor::create([
            'user_id' => $this->user_id,
            'specialty' => $this->specialty,
            'phone' => $this->phone,
        ]);

        session()->flash('message', 'Doctor details saved successfully.');

        return redirect()->route('doctor.dashboard');
    }

    public function render()
    {
        return view('livewire.doctor-form')->layout('layouts.app');
    }
}
