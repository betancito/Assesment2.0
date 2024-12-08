<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'email',
        'dob',
        'phone',
        'address',
    ];

    public function appointments()
    {
        return this->hasMany(Appointment::class);
    }
}
