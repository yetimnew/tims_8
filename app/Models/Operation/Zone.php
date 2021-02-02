<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

protected $fillable = ['name','region_id','comment'];

public function region()
{
    return $this->belongsTo(Region::class);
}

}
