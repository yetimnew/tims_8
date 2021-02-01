<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable =[
        'driverid',
        'name',
        'sex' ,
        'birth_date',
        'zone',
        'woreda',
        'kebele',
        'house_number',
        'mobile',
        'hired_date'
    ];
}
