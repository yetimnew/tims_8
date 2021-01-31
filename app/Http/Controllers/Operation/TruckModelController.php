<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TruckModelController extends Controller
{
    protected $fillable = ['id', 'name', 'company', 'production_date', 'comment', 'status'];


    public function trucks()
    {
        return $this->hasMany('App\Truck');
    }
}
