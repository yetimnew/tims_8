<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
         'address',
          'office_number',
           'mobile',
            'remark'
    ];
    protected $dates = ['deleted_at'];
    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
    public function scopeActive($query)
    {
      return $query->where('status',1);
    }
    public function scopeInActive($query)
    {
      return $query->where('status',0);
    }
}
