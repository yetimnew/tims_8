<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
    'request_date',
     'length_hours',
     'length_days',
     'status',
     'comment',
     'personale_id',
      'leave_type_id'
    ];
    public function personal()
    {
        return $this->belongsTo('App\HRM\Personale','personale_id');
    }
    public function leave_type()
    {
        return $this->belongsTo('App\HRM\LeaveType','leave_type_id');
    }
    public function leave_period()
    {
        return $this->belongsTo('App\HRM\LeavePeriod','leave_period_id');
    }
}
