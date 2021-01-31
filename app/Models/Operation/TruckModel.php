<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckModel extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'company', 'production_date', 'comment', 'status',''];


    public function trucks()
    {
        return $this->hasMany('App\Truck');
    }
}
