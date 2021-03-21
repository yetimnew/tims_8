<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeesEmergencyContact extends Model
{
    use HasFactory;

    protected $table = 'employees_emergency_contacts';
    protected $fillable = [
        'personale_id', 'name', 'relationship', 'mobile', 'home_telephone', 'work_telephone'
    ];
}
