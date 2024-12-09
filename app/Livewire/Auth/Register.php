<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class Register extends Component
{
    public $name, $email, $password, $passwordConfirmation, $role;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|same:passwordConfirmation',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole($this->role);

        if ($this->role === 'doctor') {
            return redirect()->route('doctor.create', ['user_id' => $user->id]);
        }

        return redirect()->route('dashboard');

    }


    public function render()
    {
        return view('livewire.auth.register', ['roles' => Role::whereIn('name', ['staff', 'doctor'])->get(),
        ])->layout('layouts.guest');
    }
}
