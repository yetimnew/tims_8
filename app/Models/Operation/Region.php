<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name','comment', 'status'];

    // public function operations()
    // {
    //     return $this->hasMany('App\Operation');
    // }
    public function zones()
    {
        return $this->hasMany(Zone::class);
    }

}
