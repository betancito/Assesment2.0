<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class DoctorForm extends Component
{
    public $user_id;
    public $specialty;
    public $phone;

        public function mount($user_id)
    {
        $user = User::findOrFail($user_id);
        $this->user_id = $user->id;
    }

    public function create($user_id)
    {
        $user = User::findOrFail($user_id);
        $this->user_id = $user->id;
        return view('livewire.doctor-form', compact('user'))->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:doctors,phone',
        ]);

        Doctor::create([
            'user_id' => $this->user_id,
            'specialty' => $this->specialty,
            'phone' => $this->phone,
        ]);

        Log::info('Doctor created: ', [
            'user_id' => $this->user_id,
            'specialty' => $this->specialty,
            'phone' => $this->phone,
        ]);

        session()->flash('success', 'Doctor details added successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.doctor-form')->layout('layouts.app');
    }
}
