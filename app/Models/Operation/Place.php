<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'woreda_id',
        'comment',
        'status'
    ];

    public function woreda()
    {
        return $this->belongsTo(Woreda::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
