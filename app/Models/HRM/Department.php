<?php

namespace App\Models\HRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'status'
    ];
    public function personales()
    {
        return $this->hasMany('App\HRM\Personale');
    }
    public function jobtitle()
    {
        return $this->hasMany('App\HRM\JobTitle');
    }
}
