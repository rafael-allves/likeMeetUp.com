<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array',
    ];

    protected $dates = ['date'];

    protected $guarded = [];

    public function participants(){
        return $this->belongsToMany('App\Models\User');
    }
}
