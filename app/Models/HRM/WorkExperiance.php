<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperiance extends Model
{
    use HasFactory;

    // protected $table = ['work_experiances'];
    protected $fiallable = ['personale_id', 'employer', 'job_title', 'from_date', 'to_date', 'comment'];
}
