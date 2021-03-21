<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PayGradeLevel extends Model
{
    use HasFactory;

    protected $table = 'pay_grade_levels';

    public function pay_grade()
    {
        return $this->belongsTo(PayGrade::class);
    }
}
