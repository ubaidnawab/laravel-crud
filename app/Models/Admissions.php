<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip'
    ];
}
