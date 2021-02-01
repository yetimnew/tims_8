<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    public $fillable = [
        'plate',
        'truck_model_id',
        'chassis_number',
        'engine_number',
        'tyre_size',
        'service_Interval_km',
        'purchase_price',
        'production_date',
        'service_start_date',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function truckmodel()
    {
        return $this->belongsTo(TruckModel::class,'truck_model_id');
    }

}
