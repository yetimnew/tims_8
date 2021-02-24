<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobIdent extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'job_system_id', 'mechanic_hours', 'ass_mechanic_hours', 'status'];

    public function jobsystem()
    {
        return $this->belongsTo(JobSystem::class,  'job_system_id');
    }
}
