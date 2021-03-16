<?php

namespace App\Models\Maintenance;

use App\Models\HRM\Personale;
use App\Models\Operation\Customer;
use App\Models\Operation\Truck;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenJobCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'Job_card_number',
        'opening_date',
        'workshop_id',
        'truck_id',
        'customer_id',
        'job_system_id',
        'job_ident_id',
        'km_reading',
        'km_reading_date',
        'driver_id',
        'mechanic_id',
        'ass_mechanic_id',
        'opening_clerk_id',
        'receptionist_id'
    ];
    public function workshop()
    {
        // return $this->hasMany(Operation::class);
        return $this->belongsTo(Workshop::class);
    }
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function driver()
    {
        return $this->belongsTo(Personale::class);
    }
}
