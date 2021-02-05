<?php

namespace App\Models\Operation;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $table = "distances";
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedby()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function origins()
    {
        return $this->hasMany(Place::class,'id');
    }
    // public function origions()
    // {
    //     return $this->belongsToMany('App\Place');
    // }
    public function destinations()
    {
        return $this->hasMany(Place::class);
    }
}
