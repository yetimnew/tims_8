<?php

namespace App\Models\Operation;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Operator;

class Performance extends Model
{
    use HasFactory;
    protected $fillable = [

        'trip',
        'load_type',
        'fo_number',
        'operation_id',
        'driver_truck_id',
        'date_dispatch',
        'origin_id',
        'destination_id',
        'distance_without_cargo',
        'distance_with_cargo',
        'tone',
        'ton_km',
        'fuelIn_litter',
        'fuelIn_birr',
        'perdiem',
        'operational_expense',
        'other_expense',
        'comment',
        'status',
        'is_returned',
        'returned_date',
        'created_by',
        'updated_by',
    ];
    protected $date = ['date_dispatch',  'returned_date'];

    public function driver_truck()
    {
        return $this->hasMany(DriverTruck::class,'driver_truck_id');
    }
    public function scopeIsTrip($query)
    {
        if( $query->where("trip", 1)){
            return 1;
        }else{
            return 0;
        }

    }
    public function scopeIsReturned($query)
    {
        if( $query->where("is_returned", 1)){
            return 1;
        }else{
            return 0;
        }

    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedby()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function origin()
    {
        return $this->belongsTo(Place::class,'origin_id');
    }
    public function destination()
    {
        return $this->belongsTo(Place::class,'destination_id');
    }
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }

}
