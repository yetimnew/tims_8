<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobTitle extends Model
{
    use HasFactory;

    protected $table = 'jobtitles';
    protected $fillable = [
        'id',
        'name',
        'department_id',
        'given_number',
        'job_description',
        'status'
    ];
    public function personales()
    {
        return $this->hasMany(Personale::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    // public function personales()
    // {p
    //     return $this->hasMany(Personale::class);
    // }
}
