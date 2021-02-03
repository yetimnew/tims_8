<?php

namespace App\Models\Operation;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $fillable = [
        'operationid',
         'customer_id',
         'start_date',
         'place_id',
         'volume',
         'cargo_type',
         'tone',
         'tariff',
         'status',
         'is_closed',
         'end_date',
         'remark',
         'created_by',
         'updated_by',
    ];
    protected $dates = ['start_date', 'end_date', 'deleted_at'];

    public function scopeActive($query)
    {
        return $query->where("status", "=", 1);
    }
    public function scopeClosed($query)
    {
        return $query->where("closed", 0);
    }
    public function scopeOpen($query)
    {
        return $query->where("closed", "=", 1);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedby()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function place()
    {
        return $this->belongsTo(Place::class);

    }
    // public function performances()
    // {
    //     return $this->belongsToMany('App\Performance');
    // }
    // public function osperformances()
    // {
    //     return $this->hasMany('App\Outsource_performance');
    // }
}

