<?php

namespace App\Models\HRM;

use App\Models\HRM\PayGrade;
use App\Models\HRM\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personale extends Model
{
    use HasFactory;
    protected $fillable = [
        'driverid',
        'firstname',
        'fathername',
        'gfathername',
        'sex',
        'birthdate',
        'hireddate',
        'driver',
        'pay_grade_id',
        'pay_grade_level_id',
        'department_id',
        'jobtitle_id',
        'employment_status',
        'marital_status',
        'zone',
        'woreda',
        'city',
        'sub_city',
        'kebele',
        'housenumber',
        'mobile',
        'home_telephone',
        'work_telephone',
        'email'
];

public function registerMediaConversions(Media $media = null): void
{
    $this->addMediaConversion('thumb')
        ->width(368)
        ->height(232)
        ->sharpen(10);
}
// protected $appends = ['image'];
// public function getimageAttribute(){
//     $image = $this->getMedia('image')->first();

//     if($image){
//             return $image->getPath();
//             }

// }
// public function getSexAttribute($attribute)
// {
//     return [
//         1 => "Male",
//         0 => "Female"
//     ][$attribute];
// }
// public function getEmploymentStatusAttribute($attribute)
// {
//     return [
//         1 => "Permanent",
//         0 => "Contract"
//     ];
// }

public function scopeActive($query)
{
    return $query->where('status', 1);
}
public function scopeInactive($query)
{
    return $query->where('status', 0);
}
public function scopePermanent($query)
{
    return $query->where('employment_status', 1);
}
public function scopeContract($query)
{
    return $query->where('employment_status', 0);
}
public function scopeDriver($query)
{
    return $query->where('driver', 1);
}
public function department()
{
    return $this->belongsTo(Department::class);
}
public function pay_grade()
{
    return $this->belongsTo(PayGrade::class);
}
public function jobtitle()
{
    return $this->belongsTo(JobTitle::class);
}
public function promotions()
{
    return $this->hasMany(EmployeesPromotion::class);
}
public function getNameAttribute($value)
{
    return  ucwords($value);
}
public function getFullNameAttribute()
{
    return  ($this->firstname . ' ' . $this->fathername . ' ' . $this->gfathername);
}
public function getEthYearAttribute()
{
    $month =  explode('-',$this->birthdate);
    return $month[0];

}
public function getEthMonthAttribute()
{
    $month =  explode('-',$this->birthdate);
    return $month[1];

}
public function getEthDateAttribute()
{
    $month =  explode('-',$this->birthdate);
    return $month[2];

}
public function getEthHYearAttribute()
{
    $month =  explode('-',$this->hireddate);
    return $month[0];

}
public function getEthHMonthAttribute()
{
    $month =  explode('-',$this->hireddate);
    return $month[1];

}
public function getEthHDateAttribute()
{
    $month =  explode('-',$this->hireddate);
    return $month[2];

}

}
