<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Holiday extends Model
{
    use HasFactory;

    public function getEthYearAttribute()
    {
        $month =  explode('-',$this->date);
        return $month[0];

    }
    public function getEthMonthAttribute()
    {
        $month =  explode('-',$this->date);
        return $month[1];

    }
    public function getEthDateAttribute()
    {
        $month =  explode('-',$this->date);
        return $month[2];

    }
}
