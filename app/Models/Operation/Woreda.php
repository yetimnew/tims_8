<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woreda extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'zone_id',
        'comment',
        'status'
    ];



    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

}
