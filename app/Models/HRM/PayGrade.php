<?php

namespace App\Models\HRM;

use App\Models\HRM\Personale;
use App\Models\HRM\PayGradeLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PayGrade extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'comment', 'status'];

    public function pay_grade_levels()
    {
        return $this->hasOne(PayGradeLevel::class);
    }
    public function personals()
    {
        return $this->hasMany(Personale::class);
    }
}
