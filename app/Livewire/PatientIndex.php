<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Patient;
use Livewire\WithPagination;

class PatientIndex extends Component
{
    use WithPagination;

    public $patients;

    public function create()
    {
        return redirect()->route('patients.create');
    }

    public function edit($id)
    {
        return redirect()->route('patients.edit', $id);
    }

    public function delete($id)
    {
        Patient::find($id)->delete();
        session()->flash('message', 'Patient deleted successfully.');
    }

    public function render()
    {
        $this->patients = Patient::all()->toArray();
        return view('livewire.patient-index') ->layout('layouts.app');
    }
}
