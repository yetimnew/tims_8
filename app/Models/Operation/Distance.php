<?php

namespace App\Models\Operation;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $table = "distances";
    protected $primaryKey='id';
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
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
}
