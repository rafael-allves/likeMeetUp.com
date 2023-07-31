<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->hasOne('App\Models\User');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\User');
    }
}
