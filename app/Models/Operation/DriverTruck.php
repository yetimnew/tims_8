<?php

namespace App\Models\Operation;

use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DriverTruck extends Pivot
{
    use HasFactory;
    protected $table = 'driver_truck';
    protected $dates = ['deleted_at', 'date_received', 'date_detach',];

    protected $fillable = [
        'driver_id',
        'truck_id',
        'date_received',
        'date_detach',
        'reason',
        'status',
        'is_attached',
    ];

    public function scopeActive($query)
    {
        return $query->where("status", "=", 1);
    }
    public function scopeIsAttached($query)
    {
        return $query->where("is_attached", "=", 1);
    }

    public function performances()
    {
        return $this->belongsToMany('App\Performance');
    }
    public function drivers()
    {
        return $this->belongsToMany('App\Driver');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedby()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function getDateDifferenceAttribute()
    {
        $date_recived = new DateTime($this->date_recived);
        $date_detach = new DateTime($this->date_detach);
        $diff =  $date_detach->diff($date_recived);
        $formated = $diff->d . ' days ' . $diff->h . ' hours ' .  $diff->i . ' miniutes';
        return $formated;
    }
}
