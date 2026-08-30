<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'postal_code',
        'address',
        'representative',
        'business',
        'established_on',
        'capital',
        'number_of_employees',
    ];

    protected $casts = [
        'established_on' => 'date',
    ];
}
