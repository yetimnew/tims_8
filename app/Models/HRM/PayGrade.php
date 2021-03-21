<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PayGrade extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'comment', 'status'];

    public function pay_grade_levels()
    {
        return $this->hasMany('App\HRM\PayGradeLevel');
    }
    public function personals()
    {
        return $this->hasMany('App\HRM\Personale');
    }
}
