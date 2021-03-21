<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeesDependant extends Model
{
    use HasFactory;

    protected $fillable = [
        'personale_id', 'name', 'relationship', 'relationship_type', 'date_of_birth'

    ];
}
