<?php

namespace App\Models\HRM;

use App\Models\HRM\LeaveType;
use App\Models\HRM\LeavePeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveEntitlement extends Model
{
    use HasFactory;
    public function personal()
    {
        return $this->belongsTo(Personale::class,'personale_id');
    }
    public function leave_type()
    {
        return $this->belongsTo(LeaveType::class,'leave_type_id');
    }
    public function leave_period()
    {
        return $this->belongsTo(LeavePeriod::class,'leave_period_id');
    }
}
