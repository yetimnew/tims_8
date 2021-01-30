<?php

namespace App\Models\HRM;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable =['id','user_id', 'image', 'about'];

    public function user()
    {
            return $this->belongsTo('User::class');
        }

}
